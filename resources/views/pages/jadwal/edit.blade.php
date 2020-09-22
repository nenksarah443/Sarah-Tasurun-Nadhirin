@extends('layouts.main')
@section('content')

	<h1>Jadwal</h1>
	<hr>

	<!-- Alert -->
	@if(session('status-alert') == 'peringatan')
	<div class="alert alert-warning alert-dismissable fade show" role="alert">
		<strong>Oups,ada kesalahan!</strong> Data gagal disimpan karena ada kesalahan, silahkan diperiksa kembali.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif

	@if(session('status-alert') == 'gagal')
	<div class="alert alert-danger alert-dismissable fade show" role="alert">
		<strong>Gagal dihapus!</strong> Data gagal dihapus pada database, silahkan ulangi kembali.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif

	<div class="card border-info mb-3">
		<div class="card-header bg-info text-white">Edit Jadwal</div>
		<div class="card-body">
			<form method="post" action="{{ route('jadwal.update') }}">
			{{csrf_field()}}

			<input type="hidden" name="id" value="{{ $field->id }}">
				  <div class="form-row">
							<div class="form-group col-sm-4">
								<label>Jadwal</label>
								<div class="input-group date" id="tanggal"  data-target-input="nearest" >					
				 					<input type="text" name="tanggal" value="{{Request::old('tanggal',$field->depart_at)}}" class="form-control" data-target="#tanggal" required>
									<div class="input-group-append" data-target="#tanggal" data-toggle="datetimepicker">
										<span class="input-group-text">
											<i class="fa fa-aw fa-calendar-alt text-primary"></i>
										</span>
									</div>
										@if($errors->has('tanggal'))
										<div class="invalid-feedback">
										{{ $errors->first('tanggal') }}
										</div>
										@endif
										</div>
										<small class="text-muted">
										Contoh : 2018-10-31 22:35:15
										</small>
										
								</div>
							</div>

				<hr>
				<div class="form-group text-right">
					<p>
						Pilih "Simpan" apabila akan menyimpan data yang dimasukan pada formulir diatas.
					</p>
					<a href="{{ route('jadwal.data') }}" class="btn btn-secondary">Cancel</a>
					<button type="submit" class="btn btn-info">Simpan</button>
				</div>

			</form>
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

		$('#tanggal').on("change.datetimepicker",function(e){
			$('#tanggal').datetimepicker('minDate',e.date);
		});
	});
</script>
@endpush

@push ('css')

	<link rel="stylesheet" type="text/css" href="{{ url('vendor/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}">

@endpush