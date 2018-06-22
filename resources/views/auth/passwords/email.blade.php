<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Starter Template</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
  </head>
  <body class="login">
  	<div>
  		<a class="hiddenanchor" id="signup"></a>
  		<a class="hiddenanchor" id="signin"></a>
  		<div class="login_wrapper">
  			<div class="animate form login_form">
  				<section class="login_content">
                   <div class="container">
                   	<div class="row justify-content-center">
                   		<div>
                   			<div class="card">
                   				<div class="card-body">
                   					@if (session('status'))
                   						<div class="alert alert-success">
                   							{{ session('status') }}
                   						</div>
                   					@endif
                    				<form method="POST" action="{{ route('password.email') }}" novalidate>
                        				@csrf
										<h1>Reset Password</h1>
                        				<div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                            				<div>
                                				<input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                				@if ($errors->has('email'))
                                    				<span class="help-block pull-left">
                                        				<strong>{{ $errors->first('email') }}</strong>
                                    				</span>
                                				@endif
                            				</div>
                        				</div>
                            			<div class="pull-left" style="margin-left: -10px;">
                                			<button type="submit" class="btn btn-default">
                                    			{{ __('Send Password Reset Link') }}
                                			</button>
                            			</div>
                    				</form>
                				</div>
            				</div>
        				</div>
    				</div>
				   </div>
       			</section>
       			<div class="separator text-center">
                		<div>
                  			<h1>Starter Template</h1>
                  			<p>©2018 All Rights Reserved. Stylez</p>
                		</div>
              		</div>
        	</div>
      	</div>
    </div>
  </body>
</html>


