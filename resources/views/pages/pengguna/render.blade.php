@extends('layouts.report')
@section('content')
<?php
$tool = new App\Library\Tools;
?>
<div class="row">
	<div class="col">
		<table>
			<tr><td>Perihal</td><td>: Laporan Pengguna</td></tr>
			<tr><td>Level</td> <td>: {{$level}}</td></tr>
		</table>
	</div>
	<div class="col">
		<table>
			<tr><td>Total Record</td><td>: {{$data->count()}}</td></tr>
			<tr>
				<td>Tanggal Dibuat</td>
				<td>:{{date('D, d M Y - H:i:s')}}</td>
			</tr>
		</table>
	</div>
</div>

<table class="table mt-3 table-striped">
	@foreach($data as $field)
	<tr>
		<td>
			Nama 		: <b>{{$field->fullname}}</b> <br>
			Nama Lengkap: <b>{{$field->username}}</b> <br>
		</td>
		<td>
			Email	: {{$field->email}}
		</td>
		<td>
			Level		: {{$field->level}}
		</td>
	</tr>
	@endforeach
</table>
@endsection