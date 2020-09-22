<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
     protected $table = 'jadwal';
   	 public $timestamps = false;
     protected $fillable = ['id','id_rute','depart_at','kapasitas'];
}
