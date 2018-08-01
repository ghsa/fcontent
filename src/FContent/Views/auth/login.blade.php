<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="/img/favicon.png" />
    <title>FContent</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/examples/dashboard/dashboard.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">


    <style>
        body{
            background: #F1F1F1;
        }
    .box-login{
        margin-top: 200px;
        background: white;
        padding: 25px;
        border-radius: 5px;
    }
    </style>

</head>


<body class="text-center">

    <div class="row">

        <div class="col-sm-2 offset-sm-5 box-login">
                {!! Form::open(['route' => 'fcontent.auth']) !!}
                <h1 class="h3 mb-3 font-weight-normal">FContent Login</h1>
                
                <div class="form-group">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" name='email' placeholder="Email address" required autofocus>
                        
                </div>
                
                
                <div class="form-group">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" name='password' class="form-control" placeholder="Password" required>
                        
                </div>
                
                
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            {!! Form::close() !!}
        
        </div>

    </div>

   
    <script src="https://use.fontawesome.com/6396f49a57.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>



</body>

</html>