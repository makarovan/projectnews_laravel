@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Cities List</h2>
				<h4>Всего городов:{{count($allCities)}} - v2 - {{$countCities}}</h4>

			</div>
		</div>
	</div>

	@if (count($cities ?? '') > 0)
		<table class="table table-striped">
			<tr>
				<th style="width:10%">ID</th>
				<th style="width:10%">Name</th>
				<th style="width:10%">CountryCode</th>
				<th style="width:20%">Population</th>
				<th style="width:10%">Detail</th>
			</tr>
			@foreach ($cities as $city)
				<tr>
					<td>{{$city->ID}}</td>
					<td>{{$city->Name}}</td>
					<td>{{$city->CountryCode}}</td>
					<td>{{$city->Population}}</td>
					<td>
						<a href="{{url('detailCity/' . $city->ID)}}" title="show">Detail</a>
					</td>
				</tr>
			@endforeach
		</table>
		{!! $cities->links() !!}<!-- Это постраничная пагинация -->
	@else
		<p>Data no found</p>
	@endif
</div>
@endsection