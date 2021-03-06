@extends('layouts.main')
@section('content')
<h1>Laporan <small>Tipe Transportasi</small></h1>
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
<div class="card border-info mb-3">
	<div class="card-header bg-info text-white">Buat Laporan</div>
	<div class="card-body bg-primary">
		<form method="post" action="{{route('transportation-type.render')}}">
		{{csrf_field()}}
			
			<div class="form-row">
				
				<div class="form-group ">
				<label>Tipe Transportasi</label>
				<div class="row">
					<div class="col-sm-8">
						<input type="text" name="description" class="form-control {{$errors->has('description')?'is-invalid':''}}" value="{{ Request::old('description') }}" autofocus />

						@if($errors->has('description'))
						<div class="invalid-feedback">
							{{$errors->first('description')}}
						</div>
						@endif
						</div>
				</div>
				<small>
					Panjang Karakter 2-50, Contoh : Pesawat | Kereta Api
				</small>
			</div>
				
			</div>

			<hr>
			<div class="form-group text-right ">
				<p>
					Pilih "Simpan" apabila anda akan menyimpan data yang dimasukkan pada formulir diatas.
				</p>
				<button type="submit" class="btn btn-danger">Simpan</button>
			</div>

		</form>
	</div>
	<div class="card-footer bg-info"></div>
</div>

@endsection


