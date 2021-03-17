<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Validator;

class UserController extends Controller
{
    public function index()
    {	
    	$users = DB::table('statu')
        ->join('user', function ($join) {
            $join->on('statu.id', '=', 'user.statu_id')
                 ->where('user.statu_id', '=', 1);
        })
        ->get();

        return view('index', compact('users') );
    }


    public function store(Request $request)
    {
        $user = $request->all();
        $validator = Validator::make($user, [
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'n_document' => 'required',
            'phone_number' => 'required',
        ]);

        if($validator->fails()){
            $errors = $validate->errors()->all();
                
            return Redirect::to( 'user.index' )
            ->withInput()
            ->withErrors( $errors );  
        }
        else{

            $userSave = new User;
            $userSave->email = $request['email'];
            $userSave->first_name = $request['first_name'];
            $userSave->last_name = $request['last_name'];
            $userSave->n_document = $request['n_document'];
            $userSave->phone_number = $request['phone_number'];
            $userSave->save();

            $mensaje = "Usuario creado con exito";
            return redirect()->route("user.index")
            ->with("mensaje", $mensaje);
        }
    }


    public function update(Request $request, $id)
    {       
        $user = $request->all();
        $validator = Validator::make($user, [
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'n_document' => 'required',
            'phone_number' => 'required',
        ]);

        if($validator->fails()){
            $errors = $validate->errors()->all();
                
            return Redirect::to( '/' )
            ->withInput()
            ->withErrors( $errors );    
        }
        else{
            $userUpdate = User::where(['id' => $id])->first();
            $userUpdate->email = $request['email'];
            $userUpdate->first_name = $request['first_name'];
            $userUpdate->last_name = $request['last_name'];
            $userUpdate->n_document = $request['n_document'];
            $userUpdate->phone_number = $request['phone_number'];
            $userUpdate->save();

            $mensaje = "Usuario editado con exito";
            return redirect()->route("user.index")
            ->with("mensaje", $mensaje);
        }
    }

    public function destroy($id)
    {
        $userDelete = User::where(['id'=>$id])->first();
        $userDelete->statu_id = 2;
        $userDelete->save();
        $mensaje = "Usuario eliminado con exito";
        return redirect()->route("user.index")
        ->with("mensaje", $mensaje);
    }
}
