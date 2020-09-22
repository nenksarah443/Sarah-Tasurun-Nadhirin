@extends('layouts.main')
@section('content')
<h1>Pelanggan</h1>
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
<div class="card border-info mb-3" >
	<div class="card-header bg-info text-white ">Tambah Pelanggan</div>
	<div class="card-body">
		<form method="post" action="{{route('customer.simpan')}}">
		{{csrf_field()}}
			<div class="form-group">
				<label>Nama</label>
				<div class="row">
					<div class="col-sm-6">
						<input type="text" name="nama" class="form-control {{$errors->has('nama')?'is-invalid':''}}" value="{{ Request::old('nama') }}" required autofocus />

						@if($errors->has('nama'))
						<div class="invalid-feedback">
							{{$errors->first('nama')}}
						</div>
						@endif
						</div>
				</div>
				<small>
					Panjang Karakter 2-50, Contoh : Sarah Tasurun Nadhirin
				</small>
			</div>

			<div class="form-group">
				<label>Alamat</label>
				<div class="row">
					<div class="col-sm-6">
						<textarea name="alamat" class="form-control {{$errors->has('alamat') ? 'is-invalid':''}}" rows= "4"required>{{ Request::old('alamat')}}</textarea>

						@if($errors->has('alamat'))
						<div class="invalid-feedback">
							{{$errors->first('alamat')}}
						</div>
						@endif
						</div>
				</div>
				<small>
					Panjang Karakter 8-200, Contoh : Jl. Raya Banjarsari No.123, Kec.Banjarsari.
				</small>
			</div>

			<div class="form-group">
				<label>Nomor Telepon/HP</label>
				<div class="row">
					<div class="col-sm-3">
						<input type="number" name="telepon" class="form-control {{$errors->has('telepon')?'is-invalid':''}}" value="{{ Request::old('telepon') }}" required  />

						@if($errors->has('telepon'))
						<div class="invalid-feedback">
							{{$errors->first('telepon')}}
						</div>
						@endif
						</div>
				</div>
				<small>
					Panjang Karakter 1-12, Contoh : 088999555777
				</small>
			</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<div class="row-">
					<div class="col-sm-3">
						<?php
						$val =Request::old('gender');
						?>
						<!--<select name="gender" class="form-control {{$errors->has('gender')?'is-invalid':''}}" required>
							<option  value="" {{$val==''?'selected':''}}>Pilih :</option> -->

							<input type="Radio" name="gender" value="L" {{$val=='L'?'selected':''}}>Laki-laki</input>
							<input type="Radio" name="gender" value="P" {{$val=='P'?'selected':''}}>Perempuan</input>
						<!--</select>-->
						@if($errors->has('gender'))
						<div class="invalid-feedback">
							{{$errors->first('gender')}}
						</div>
						@endif
						</div>
				    </div>
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