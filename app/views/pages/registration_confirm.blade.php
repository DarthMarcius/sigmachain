@extends('layouts.master')
@section('content')
<body>
	@include('headers.home')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h4 id="chain-description" class="text-info text-left">{{$message}}</h4>
			</div>				
		</div>
		
	</div>
	<!-- footer start -->
	@include('footers.home')
	<!-- footer end -->
	<!-- JavaScript -->
	@include('js_footers.registration')
</body>
