@extends('layouts.report')
@section('content')
<?php
$tool = new App\Library\Tools;
?>
<div class="row">
	<div class="col">
		<table>
			<tr><td>Perihal</td><td>: Laporan Customer</td></tr>
			<tr><td>Dengan Alamat</td> <td>: {{$address}}</td></tr>
		</table>
	</div>
	<div class="col">
		<table>
			<tr><td>Total Record</td><td>: {{$data->count()}}</td></tr>
			<tr>
				<td>Total harga</td>
				<td>: Rp. {{ number_format($data->sum('price'),0,',','.')}}</td>
			</tr>
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
			Nama 		: <b>{{$field->name}}</b> <br>
			Gender 		: <i>{{$field->gender}}</i> 
		</td>
		<td>
			No Telepon	: {{$field->phone}}
		</td>
		<td>
			Alamat		: {{$field->address}}
		</td>
	</tr>
	@endforeach
</table>
@endsection