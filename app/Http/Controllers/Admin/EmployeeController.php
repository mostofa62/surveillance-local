<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Employee;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $this->checkrole();
        $employees = Employee::orderBy('name', 'asc');
        $pagetitle="Employee Lists";

        if ($request->name) {
            $employees = $employees->where('name', 'like', '%' . $request->name . '%');
            $pagetitle= "Employee Search Results";
        }

        if ($request->email) {
            $employees = $employees->where('email', 'like', '%' . $request->email . '%');
            $pagetitle= "Employee Search Results";
        }

        if ($request->phone) {
            $employees =$employees->where('mobile', 'like', '%' . $request->phone . '%');
            $pagetitle= "Employee Search Results";
        }

        if ($request->dept) {
            $employees = $employees->where('dept',$request->dept );
            $pagetitle= "Employee Search Results";
        }

        $employees=$employees->paginate(30);


        view()->share('pageTitle', $pagetitle);
        view()->share('employees', $employees);
        view()->share('breadcamps', array('Home' => url('admin/dashboard'), 'Employee' => url('admin/employee')));
        return view('admin/employee/index');
    }

    public function create()
    {
        $this->checkrole();
        view()->share('pageTitle', "Employee Create");
        view()->share('breadcamps', array('Home' => url('admin/dashboard'), 'Employee' => url('admin/employee'), 'Add Employee' => url('admin/employee/create')));
        return view('admin/employee/create');
    }


    public function store(Request $request)
    {
        $this->checkrole();
        $this->validate($request, [
            'name' => 'required',
            'father_name' => 'nullable',
            'mother_name' => 'nullable',
            'dept' => 'nullable',
            'designation' => 'nullable',
            'marital_status' => 'nullable',
            'gender' => 'nullable',
            'blood_group' => 'nullable',
            'address' => 'nullable',
            'mobile' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg',
            'email' => 'required|email|unique:employees',
            'username' => 'required|unique:users',
            'accesslist_id' => 'required',
            'project_id' => 'required',
            'site_id' => 'required'
        ]);
        if ($request->file('image')) {
            
            $originalName = $request->file('image')->getClientOriginalName();
            $fileName = md5(rand(15000000, 24678543)) . '.' . pathinfo($originalName, PATHINFO_EXTENSION);
            $request->file('image')->move(
                base_path() . '/public/uploads/', $fileName
            );
        }
        $employee = new Employee();
        $employee->name = $request->get('name');
        $employee->father_name = $request->get('father_name');
        $employee->mother_name = $request->get('mother_name');
        $employee->dept = $request->get('dept');
        $employee->designation = $request->get('designation');
        $employee->marital_status = $request->get('marital_status');
        $employee->gender = $request->get('gender');
        $employee->nid = $request->get('nid');
        $employee->blood_group = $request->get('blood_group');
        $employee->email = $request->get('email');
        $employee->address = $request->get('address');
        $employee->mobile = $request->get('mobile');
        if ($request->file('image')) {
            $employee->imagefile = $fileName;
        }
        $employee->user_id = \Auth::User()->id;

        $employee->save();
        $rand = rand(15000000, 24678543);

        $user = new User();
        $user->employee_id = $employee->id;
        $user->username = $request->get('username');
        $user->password = md5($request->get('username'));
        $user->accesslist_id = json_encode(array($request->get('accesslist_id')));
        $user->project_id = $request->get('project_id');
        $user->site_id = $request->get('site_id');
        $user->status = 1;
        $user->parent_id = \Auth::User()->id;
        $user->save();
        ///***
        /// SEnd email
        ///
        $link = "confirm-email/" . $this->encryptIt($request->get('username'));
        $data = [
            'password' => $rand,
            'link' => $link,
            'username' => $request->get('username'),
            'email' => $request->get('email')
        ];
//        Mail::send('emails.conf', $data, function ($message) use ($data) {
//            $message->from("onreply@zinnahgroup.com", "Registration Confirm Email");
//            $message->subject("Registration Confirm Email");
//            $message->to($data['email']);
//        });
        return redirect('admin/employee')->with('message', 'সফলভাবে সংরক্ষিত');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->checkrole();
        view()->share('pageTitle', "Employee Details");
        view()->share('breadcamps', array('Home' => url('admin/dashboard'), 'Employee' => url('admin/employee'), 'Employee Details' => url('admin/employee/' . $id)));


        $employee = Employee::find($id);
        view()->share('info', $employee);
        return view('admin/employee/detail');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->checkrole();
     
        view()->share('pageTitle', "Update Employee");
        view()->share('breadcamps', array('Home' => url('admin/dashboard'), 'Employee' => url('admin/employee'), 'Update Employee' => url('admin/employee/' . $id . '/edit')));

        $employee = Employee::find($id);

        view()->share('employee', $employee);
        return view('admin/employee/create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->checkrole();
        $this->validate($request, [
            'name' => 'required',
            'father_name' => 'nullable',
            'mother_name' => 'nullable',
            'dept' => 'nullable',
            'designation' => 'nullable',
            'marital_status' => 'nullable',
            'gender' => 'nullable',
            'blood_group' => 'nullable',
            'address' => 'nullable',
            'mobile' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg',
//            'email' => 'required|email|unique:employees',
//            'username' => 'required|unique:users',
            'accesslist_id' => 'required',
            'project_id' => 'required',
            'site_id' => 'required'
        ]);
        if ($request->file('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $fileName = md5(rand(15000000, 24678543)) . '.' . pathinfo($originalName, PATHINFO_EXTENSION);
            $request->file('image')->move(
                base_path() . '/public/uploads/', $fileName
            );
        }

        $employee = Employee::find($id);
        $employee->name = $request->get('name');
        $employee->father_name = $request->get('father_name');
        $employee->mother_name = $request->get('mother_name');
        $employee->dept = $request->get('dept');
        $employee->designation = $request->get('designation');
        $employee->marital_status = $request->get('marital_status');
        $employee->gender = $request->get('gender');
        $employee->nid = $request->get('nid');
        $employee->blood_group = $request->get('blood_group');
        $employee->mobile = $request->get('mobile');
        $request->file('image') ? $employee->imagefile = $fileName : '';
        $employee->save();

        if (!empty($request->get('accesslist_id'))) {
            $user = User::find($employee->user->id);
//            $user->username = $request->get('username');
            $user->accesslist_id = json_encode(array($request->get('accesslist_id')));
            $user->project_id = $request->get('project_id');
            $user->site_id = $request->get('site_id');
            $user->save();
        }
        return redirect('admin/employee')->with('message', 'সফলভাবে সংরক্ষিত');
//        $previous_url = $request->input('previous_url');

//        return redirect($previous_url)->with('message', 'সফলভাবে সংরক্ষিত');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkrole();
        $employee = Employee::find($id);
        $employee->delete();
        $user = User::find($employee->user->id);
        $user->status = 0;
        $user->save();
        $user->delete();
    }
    public function statusUpdate(Request $request,$id)
    {
        $this->checkrole();
        $employee = Employee::find($id);
        $user = User::find($employee->user->id);
        if ($request->status == "deactive"){
            $user->status = 2;
        } elseif ($request->status == "active"){
            $user->status = 1;
        }
        $user->save();
    }


    function checkrole(){

        $access=session('accesslist_id');

        if(in_array(1,$access)|| in_array(2,$access)){
//            return redirect(session('access').'home')->send();
        }
        else
            return redirect(session('access').'home')->send();
    }


    function encryptIt($q)
    {
        $qEncoded = base64_encode($q);
        return ($qEncoded);
    }

    function decryptIt($q)
    {
        $qDecoded =base64_decode($q);
        return ($qDecoded);
    }


}
