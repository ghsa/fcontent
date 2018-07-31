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
        form {
            width: 100%;
        }
    </style>

</head>

<body>


    <body>
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">FContent Panel</a>

            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                        <a class="nav-link" href="{{route('fcontent.logout')}}"><i class="fa fa-sign-out "></i> Logout</a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('fcontent.page.index')}}"><i class="fa fa-file "></i> Page Manager</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('fcontent.logout')}}"><i class="fa fa-sign-out "></i> Logout</a>
                            </li>

                        </ul>



                    </div>
                </nav>

                <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">

                    <div  >
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>




        <script src="https://use.fontawesome.com/6396f49a57.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

        <script>
            $(document).ready(function() {
                $('.summernote').summernote({
                    height: 150
                });
            });
        </script>

    </body>

</html>