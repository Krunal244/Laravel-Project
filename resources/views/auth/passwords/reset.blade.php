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
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
  	<div>
  		<a class="hiddenanchor" id="signup"></a>
  		<a class="hiddenanchor" id="signin"></a>
  		
  		<div class="login_wrapper">
  			<div class="animate form login_form">
  				<section class="login_content">
  					<form method="POST" action="{{ route('password.request') }}" novalidate>
  						@csrf
  						<h1>Reset Password</h1>
  						<input type="hidden" name="token" value="{{ $token }}">
  						<div class="form-group row">
  							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
  								<input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                	<span class="help-block pull-left">
                                    	<strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                        	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        		<input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block pull-left">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div>
                                <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="">
                                <button type="submit" class="btn btn-default">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
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