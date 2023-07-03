<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heading extends Model
{
    use HasFactory;

    protected $fillable = ['title','parent_id'];

    public function parent(){
        return $this->belongsTo(Heading::class,'parent_id');
    }
    public function children(){
       return $this->hasMany(Heading::class,'parent_id');
    }


}
