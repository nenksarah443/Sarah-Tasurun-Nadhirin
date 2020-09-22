<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';
    public $timestamps = false;
    protected $fillable = [ 'id',
    						'reservation_code',
    						'reservation_at',
    						'reservation_date',
    						'customerid',
    						'seat_code',
    						'id_jadwal',
    						'depart_at',
    						'price',
                            'jumlah',
                            'keterangan',
    						'userid'];
}
