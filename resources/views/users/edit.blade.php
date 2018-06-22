@extends('layouts.app')

@section('content')

<div class="" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>User</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Add New User</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form action="" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" novalidate>
						 {{ csrf_field() }}
						 
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">First Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="name" name="first_name" required="required" class="form-control col-md-7 col-xs-12" 
									autocomplete="off"  value="{{ $user->first_name }}" required autofocus>
									@if ($errors->has('first_name'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('first_name') }}</strong>
		                                    </span>
		                            @endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Last Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="name" name="last_name" required="required" class="form-control col-md-7 col-xs-12" 
									autocomplete="off"  value="{{ $user->last_name }}" required autofocus>
									@if ($errors->has('last_name'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('last_name') }}</strong>
		                                    </span>
		                            @endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Email <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="email" id="name" name="email" required="required" class="form-control col-md-7 col-xs-12" 
									autocomplete="off"  value="{{ $user->email }}" required autofocus>
									@if ($errors->has('email'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
		                            @endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Password <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="password" id="name" name="password" required="required" class="form-control col-md-7 col-xs-12" 
									autocomplete="off"  value="" required autofocus>
									@if ($errors->has('password'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('password') }}</strong>
		                                    </span>
		                            @endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Phone No <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="number" id="name" name="phone" required="required" class="form-control col-md-7 col-xs-12" 
									autocomplete="off"  value="{{ $user->phone }}" required autofocus>
									@if ($errors->has('phone'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('phone') }}</strong>
		                                    </span>
		                            @endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('brand_logo') ? ' has-error' : '' }}">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="logo">Image <span class="required">*</span>
								</label>
								<div class="controls">
									<div class="col-md-6 col-sm-6 col-xs-12">
										<div class="col-md-6" style="padding: 0">
											<img src="/images/user/{{$user->image}}" class="img-rounded" style="border:1px solid #ccc; padding: 0; min-height:100px;" id="brand_img" width="100%" />
										</div>
										<div class="col-md-6">
    										<input id="brand_logo" type="file" style="display: none" name="brand_logo"
    											  value="" onChange="validateImage(this)" required autofocus>
    										<p class="col-md-6" style="top: 35px; cursor: pointer;" id="logo">
    											<u><b>Upload Logo</b></u>
    										</p>
    										<input type="hidden" value="{{ $user->image }}"  id="logo" name="logo">
    									</div>
									</div>
									<div>&nbsp;</div>
									<div class="control-label col-md-5 col-sm-5 col-xs-10">
										@if ($errors->has('brand_logo')) 
										<span class="help-block" style="margin-right:39px;"> <strong>{{
												$errors->first('brand_logo') }}</strong>
										</span> 
										@endif
									</div>
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a href="{{ route('user') }}" class="btn btn-danger" type="button">Cancel</a>
									<button class="btn btn-primary" type="reset">Reset</button>
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@push('scripts')

<script type="text/javascript">
$(document).ready(function(){
	$('#logo').click(function(){
		$(this).siblings('input').click();
		});
	});

function validateImage(input) {
	var validExtensions = ['jpg','png','jpeg'];
	var fileName = input.files[0].name;
	var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
	if (jQuery.inArray(fileNameExt, validExtensions) == -1) {
	    input.type = ''
	    input.type = 'file'
	    alert("Only these file types are accepted : "+validExtensions.join(', '));
	} else {
		if (input.files && input.files[0]) {
			var filerdr = new FileReader();
		    filerdr.onload = function (e) {
			    jQuery('#brand_img').attr('src', e.target.result);
			    }
		    filerdr.readAsDataURL(input.files[0]);
		    }
	    }
    }
</script>
@endpush
