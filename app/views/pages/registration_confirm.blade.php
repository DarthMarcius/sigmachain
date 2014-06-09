@extends('layouts.home_master')
@section('content')
<body>
	@include('headers.home')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h4 id="chain-description" class="main-page-text text-left">{{$message}}</h4>
			</div>				
		</div>
		
	</div>
	<!-- footer start -->
	<footer>
		@include('footers.copyright')
	</footer>
	<!-- footer end -->
</body>
@stop