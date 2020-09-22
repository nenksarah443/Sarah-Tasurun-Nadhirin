<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Transportation;
use Validator;

class TransportationControl extends Controller
{
    public function data(Request $req)
    {
    	$data = Transportation::where('transportation.description','like',"%$req->cari%")
		->orWhere('transportation.code','like', "%$req->cari%" )
		->orWhere('transportation_type.description','like', "%$req->cari%" )
		->join(
			'transportation_type',
			'transportation_type.id',
			'=',
			'transportation.transportation_typeid'
			)
		->select(
			'transportation.*',
			'transportation_type.*',
			'transportation.id as id',
			'transportation_type.id as typeid',
			'transportation_type.description as type',
			'transportation.description as desc_transportation'
			)
    	->paginate(10);
        return view('pages.transportation.data',['data'=>$data, 'cari'=>$req->cari]);
    }

    public function tambah()
    {
    	return view('pages.transportation.tambah');
    }

    public function simpan(Request $req)
    {
    	$valid = Validator::make($req->all(),[
            'deskripsi'=>'required|between:3,50',
            'kode'=>'required|between:3,50',
            'kapasitas'=>'required|digits_between:1,5|numeric',
            'tipe'=>'required|numeric',
            ]);

        if($valid->fails()){
            return redirect()->route('transportation.tambah')
                    ->withErrors($valid)
                    ->withInput()
                    ->with('status-alert','peringatan');
        }

        $result = Transportation::create([
                'description'=>$req->deskripsi,
                'code'=>$req->kode,
                'seat_qty'=>$req->kapasitas,
                'transportation_typeid'=>$req->tipe,
                
            ]);

        if($result){
            return redirect()->route('transportation.data')->with('status-alert','sukses');
        } else {
            return back()->with('status-alert','gagal');
        }

    }

    public function hapus(Request $req)
    {
    	$result = Transportation::where('id',$req->id)->delete();

        if($result){
            return redirect()->route('transportation.data')->with('status-alert','sukses-hapus');
        } else {
            return back()->with('status-alert','gagal');
        }
    }

    public function edit(Request $req)
    {
    	$result = Transportation::where('id',$req->id)->first();
         return view('pages.transportation.edit',['field'=>$result]);
    }

    public function update(Request $req)
    {
    	$valid = Validator::make($req->all(),[
            'deskripsi'=>'required|between:3,50',
            'kode'=>'required|between:3,50',
            'kapasitas'=>'required|digits_between:1,5|numeric',
            'tipe'=>'required|numeric',
            ]);

        if($valid->fails()){
            return redirect()->route('transportation.edit',['id'=>$req->id])
                    ->withErrors($valid)
                    ->withInput()
                    ->with('status-alert','peringatan');
        }

         $result = Transportation::where('id',$req->id)
                 ->update([
                'description'=>$req->deskripsi,  
                'code'=>$req->kode,
                'seat_qty'=>$req->kapasitas,
                'transportation_typeid'=>$req->tipe,
                
            ]);

        if($result){
            return redirect()->route('transportation.data')->with('status-alert','sukses');
        } else {
            return back()->with('status-alert','gagal');
        }

    }

    public function buat(Request $req)
   {
      return view('pages.transportation.buat');
   }

   public function render(Request $req)
   {

        $messages = [
        ];

       $valid = Validator::make($req->all(),[
            ], $messages);

        if($valid->fails()){
            return redirect()->route('transportation.report')
                    ->withErrors($valid)
                    ->withInput()
                    ->with('status-alert','peringatan');
         }

         $data = Transportation::join('transportation_type','transportation_typeid','=','transportation_type.id')
         ->join('rute','rute.transportationid','=','transportation.id')
         ->select(
            'transportation.*',
            'transportation_type.*',
            'rute.*',
            'transportation.id as id',
            'transportation_type.id as type_id',
            'rute.id as ruteid',
            'transportation.description as description',
            'transportation_type.description as type'
         )
               
               ->where('transportation_type.description', 'like', "%$req->type%") 
               ->OrderBy('transportation_type.description', 'asc')
               ->get();
         return view('pages.transportation.render',['data'=>$data, 'type'=>$req->type]);

   }
     
}

