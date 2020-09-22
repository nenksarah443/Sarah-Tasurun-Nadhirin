<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Jadwal;
use Validator;

class JadwalControl extends Controller
{
    public function data(Request $req)
    {
        $cari = $req->cari;
       
        $data = Jadwal::join('rute','rute.id','=','jadwal.id_rute')
        ->join('transportation','transportation.id','=','rute.transportationid')
        ->join(
            'transportation_type',
            'transportation_type.id',
            '=',
            'transportation.transportation_typeid'
            )
        ->select(
                'jadwal.*',
                'rute.*',
                'transportation.*',
                'jadwal.id as id',
                'transportation.id as transportationid',
                'rute.id as id_rute',
                'jadwal.depart_at as jadwalberangkat',
                'transportation.seat_qty as kapasitas',
                'transportation_type.description as deskripsi',
                'jadwal.kapasitas as seat_qty_jad'
        )       
        ->where(function($query) use ($cari){
                 $query->orWhere('jadwal.id','like',"%$cari%");
        })
        ->orderBy('transportation_type.description','asc')
        ->orderBy('jadwal.depart_at','asc')
        ->orderBy('transportation.code','asc')
        ->paginate(10);

               return view('pages.jadwal.data',['cari'=>$req->cari, 'tipe'=>$req->deskripsi, 'data'=>$data]);
    }

    public function tambah(Request $req){
    
        return view('pages.jadwal.tambah',[
            'id_rute'=>$req->id_rute
        ]);
    }

 public function simpan(Request $req)
        {
     $valid = Validator::make($req->all(),[
            'id_rute'=>'required|numeric|unique:jadwal,id_rute',
            'kapasitas'=>'required|numeric',
            'tanggal'=>'required|date|after:tomorrow',
        ],
        [   
            'id_rute.unique' => 'Jadwal sudah pernah dibuat',
            'tanggal.after' => 'Tanggal harus tanggal lusa',
        ]);

        if($valid->fails()){
            return redirect()->route('jadwal.tambah',[
                    'id_rute'=>$req->id_rute
            ])
                    ->withErrors($valid)
                    ->withInput()
                    ->with('status-alert','Peringatan');
        }
        $result = Jadwal::create([
                    'id_rute'=>$req->id_rute,
                    'depart_at'=>$req->tanggal,
                    'kapasitas'=>$req->kapasitas 
        ]);

        if($result){
            return redirect()->route('jadwal.data')
            ->with('status-alert','sukses');
        }else{
            return redirect()->route('jadwal.tambah',[
            'id_rute'=>$req->id_rute
        ])->with('status-alert','gagal');
        }
    }

    public function edit(Request $req)
    {
        $result = Jadwal::where('id',$req->id)->first();
        return view('pages.jadwal.edit',['field'=>$result]);
    }

     public function update(Request $req)
    {
         $valid = Validator::make($req->all(),[
            'tanggal'=>'required|date|after:tomorrow',
        ],
        [   
            'tanggal.after' => 'Tanggal harus tanggal lusa',
        ]);


        if($valid->fails()){
            return redirect()->route('jadwal.edit',['id'=>$req->id])
                    ->withErrors($valid)
                    ->withInput()
                    ->with('status-alert','Peringatan');
   }   
            $result = Jadwal::where('id',$req->id)
            ->update([
                    'depart_at'=>$req->tanggal,
            ]);

        if($result){
            return redirect()->route('jadwal.data')->with('status-alert','sukses');
        }else{
            return back()->with('status-alert','gagal');
        }   
    }   

    public function hapus(Request $req)
    {
          $result = Jadwal::where('id',$req->id)->delete();

        if($result){
            return redirect()->route('jadwal.data')->with('status-alert','sukses-hapus');
        }else{
            return back()->with('status-alert','gagal');
        }
    }


}