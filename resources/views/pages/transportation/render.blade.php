@extends('layouts.report')
@section('content')
<?php
$tool = new App\Library\Tools;
?>
<div class="row">
	<div class="col">
		<table>
			<tr><td>Perihal</td><td>: Laporan Pengguna</td></tr>
			<tr><td>Dengan Tipe Transportasi</td> <td> : {{$type}}</td></tr>
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
			Nama Kendaraan 		: <b>{{ $field->code }}</b> <br>
			
		</td>
		<td>
			Keterangan			: {{ $field->description }}
		</td>
		<td>
			Kapasitas			: {{ $field->seat_qty }}
		</td>
		<td>
			Rute				:	
			<u>
					{{$field->rute_from}}
					<span class="fas fa-aw fa-arrow-alt-circle-right"></span>
					{{$field->rute_to}}
				</u><br>
				<small>
					Harga : Rp. {{number_format($field->price,0,',',',')}}
					/ {{$field->depart_at}} jam
				</small>
			
		</td>

	</tr>
	@endforeach
</table>
@endsection