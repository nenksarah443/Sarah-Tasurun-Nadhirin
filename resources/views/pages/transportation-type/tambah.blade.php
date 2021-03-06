@extends('layouts.main')
@section('content')
<h1>Tipe Transportasi</h1>
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
	<div class="card-header bg-info text-white">Tambah Tipe Pelanggan</div>
	<div class="card-body">
		<form method="post" action="{{route('transportation-type.simpan')}}">
		{{csrf_field()}}
			<div class="form-group">
				<label>Deskripsi</label>
				<div class="row">
					<div class="col-sm-6">
						<input type="text" name="deskripsi" class="form-control {{$errors->has('deskripsi')?'is-invalid':''}}" value="{{ Request::old('deskripsi') }}" required autofocus />

						@if($errors->has('deskripsi'))
						<div class="invalid-feedback">
							{{$errors->first('deskripsi')}}
						</div>
						@endif
						</div>
				</div>
				<small>
					Panjang Karakter 3-50, Contoh : Kereta Api
				</small>
			</div>

			

			<hr>
			<div class="form-group text-right">
				<p>
					Pilih "Simpan" apabila anda akan menyimpan data yang dimasukkan pada formulir diatas.
				</p>
				<a href="{{route('pengguna.data')}}" class="btn btn-secondary">Cancel</a>
				<button type="submit" class="btn btn-info">Simpan</button>
			</div>

		</form>
	</div>
	<div class="card-footer bg-info"></div>
</div>


@endsection