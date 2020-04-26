<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
class UserController extends Controller
{
    //si el usuario y contraseña coincide, generará un token.
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $response = compact('token');
        $response['user'] = Auth::user();
        return response()->json($response);
    }
    
public function logout() {
    Auth::logout();

    return view('auth.login');
}
    

    public function getIndexUsers(){
        return view('users.index');
    }

    public function index(){
         $users =  User::select('name','email','role','id','created_at','updated_at')->get();
         return response()->json(['users'=>$users]);
    }


    public function store(CreateUserRequest $request)
    {
         $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>$request->role
        ]);
        return response()->json($user);
    }

    
    public function update(UpdateUserRequest $request,User $user)
    {
          $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>$request->role
        ]);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(['menssage'=>'registro eliminado Exitosamente']);
    }
   
}
