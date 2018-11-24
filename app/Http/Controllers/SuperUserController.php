<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SuperUser;
use Illuminate\Support\Str;
use App\VerifyUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;

class SuperUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:super',['only' => 'index','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superuser.dashboard');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('superuser.auth.register');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:155',
            'username' => 'required|string|email|max:55|unique:users',
        ]);
    }

    public function store(Request $request)
    {
        

        // store in the database
        $pwd = Str::random(6);

        $super_users = new SuperUser;
        $super_users->name = $request->name;
        $super_users->username = $request->username;
        $super_users->id_admin = $request->id;
        $super_users->password=Hash::make($pwd);
        $super_users->save();
    
        return redirect()->back()        
        ->with('status', 'Super User Baru berhasil ditambah. Username : '.$super_users->username.' - Password: '.$pwd);
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


    public function loginSuper(Request $request){
        
        $username = $request->username;
        $password = $request->password;
        $data = SuperUser::where('username',$username)->first();
        
        if($data){ 
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('username',$data->username);
                Session::put('login',TRUE);
                Session::push('super.user', $data);

                return redirect('menuz');

            }
            else{
                return redirect('dashboard')->with('status','Password atau username, Salah !'.Hash::check($password,$data->password));
            }
        }
        else{
            return redirect('dashboard')->with('status','Password atau username, Salah!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('admin')->with('status','Anda sudah logout dari super user');
    }
}