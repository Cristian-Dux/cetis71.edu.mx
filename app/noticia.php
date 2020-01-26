<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class noticia extends Model
{
    //
    protected $table="noticias";
    protected $fillable = ["titulo","descripcion","urlfoto"];
}
