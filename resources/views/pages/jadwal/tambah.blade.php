@extends('layouts.main')
@section('content')
<h1>Jadwal</h1>
<hr>

<!-- Alert -->
@if(session('status-alert') == 'peringatan')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
	<strong>Oups, terjadi kesalahan !</strong> Data anda gagal disimpan, dikarenakan ada kesalahan silahkan untuk mengecheck kembali.
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if(session('status-alert') == 'gagal')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>Gagal dihapus !</strong> Data anda gagal dihapus pada database, silahkan ulangi kembali.
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

<!-- formulir -->

<?php
		$code = App\Rute::join( 'transportation','transportation.id','=','rute.transportationid')
				->join(
					'transportation_type',
					'transportation_type.id',
					'=',
					'transportation.transportation_typeid'
				)
				->select(
					'rute.*',
					'transportation.*',
					'transportation_type.*',
					'rute.id as id_rute',
					'transportation.id as id.transportation',
					'transportation_type.id as id_type',
					'transportation.description as desc_transportation',
					'transportation_type.description as type'

				
											
					)
				->where('rute.id', $id_rute)->first();
										

?>


<div class="card border-primary mb-3">
	<div class="card-header bg-primary text-white">Tambah Jadwal</div>
		<div class="card-body">
			<form method="post" action="{{route('jadwal.simpan')}}">
				{{csrf_field()}}


		<div class="form-group">
			

			<input type="hidden" name="kapasitas" value="{{ $code->seat_qty}}">

				<div class="form-row">
					<div class="col-sm-12">
						<div class="form-row">
							<div class="form-group col-sm-4">
								<label>Nama</label>
								<input type="text" class="form-control " value="{{$code->code}}" disabled>
							</div>

						<div class="col-sm-6">
							<input type="hidden" name="id_rute" class="{{$errors->has('id_rute')?'is-invalid':''}}"value="{{$id_rute}}" />

							@if($errors->has('id_rute'))
							<div class="invalid-feedback">
								{{$errors->first('id_rute')}}
							</div>
							@endif
						</div>
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-sm-4">
						<label>Kapasitas</label>
						<input type="text" class="form-control " value="{{$code->seat_qty}}" disabled/>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-sm-4">
						<label>Rute</label>
						<input type="text" class="form-control " value="{{$code->rute_from}} - {{$code->rute_to}}" disabled/>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-4">
						<label>Jadwal</label>
							<div class="input-group date" id="tanggal" data-target-input="nearest">
					<input type="text" name="tanggal" class="form-control {{$errors->has('tanggal')?'is-invalid':''}}" value="{{ Request::old('tanggal') }}" data-target="#tanggal" required />
						<div class="input-group-append" data-target="#tanggal" data-toggle="datetimepicker">

					<span class="input-group-text">
						<i class="fa fa-aw fa-calendar-alt text-dark"></i>
					</span>
							</div>
						@if($errors->has('tanggal'))
					<div class="invalid-feedback">
						{{$errors->first('tanggal')}}
						</div>
						@endif
					</div>
						<small class="text-muted">
							Contoh : 2018-10-31 10:30
						</small>
				</div>
				
				





			<div class="col-6">
			<div class="card border-primary mt-3">
			<div class="card-header bg-primary text-white">Keterangan</div>
			<div class="card-body">
			<table cellpadding="4">
					<tr>
						<td>Kode/Nama Transportasi</td>
						<td>: <span id="code">{{$code->code}}</span></td>
					</tr>
					<tr>
						<td>Tipe</td><td>:   
							<span id="type">{{$code->description}}</span></td>
					</tr>
					<tr>
						<td>Rute</td>
						<td>: 
						<span id="dari">{{$code->rute_from}}</span>
						<span class="fa fa-aw fa-arrow-alt-circle-right"></span>
						<span id="ke">{{$code->rute_to}}</span>
						</td>
					</tr>
					<tr>
						<td>Kapasitas</td><td>: <span>{{$code->seat_qty}}</span></td>
					</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>

				
		

			
				

				<hr>
				<div class="form-group text-right">
					<p>
						Pilih "Simpan" apabila akan menyimpan data yang dimasukan pada formulir diatas.
					</p>
					<a href="{{ route('rute.data') }}" class="btn btn-secondary">Cancel</a>
					<button type="submit" class="btn btn-info">Simpan</button>
				</div>
	</div>
			</form>
			</div>
					
		</div>
		<div class="card-footer bg-info"></div>
	</div>
@endsection
@push('js')

<script type="text/javascript" src="{{url('vendor/tempusdominus/js/moment.min.js')}}" ></script>
<script type="text/javascript" src="{{url('vendor/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}" ></script>

<script type="text/javascript">
	$(function () {
		$('#tanggal').datetimepicker({
			icons : {
			time : "fa fa-aw fa-clock text-primary",
			date : "fa fa-aw fa-calendar-alt text-primary",
			up : "fa fa-aw fa-arrow-up",
			down : "fa fa-aw fa-arrow-down",
		},
			format : "YYYY-MM-DD HH:mm",
		});

		
	});
</script>

@endpush

@push('css')
<link rel="stylesheet" type="text/css" href="{{url('vendor/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush
