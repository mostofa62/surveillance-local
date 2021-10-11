<?php
/**
 * Created by PhpStorm.
 * User: ratonshahadat
 * Date: 10/11/17
 * Time: 2:49 AM
 */

namespace App\Http\Controllers;

use App\Employee;
use App\Log;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use App\LoginModel;
use App\Http\Requests;
use App\User;
use Mail;
use Illuminate\Session\Store;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest');
    }

    public function index()
    {

        if (Request::method() == 'POST') {
            $input = Input::only('username', 'password');

            $input = array(
                'username' => $input['username'],
                'password' => md5($input['password'])
            );
            $flag = LoginModel::checklogin($input);

            if ($flag != null && $flag['status'] == 1) {

                if (Request::input('remember') == 'on') {
                    setcookie("username", $input['username'], time() + (86400 * 30), "/");
                }
                $ip = getenv('HTTP_CLIENT_IP')?:
                    getenv('HTTP_X_FORWARDED_FOR')?:
                        getenv('HTTP_X_FORWARDED')?:
                            getenv('HTTP_FORWARDED_FOR')?:
                                getenv('HTTP_FORWARDED')?:
                                    getenv('REMOTE_ADDR');
                $logs= new Log();
                $logs->user_id=$flag['id'];
                $logs->ip=$ip;
                $logs->save();

                Session::flash('message', 'Success');
                Session::flash('alert-class', 'alert-success');
                session(['user' => User::find($flag['id']), 'username' => $input['username'], 'accesslist_id' => json_decode($flag['accesslist_id']), 'language'=>'bn']);
                Auth::login(User::find($flag['id']), true);
                return redirect(url('login'));
            } elseif ($flag['status'] == -1) {
                Session::flash('message', 'Please Confirm Your Email ');
                Session::flash('alert-class', 'alert-danger');
            } else {
                Session::flash('message', 'Invalid Username or Password ');
                Session::flash('alert-class', 'alert-danger');
            }
        }
        $data['pageTitle'] = "login";
        return view('login/login', $data);
    }

    public function confirmEmail($email = null)
    {
        if ($email == "") {
            Session::flash('message', 'Invalid URL ');
            Session::flash('alert-class', 'alert-danger');
            return redirect('login');
        } else {
            $emaill = $this->decryptIt($email);
            $user=User::Where('username', $emaill)->update(array('status' => 1));
            // To send HTML mail, the Content-type header must be set


            ///***
            /// SEnd email
            ///
            $data = [
                'email'=>Employee::find(User::Where('username', $emaill)->get()[0]->employee_id)->email,
            ];
            Mail::send('emails.active', $data, function ($message)use ($data) {
                $message->from( "onreply@zinnahgroup.com","Registration Successful Email");
                $message->subject("Registration Confirm Email");
                $message->to($data['email']);
            });

            Session::flash('message', 'Your have successfully activate your account . ');
            Session::flash('alert-class', 'alert-success');
            return redirect('login');
        }
    }

    public function forgotpassword()
    {

        if (Request::method() == 'POST') {
            $validationRules = array(
                'username' => 'required',
            );

            $validationMessages = array(
                'required' => 'The :attribute required a value'
            );

            $validator = Validator::make(Input::all(), $validationRules, $validationMessages);

            if (!$validator->fails()) {
                $input = Input::get();
                $data = LoginModel::getUserEmail($input['username']);
                if ($data != null) {
                    Session::flash('message', 'Your password has been changed. Please check your email.');
                    Session::flash('alert-class', 'alert-danger');
                    $password = rand(10000000, 99999999);

                    $message = "<html><body>Your password has been changed. <br> New Password: <b>" . $password . "</b><br><a href='" . url('login') . "'>Login</a></body></html>";
                    LoginModel::updatePassword($data['username'], $password);

                    ///***
                    /// SEnd email
                    ///
                    $data = [
                        'password'     =>  $password,
                        'email'=>Employee::find($data['employee_id'])->email
                    ];
                    Mail::send('emails.forget', $data, function ($message)use ($data) {
                        $message->from( "onreply@zinnahgroup.com","Forget Password");
                        $message->subject("Registration Confirm Email");
                        $message->to($data['email']);
                    });

                    return redirect('login');
                } else {
                    Session::flash('message', 'Your username is incorrect');
                    Session::flash('alert-class', 'alert-danger');
                    return redirect('forgot-password');
                }
            } else {
                return redirect('forgot-password')->withErrors($validator);
            }
        } else {
            $data['pageTitle'] = "Forget Password";
            //$data['breadcamps'] = array('Home' => 'home', 'signup' => '#');

            return view('login.forget', $data);
        }
    }

    function encryptIt($q)
    {
        $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
        $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
        return ($qEncoded);
    }

    function decryptIt($q)
    {
        $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
        $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
        return ($qDecoded);
    }

}

?>