<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Image extends Model
{
    use HasFactory;
    protected $table = 'images';

    //Relacion One To Many / una imagen muchos comentarios
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    //Relacion One To Many // Una imagen muchos likes
    public function likes(){
        return $this->hasMany('App\Models\Like');
    }

    //Relacion Many to One // muchas imagenes un usuario
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
