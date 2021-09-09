<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function config(){
        return view('config');
    }
    public function update(request $request){
        $user = Auth::user();
        $id = $user->id;
        $oldimage=$user->image;

        $validate = $this->validate($request,[
            'name' => 'required', 'string', 'max:255',
            'surname' => 'required', 'string', 'max:255',
            'nick' => 'required', 'string', 'max:255','unique:users','nick,'.$id,
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users','email,'.$id,
        ]);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->nick = $nick;

        
        //Subir imagen
        $image_path = $request->file('image_path');
        //Comprobar que llega la imagen
        if($image_path){
            
            Storage::disk('users')->delete($oldimage);
            //La nombramos en una  variable
            $image_path_name = time().$image_path->getClientOriginalName();
            //La insertamos en la carpeta user, ponemos el nombre y conseguimos el archivo
            Storage::disk('users')->put($image_path_name, File::get($image_path));
            $user->image = $image_path_name;
            
        }
        $user->update();

        return redirect()->route('config')
        ->with(['message'=>'Usuario actualizado correctamente y avatar anterior eliminado']);
    }
    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file,200);
    }
}
