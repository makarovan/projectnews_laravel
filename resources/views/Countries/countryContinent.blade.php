@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Countries by Continent
					<span style="color:#cc1c1c;">@if(isset($continentName)) {{$continentName}} @endif</span></h2>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<!-- menu -->
			<div class="col-sm-2">
				<div class="row">
					<div class="form-group">
						<a href="{{url('continent/')}}">Все государства</a>
					</div>
					@foreach ($continents as $continent)
					<div class="form-group">
						<a href="{{url('continentCountry/' . $continent->continent)}}">
							{{$continent->continent}} ({{$continent->countCountry}})
						</a>
					</div>
					@endforeach
				</div>
			</div>
			<!-- end menu -->
			<!-- all countries / countries by continent -->
			<div class="col-sm-10">
				@if(count($countries ?? '')>0)
					<table class="table table-striped">
						<tr>
							<th style="width: 10%">NN</th>
							<th style="width: 20%">Code</th>
							<th style="width: 30%">Country name</th>
							<th style="width: 40%">Continent</th>
						</tr>
						<?php $k=0;?>
						@foreach($countries as $country)
						<?php $k++;?>
						<tr>
							<td>{{$k}}</td>
							<td>{{$country->Code}}</td>
							<td>{{$country->Name}}</td>
							<td>{{$country->Continent}}</td>
						</tr>
						@endforeach
					</table>
				@else
					<p>Data not found</p>	
				@endif
				<p><strong>Всего государств:</strong>{{count($countries)}}</p>
			</div>
		</div>
	</div>
</div>
@endsection