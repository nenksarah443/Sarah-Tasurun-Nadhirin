@extends('layouts.main')
@section('content')
<h1>Pengguna</h1>
<hr>

<!-- Alert -->

@if(session('status-alert') == 'sukses')
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>Berhasil diupdate !</strong> Data anda berhasil diperbaharui pada database.
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

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

<div class="card border-info mb-3">
	<div class="card-header bg-info text-white">Setting Pengguna</div>
	<div class="card-body">
		<form method="post" action="{{route('pengguna.setting.update')}}">
		{{csrf_field()}}
			<input type="hidden" name="id" value="{{$field->id}}">
			<div class="form-group">
				<label>Nama</label>
				<div class="row">
					<div class="col-sm-6">
						<input type="text" name="nama" class="form-control {{$errors->has('nama')?'is-invalid':''}}" value="{{ Request::old('nama', $field->fullname) }}" required autofocus />

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
				<label>Username</label>
				<div class="row">
					<div class="col-sm-6">
						<input type="text" name="username" class="form-control {{$errors->has('username')?'is-invalid':''}}" value="{{ Request::old('username',$field->username) }}" required autofocus />

						@if($errors->has('username'))
						<div class="invalid-feedback">
							{{$errors->first('username')}}
						</div>
						@endif
						</div>
				</div>
				<small>
					Panjang Karakter 2-50, dan tidak boleh menggunakan spasi. <br> Contoh : Sarah, Sarah-Tasurun, Sarah_Nadhirin, Sarah19
				</small>
			</div>

			<div class="form-group">
				<label>Level</label>
				<div class="row">
					<div class="col-sm-3">
						<?php
						$val =Request::old('level', $field->level);
						?>
						<select name="level" class="form-control {{$errors->has('level')?'is-invalid':''}}" required>
							<option value="" {{$val==''?'selected':''}}>Pilih :</option>
							<option value="admin" {{$val=='admin'?'selected':''}}>Admin</option>
							<option value="operator" {{$val=='operator'?'selected':''}}>Operator</option>
						</select>
						@if($errors->has('level'))
						<div class="invalid-feedback">
							{{$errors->first('level')}}
						</div>
						@endif
						</div>
				    </div>
			    </div>



			<div class="form-group">
				<label>Email</label>
				<div class="row">
					<div class="col-sm-6">
					<input type="text" name="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" value="{{ Request::old('email', $field->email) }}" required />

						@if($errors->has('email'))
						<div class="invalid-feedback">
							{{$errors->first('email')}}
						</div>
						@endif
						</div>
				</div>
				<small>
					Panjang Karakter 8-50, Contoh : sarahtasurunnadhirin19@gmail.com
				</small>
			</div>

			<div class="form-group">
				<label>Password</label>
				<div class="row">
					<div class="col-sm-6">
					<input type="password" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}} "  />

						@if($errors->has('password'))
						<div class="invalid-feedback">
							{{$errors->first('password')}}
						</div>
						@endif
						</div>
					</div>
				<small>
					Kosongkan Password apabila tidak akan diganti.
				</small>
			</div>

			<div class="form-group">
				<label>Ulangi Password</label>
				<div class="row">
					<div class="col-sm-6">
					<input type="password" name="repassword" class="form-control {{$errors->has('repassword')?'is-invalid':''}}" />

					@if($errors->has('repassword'))
						<div class="invalid-feedback">
					{{$errors->first('repassword')}}
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
				
				<button type="submit" class="btn btn-info">Simpan</button>
			</div>

		</form>
	</div>
	<div class="card-footer bg-info"></div>
</div>

@endsection