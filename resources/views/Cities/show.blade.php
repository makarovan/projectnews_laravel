@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2> </h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="/cities" title="Go back"> Back to CitiesList</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-5">
			<div class="form-group">
				<strong>ID:</strong> - {{ $city->ID }}
			</div>
			<div class="form-group">
				<strong>Name</strong> - {{ $city->Name }}
			</div>
			<div class="form-group">
				<strong>CountryCode</strong> - {{$city->CountryCode}}
			</div>
			<div class="form-group">
				<strong>Population</strong> - {{$city->Population}}
			</div>
		</div>
	</div>
</div>
@endsection