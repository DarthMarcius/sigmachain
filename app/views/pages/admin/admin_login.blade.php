@extends('layouts.admin_master')
@section('content')
<body>
	<div id="login-page">
	  	<div class="container">
	  	
		      <form id="form-login" class="form-login" action="index.html">
		        <h2 class="form-login-heading">enter admin</h2>
		        <div class="login-wrap">
		        	<div class="form-group">
		            	<input type="text" id="name" class="form-control" placeholder="username" autofocus>
		            </div>
		            <br>
					<div class="form-group">
		            	<input type="password" id="password" class="form-control" placeholder="Password">
		            </div>
		            <br>
		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		        </div>
		      </form>	
		      <!-- Modal -->
		    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="mySecretModal" class="modal fade">
		      	<form id="secret-form">
			      	<div class="modal-dialog">	
			      	    <div class="modal-content">
			      	        <div class="modal-header">
			      	            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			      	            <h4 class="modal-title">Please enter your secret key</h4>
			      	        </div>
			      	        <div class="modal-body">
			      	            <input id="secret-input" type="text" name="password" placeholder="enter your secret key here" autocomplete="off" class="form-control placeholder-no-fix">
			      	        </div>
			      	        <div class="modal-footer">
			      	            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
			      	            <button class="btn btn-theme" type="submit">Submit</button>
			      	        </div>
			      	    </div>
			      	</div>
		      	</form>
		    </div>
		      <!-- modal -->  	
	  	
	  	</div>
	  </div>
	@include('js_footers.admin.login')
    
</body>
@stop
