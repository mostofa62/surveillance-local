<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use App\RecoverPassword;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $successStatus = 200;
    public $unauthorizedStatus = 401;

    public function login_user(Request $request)
    {
        $username = $request->username;
        $user = User::where('username', $username)->with('employee')->first();
        
            if ($user) {
                $pass = $request->password;
                if ($user->status == 2) {
                  $msg = 'Thanks for login! Your account is block. Please contact with administrator.!!!';
                  return response()->json(['login_user'=> null, 'token'=>null,'msg'=>$msg,'success'=>101]);
                } else if ($user->status == 0) {
                  $msg = 'Thanks for login!Your information is under verification process.!!!
                          You can access the system after verification. For more query please contact with helpline.';
                  return response()->json(['login_user'=> null, 'token'=>null,'msg'=>$msg,'success'=>201]);
                } else if (md5($pass) == $user->password) {
                  $access_token = $user->username.$user->password;
                  $user->mobile_token = base64_encode($access_token);
                  $user->save();
                  $token = $user->mobile_token;
                  return response()->json(['login_user'=> $user, 'token'=>$token,'msg'=>'Login successfull','success'=>$this->successStatus]);
                } else {
                  $msg = 'Please check your username and password!!!';
                  return response()->json(['login_user'=> null, 'token'=>null,'msg'=>$msg,'success'=>202]);
                }
            } else {
                $msg = 'User not found!Please check your username!!!';
                return response()->json(['login_user'=> null, 'token'=>null,'msg'=>$msg,'success'=>$this->unauthorizedStatus]);
            }
    }

    public function check_forgot_password(Request $request)
    {

        $user = User::where('username', $request->input('username'))->first();
        if ($user) {
            $recover_pass_obj = new RecoverPassword();
            $recover_pass_obj->user_secret = $user->secret;
            $recover_pass_obj->recover_token = str_random(10);
            $recover_pass_obj->status = 0;
            $recover_pass_obj->save();
            $this->send_recover_password_mail($user->username, $user->secret, $recover_pass_obj->recover_token);
            $msg = "An Email has sent to your Email. Please follow the instruction of mail.";
            return response()->json(['msg'=>$msg]);


        } else {
            $msg = "User Not Found";
            return response()->json(['msg'=>$msg]);


        }
    }


    public function send_recover_password_mail($username, $secret, $recover_token)
    {
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
