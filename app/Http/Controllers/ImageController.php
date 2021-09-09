<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function create(){
        return view('image.create');
    }
    public function save(Request $request){
$validate = $this->validate($request, [
    'description' => 'required',
    'image_path' => 'required|image'
]);

        $user = Auth::user();
        $image = new Image();

        $image_path = $request->file('image_path');
        $description = $request->input('description');
       
        $image->user_id = $user->id;
        $image->description = $description;

        if($image_path){

            //La nombramos en una  variable
            $image_path_name = time().$image_path->getClientOriginalName();
            //La insertamos en la carpeta user, ponemos el nombre y conseguimos el archivo
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }
        $image->save();
        return redirect()->route('home')->with(['message','Foto subida correctamente']);
    }

}
