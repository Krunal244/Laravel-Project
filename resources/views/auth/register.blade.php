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
      				<form method="POST" action="{{ route('register') }}" novalidate>
      					@csrf
						<h1>Sign up</h1>
                        <div class="form-group row">
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <input placeholder="First Name" id="name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                @if ($errors->has('first_name'))
                                    <span class="help-block pull-left">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <input placeholder="Last Name" id="name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
                                @if ($errors->has('last_name'))
                                    <span class="help-block pull-left">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <input placeholder="phone" id="name" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="help-block pull-left">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            	<input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
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
                        <div class="form-group row">
						<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        	<input placeholder="Email" id="image" type="file" name="image" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" required>
                            @if ($errors->has('image'))
                                <span class="help-block pull-left">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                        </div>
                        <div class="form-group row mb-0">
             	               <div>
                                <button type="submit" class="btn btn-default">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                         <p class="change_link">Already a member ?
                  <a href="{{route('login')}}" class="to_register"> Log in </a>
                </p>
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