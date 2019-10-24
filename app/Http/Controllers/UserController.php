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
            'name'           =>  'required | string',
            'last_name'      =>  'string',
            'email'          =>  'string | unique:users,email',
            'dni'           =>  'unique:users,dni| numeric',
            'phone'           =>  'string',
            'cuit'          => 'numeric | unique:users,cuit',
            'employee_start_date'   =>  'date',
            'birth_date'    =>  'date',
            'tcn_state'     =>  'boolean',
            'city_id'       =>  'required | numeric'
            
        ]);

        App\User::create(request([
            'name',
            'last_name',
            'email',
            'dni',
            'cuit',
            'phone',
            'birth_date',
            'employee_start_date',
            'city_id'
        ]));
        return redirect('/home');
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
            'last_name'      =>  'string',
            'email'          =>  "string | unique:users,email,$_id",
            'dni'           =>  "unique:users,dni,$_id",
            'phone'           =>  'string',
            'cuit'          => "unique:users,cuit,$_id",
            'employee_start_date'   =>  'date',
            'birth_date'    =>  'date',
            'city_id'       =>  'required | numeric',
            'photo'         =>  'image | mimes:jpeg,png,jpg,gif|max:2048'
            
        ]);
        
        if($request->has('photo')){
            $image = $request->file('photo');
            $name = "User$_id";
            $folder = "/images/users/";
            $filePath = "$folder$name.".$image->getClientOriginalExtension();
            $this->uploadOne($image,$folder,'public',$name);
            $request['photo_url'] = $filePath;
        }
        else{
            dd($request);
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
            'photo_url'
        ]));
        switch($request['redirectTo']){
            default:
                return redirect('/home');
            case 'work_with_us':
                $user->update(['tcn_state'=>1]);
                return redirect('/work_with_us');
                    
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
         //check if user is logged in and is administrator
        auth()->user()->hasAnyRole(['ADMIN']);
        
        $user->delete();
        
        
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
