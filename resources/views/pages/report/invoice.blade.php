@extends('layouts.report')
@section('content')
<?php
$tool = new App\Library\Tools;
?>
<div class="row">
	<div class="col-8">
		Nama : <br> <strong>{{$field->name}}</strong>
	</div>
	<div class="col-4">
		No : <strong>{{$field->reservation_code}}</strong>
	</div>
</div>
<hr>
	<div class="row">
		<div class="col">
			Jadwal Berangkat :
			<br><strong>{{$tool->dateformat($field->depart_at,'D, d M Y - H:i:s')}}</strong>
			
		</div>
		<div class="col">
			Jadwal Tiba :
			<br><strong>{{$tool->interval($field->depart_at,$field->depart_at_rute,'D, d M Y - H:i:s')}}</strong>
			
		</div>
	</div>

	<hr>
	<div class="row">
		<div class="col">
			Berangkat Dari :
			<br><strong>{{($field->rute_from)}}</strong>
		</div>
		<div class="col">
			Tujuan Ke :
			<br><strong>{{($field->rute_to)}}</strong>
		</div>
	</div>

	<hr>
	<div class="row">
		<div class="col">
			Transportasi :
			<br><strong>{{($field->code)}}</strong>
		</div>
		<div class="col">
			Tipe Transportasi :
			<br><strong>{{($field->type)}}</strong>
		</div>
	</div>

	<hr>
		<div>
		Kode Tempat Duduk :
			<br><strong>{{($field->seat_code)}}</strong>
		</div>

	<hr>
		<div class="row">
			<div class="col">
				Harga :
				<br><strong>Rp. {{number_format($field->price,0,',','.')}} ,-</strong>
			</div>
			<div class="col">
				Terima Kasih, <br>
				<strong>{{$field->fullname}} 
					<?php
						$date = $field->reservation_date.' '.$field->reservation_at;
					?>
					<br>
					{{$tool->dateformat($date,'D, d M Y - H:i:s')}}
				</strong>	
			</div>
		</div>
	<hr>
	<p><i>Harga Sewaktu-waktu dapat berubah</i></p>


	<div class="row">
			<div class="col">
				<div>
					<center> TTD PEMIMPIN : 
				<strong><center>{{$field->fullname}}</center></strong>
			</div>
		</div>
		</center> 

			<div class="col-6">
				<div>
				 <center> TTD : 
				<strong><center>{{$field->fullname}} </center></strong>
			</div>
		</center>
			</div>
		</div>
	</div>

@endsection

@push('css')
<style type="text/css">
	hr{
		margin-bottom: 5px;
		margin-top: 5px;
	}
	.row strong{
		font-family: Arial;
		font-size: 20px;
	}
</style>
@endpush	
