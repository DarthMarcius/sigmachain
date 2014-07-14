@extends('layouts.admin_master')
@section('content')
<body>
	<section id="container">
	    @include('headers.admin')
	    @include('sidebars.admin')
	    <section id="main-content">
	        <section class="wrapper site-min-height">
				 @include('admin_content.products')
	        </section>
	    </section>
	    @include('admin_content.admin_popups')
	    @include('footers.dashboard')
	</section>
	@include('js_footers.admin.admin')
    
</body>
@stop
