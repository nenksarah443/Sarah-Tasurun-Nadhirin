@extends('layouts.report')
@section('content')
<?php
$tool = new App\Library\Tools;
?>
<div class="row">
	<div class="col">
		<table>
			<tr><td>Perihal</td><td>: Laporan Tipe Transportasi</td></tr>
			<tr><td>Deskripsi</td> <td>: {{$description}}</td></tr>
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
			Deskripsi		: {{$field->description}}
		</td>
	</tr>
	@endforeach
</table>
@endsection