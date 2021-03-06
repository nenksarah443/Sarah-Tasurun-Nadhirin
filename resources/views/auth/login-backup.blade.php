<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Piknik Tour Travel - Login </title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet ">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-danger" style="background-image: url('images/Sarahbaground2.jpg')">


    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header text-white bg-danger" ><center>Login</center> </div>
        <div class="card-body" style="background-image: url('images/download.jpg')" >
          <form method="POST" action="{{ route('login') }}">
          
          {{ csrf_field() }}

            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputUsername" class="form-control" placeholder="Username" required="required" autofocus="autofocus" name="username" value="{{ old('username') }}">
                <label for="inputUsername">Username</label>

                @if ($errors->has('username'))
                   <span class="help-block">
                       <strong>{{ $errors->first('username') }}</strong>
                   </span>
                @endif
                
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" 
                required="required" name="password">
                <label for="inputPassword">Password</label>
                
                @if ($errors->has('password'))
                    <span class="help-block">
                       <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me" name="remember" {{ old('remember') ?
                   'checked' : '' }}>
                  Remember Password
                </label>
              </div>
            </div>
            <button class="btn btn-danger btn-block" type="submit" >Login</button>
          </form>
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
