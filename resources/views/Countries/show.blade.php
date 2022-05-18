@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2> </h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="/countries" title="Go back"> Back to CountriesList</a>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-5">
			<h1>{{ $country->Name }}</h1>
			<div class="form-group">
				<strong>Code:</strong> - {{ $country->Code }}
			</div>
			<div class="form-group">
				<strong>Name</strong> - {{ $country->Name }}
			</div>
			<div class="form-group">
				<strong>Continent</strong> - {{$country->Continent}}
			</div>
			<div class="form-group">
				<strong>Region</strong> - {{$country->Region}}
			</div>
			<div class="form-group">
				<strong>IndepYear</strong> - {{$country->IndepYear}}
			</div>
			<div class="form-group">
				<strong>Population</strong> - {{$country->Population}}
			</div>
			<div class="form-group">
				<strong>GovernmentForm</strong> - {{ $country->GovernmentForm }}
			</div>
			<div class="form-group">
				<strong>HeadOfState</strong> - {{ $country->HeadOfState }}
			</div>
			<div class="form-group">
				<strong>Domain</strong> - {{ $country->Code2 }}
			</div>
		</div>

		<!-- Cities list -->
		<div class="col-sm-7" >
			<h2>Cities list</h2>
			<table class="table table-striped">
				<tr>
					<th style="width:10%">NN</th>
					<th style="width:30%">City name</th>
					<th style="width:10%">CountryCode</th>
					<th style="width:20%">Population</th>
				</tr>
				<?php $k=0; // это нумерация строк?>
				@foreach ($countryCities as $city)
					<?php $k++; // это нумерация строк?>
					<tr>
						<td>{{$k}}</td>
						<td>{{$city->Name}}</td>
						<td>{{$city->CountryCode}}</td>
						<td>{{$city->Population}}</td>
					</tr>
				@endforeach
			</table>
			<hr>
			<p>Количество городов: {{$citiesCount}}</p>
		</div>
	</div>
</div>
@endsection