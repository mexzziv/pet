<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
  protected $fillable = ['name','tag','created_at','updated_at'];

  public static function getPets($limit){
    return Pets::select('id','name','tag')->limit($limit)->get();
  }

  public static function createPet($name,$tag){
    return Pets::create([
      'name' => $name,
      'tag' => $tag
    ]);
  }
}
