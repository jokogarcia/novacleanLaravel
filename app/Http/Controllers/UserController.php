<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
class UserController extends Controller
{
    use UploadTrait;
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //check if user is logged in and is administrator
        
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        return view('/users/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/users/create');
    }
    public function clientCreate()
    {
        //
        return view('/clients/create');
    }
    public function employeeCreate()
    {
        //
        return view('/employees/create');
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
        
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        $request->validate([
            'name'          =>  'required | string',
            'last_name'     =>  'string | nullable',
            'email'         =>  'string | unique:users,email',
            'password'      =>  'string | required',
            'dni'           =>  'unique:users,dni| numeric | nullable',
            'phone'         =>  'string | nullable',
            'cuit'          =>  'numeric | unique:users,cuit| nullable',
            'user_role_id' =>  'numeric',
            'employee_start_date'   =>  'nullable | sometimes | date',
            'birth_date'    =>  'date | nullable',
            'tcn_state'     =>  'boolean',
            'city_id'       =>  'required | numeric',
            'photo'         =>  'image | mimes:jpeg,png,jpg,gif|max:2048 | nullable',
            'condicion_afip_id' => 'numeric'
            
        ]);
        
        $request['password'] = bcrypt($request['password']);
       $newuser = \App\User::create(request([
            'name',
            'last_name',
            'email',
            'password',
            'dni',
            'cuit',
            'phone',
            'birth_date',
            'employee_start_date',
            'city_id',
            'user_role_id',
            'condicion_afip_id'
        ]));
       if($request->has('photo')){
            $image = $request->file('photo');
            $name = "User$newuser->id";
            $folder = "/images/users/";
            $filePath = "$folder$name.".$image->getClientOriginalExtension();
            $this->uploadOne($image,$folder,'public',$name);
            $request['photo_url'] = $filePath;
        }
        $newuser->update(request(['photo_url']));
        return redirect('/users/'.$newuser->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        return view('/users/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        if($user->id != auth()->user()->id){
            auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        }
        return view('/users/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        
        if($user->id != auth()->user()->id){
            auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        }
        //return view('/users/edit', compact('user')); 
        $_id= intval($user->id);
        $request->validate([
            'name'           =>  'required | string',
            'last_name'      =>  'string | nullable',
            'email'          =>  "string | unique:users,email,$_id",
            'dni'           =>  "unique:users,dni,$_id | nullable",
            'phone'           =>  'string | nullable',
            'cuit'          => "unique:users,cuit,$_id | nullable",
            'employee_start_date'   =>  'nullable | sometimes | date',
            'birth_date'    =>  'date | nullable',
            'city_id'       =>  'required | numeric',
            'photo'         =>  'image | mimes:jpeg,png,jpg,gif|max:2048 | nullable',
            'condicion_afip_id' => 'numeric'
            
        ]);
        
        if($request->has('photo')){
            $image = $request->file('photo');
            $name = "User$_id";
            $folder = "/images/users/";
            $filePath = "$folder$name.".$image->getClientOriginalExtension();
            $this->uploadOne($image,$folder,'public',$name);
            $request['photo_url'] = $filePath;
        }
        
        $user->update(request([
            'name',
            'last_name',
            'email',
            'dni',
            'cuit',
            'phone',
            'employee_start_date',
            'birth_date',
            'city_id',
            'photo_url',
            'condicion_afip_id'
        ]));
        switch($request['redirectTo']){
            case '':
                return redirect('/home');
            case 'work_with_us':
                $user->update(['tcn_state'=>1]);
                return redirect('/work_with_us');
            default: return redirect($request['redirectTo']);
                    
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( User $user,Request $request)
    {
         //check if user is logged in and is administrator
        auth()->user()->hasAnyRole(['ADMIN']);
        
        $user->delete();
        $redirectURL =$request["redirectTo"];
        return redirect($redirectURL);
        
    }
    
    public function clientIndex()
    {
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        return view('/clients/index');
    }
    public function employeeIndex()
    {
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        return view('/employees/index');
    }
    public function candidateIndex()
    {
        auth()->user()->hasAnyRole(['ADMIN','SUPERVISOR']);
        return view('/candidates/index');
    }
    public function ApiShowEmployee(User $user){
        abort_unless($user->UserRole->role_name == "EMPLOYEE" ||
                $user->UserRole->role_name == "SUPERVISOR" );
        return $user;
        
    }
    public function ApiHome(){
        $userId = Auth()->user()->id;
        $fullUser = \App\User::with('Locations')->find($userId);
        return $fullUser;
        
    }
    
}
