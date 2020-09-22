
<!DOCTYPE html>
<html lang="en">
<head>
		
	<title>Adventure Tour & Travel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" href="{{ url('images/adventureeee.png') }}" sizes="18x18" type="image/png" >	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter o-hidden h-100">
		<div class="container-login100 " style="background-image: url('images/boeing-787-passenger.jpg');">
			
				
			
				 <form  method="POST" action="{{ route('login') }}">
        		  {{ csrf_field() }}

				<div class="login100-form validate-form">
					</div>
				<span class="login100-form-title">
					<center><h1><marquee><p>Welcome to Booking airplane and train tickets !</p></h1></marquee></center>
				
					<div class="login100-pic js-tilt" data-tilt>
						
					<center><img src="images/adventureeee.png" alt="IMG">
					</center>
				
						</div>
					</span>
					

					<div class="wrap-input100 validate-input" data-validate = "Valid username is required: Nadhi"  >
						<input class="input100" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					

					@if ($errors->has('username'))
                   <span class="help-block">
                       <strong>{{ $errors->first('username') }}</strong>
                   </span>
                	@endif
                	</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" required ="required" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					
					@if ($errors->has('password'))
                    <span class="help-block">
                       <strong>{{ $errors->first('password') }}</strong>
                    </span>
                	@endif
                	</div>
					

			
			<div class="container-login100-form-btn">
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me" name="remember" {{ old('remember') ?
                   'checked' : '' }}>
                  Remember Password
                </label>
              </div>
            </div>
						<button class="login100-form-btn" >
							Login
						</button>
					</div>

					

					</form>
				</div>
			</div>
		</div>
	</div>
	
	



	<!-- Bootstrap core JavaScript-->
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--===============================================================================================-->	
	 <!-- Core plugin JavaScript-->
<!--===============================================================================================-->	
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!--===============================================================================================-->	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>