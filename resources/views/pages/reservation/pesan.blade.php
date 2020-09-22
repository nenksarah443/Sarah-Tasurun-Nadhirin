@extends('layouts.main')
@section('content')

<h1>Reservasi</h1>

<!--Alert-->
@if(session('status-alert') == 'peringatan')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
	<strong>Ada Kesalahan !</strong> Data gagal disimpan, karena ada kesalahan silahkan check kembali.
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if(session('status-alert') == 'gagal')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>Gagal Disimpan!</strong> Data gagal disimpan ke dalam database, silahkan ulangi kembali.
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif


<?php
$jp = App\TransportationType::where('id',$id_type)->first();


if ($jp->description == 'Kereta Api') {
	$tool = new App\Library\Tools();
} elseif ($jp->description == 'Pesawat') {
	$tool = new App\Library\ToolsPesawat();
}



$pelanggan = App\Customer::where('id', $id_customer)->first();

$jadwal = App\Jadwal::join('rute', 'rute.id', 'jadwal.id_rute')
		->join('transportation', 'transportation.id', 'rute.transportationid')
		->join('transportation_type', 'transportation_type.id', 'transportation.transportation_typeid')
		->select(
			    'jadwal.*',
				'rute.*',
				'transportation.*',
				'transportation_type.*',
				'jadwal.id as id',
				'rute.id as rute_id',
				'transportation.id as transportasi_id',
				'transportation_type.id as type_id',
				'jadwal.depart_at as depart_at_jad',
				'rute.depart_at as depart_at_rute',
				'transportation.description as desc_transportasi',
				'transportation_type.description as type'
			)
		->where('transportation_typeid', $id_type)
		->orderBy('rute.rute_from', 'asc')
		->get()

?>
<div class="card border-primary mb-3">
	<div class="card-header bg-primary text-white">Tambah Pelanggan</div>
	<div class="card-body">
		<form method="post" action="{{route('reservation.simpan')}}">
			{{csrf_field()}}
			<input type="hidden" name="id_customer" value="{{$id_customer}}">
			<input type="hidden" name="id_type" value="{{$id_type}}">
			<input type="hidden" name="kode_reservasi" value="{{$tool->coderes()}}">
			<input type="hidden" name="harga" id="harga">
			<input type="hidden" name="tanggal" id="jadwall">
			<input type="hidden" name="jum" value="1">

			<div class="form-row">
				
				<div class="form-group col-sm-4">
					<label>Nama</label>
					<input type="text" class="form-control" value="{{$pelanggan->name}}" disabled>
				</div>

				<div class="form-group col-sm-4 offset-sm-2">
					<label>Kode Reservasi</label>
					<input type="text" class="form-control" value="{{$tool->coderes()}}" disabled>
				</div>

			</div>

			<div class="form-row">
				<div class="col-sm-6">
					<div class="form-row">
						<div class="form-group col-sm-8">
							<label>Jadwal</label>
							<select name="jadwal" id="jadwal" class="form-control {{$errors->has('jadwal'?'is-invalid':'')}}" required autofocus>
								<option value="">Pilih : </option>
								<?php
									$val = Request::old('jadwal');
								?>
								@foreach($jadwal as $row)
								<option value="{{$row->id}}" id="jadwal" {{$val == $row->id?'selected="selected"':''}}>
								{{$row->depart_at_jad}}	{{$row->rute_from}} -> {{$row->rute_to}} / {{$row->code}}
								</option>
								@endforeach
							</select>
							@if($errors->has('jadwal'))
							<div class="invalid-feedback">
								{{$errors->first('jadwal')}}
							</div>
						@endif
						</div>
					</div>

				<div class="form-row">
					<div class="form-group col-sm-6">
						<label>Kode Tempat Duduk</label>
						<input type="text" name="tempat_duduk" class="form-control {{$errors->has('tempat_duduk')?'is-invalid':''}}" value="{{Request::old('tempat_duduk')}}" required>

						@if($errors->has('tempat_duduk'))
						<div class="invalid-feedback">
							{{$errors->first('tempat_duduk')}}
						</div>
						@endif
						<small class="text-muted">
						Panjang Karakter 2-10, Contoh : VP01
					</small>
					</div>
				</div>


				


			</div>

				<div class="col-sm-6">
					<div class="card border-primary mt-3">
						<div class="card-header bg-primary text-white">Keterangan</div>
						<div class="card-body">
							<table cellpadding="4">
								<tr>
									<td>Code/Nama Transportasi</td><td>: <span id="code"></span></td>
								</tr>

								<tr>
									<td>Type</td><td>: <span id="type"></span></td>
								</tr>

								<tr>
									<td>Deskripsi</td><td>: <span id="desc"></span></td>
								</tr>

								<tr>
									<td>Rute</td>
									<td> :
										<span id="dari"></span>
										<span class="fas fa-aw fa-arrow-alt-circle-right"></span>
										<span id="ke"></span>
									</td>
								</tr>

								<tr>
									<td>Waktu Pemberangkatan</td><td>: <span id="depjad"></span></td>
								</tr>

								<tr>
									<td>Harga</td><td>: <span id="harga_format"></span></td>
								</tr>
							</table>
						</div>
					</div>
				</div>

			</div>


			<hr>
			<div class="form-group text-right">
				<p>
					Pilih "Simpan" apabila akan menyimpan data yang di masukan pada formulir diatas.
				</p>
				<a href="{{route('reservation.data')}}" class="btn btn-danger">Cancel</a>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>

		</form>
		
	</div>
	<div class="card-footer bg-primary"></div>
</div>

@endsection

@push('js')
<script type="text/javascript">
var obj  = [
	{
		jadwall : "",
		depjad : "",
		code : "",
		type : "",
		harga : "",
		harga_format : "",
		desc : "",
		dari : "",
		ke : "",
	},
	@foreach($jadwal as $row)
	{
		jadwall : "{{$row->depart_at_jad}}",
		depjad : "{{$row->depart_at_jad}}",
		code : "{{$row->code}}",
		type : "{{$row->type}}",
		harga : "{{$row->price}}",
		harga_format : "{{number_format($row->price,0,',','.')}}",
		desc : "{{$row->desc_transportasi}}",
		dari : "{{$row->rute_from}}",
		ke : "{{$row->rute_to}}",
	},
	@endforeach
];

$(function() {
	imRute();
	$('#jadwal').on('change', function() {
		imRute();
	});
});

function imRute(){
	var idx = $('#jadwal')[0].selectedIndex;
	$('#code').html(obj[idx].code);
	$('#type').html(obj[idx].type);
	$('#dari').html(obj[idx].dari);
	$('#desc').html(obj[idx].desc);
	$('#ke').html(obj[idx].ke);
	$('#harga_format').html(obj[idx].harga_format);
	$('#depjad').html(obj[idx].depjad);
	$('#harga').val(obj[idx].harga);
	$('#jadwall').val(obj[idx].jadwall);
}
</script>

<script type="text/javascript" src="{{url('vendor/tempusdominus/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{url('vendor/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script type="text/javascript">
	$(function() {
		$('#tanggal').datetimepicker({
			icons : {
				time : "fa fa-aw fa-clock",
				date : "fa fa-aw fa-calendar-alt",
				up : "fa fa-aw fa-arrow-up",
				down : "fa fa-aw fa-arrow-down",
			},

			format : "YYYY-MM-DD HH:mm:ss"
		});

		$('#tanggal').on("change.datetimepicker",function(e){
			$('#tanggal').datetimepicker('minDate',e.date);
		});
		
	});
</script>
@endpush

@push('css')
<link rel="stylesheet" type="text/css" href="{{url('vendor/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush