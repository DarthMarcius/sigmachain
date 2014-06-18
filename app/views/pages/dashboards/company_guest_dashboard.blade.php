@extends('layouts.dashboard_master')
@section('content')
<body>
	<section id="container">
	    @include('headers.dashboard_home')
	    @include('sidebars.dashboard_home_guest')
	    <section id="main-content">
	        <section class="wrapper site-min-height">
	        	@include('dashboard_content.guest.dashboard')
	        </section>
	    </section>
	    @include('footers.dashboard')
	</section>
	@include('js_footers.dashboards.dashboard_home')
    
</body>
@stop
