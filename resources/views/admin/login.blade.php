<!DOCTYPE html>
<html>
<head>
    <title>C.A.S.A</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <!-- CSS -->
{{--     <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/main.min.css"> --}}
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/sections.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body id="home" class="homepage">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                {!! Form::open(['url' => 'iniciar-sesion', 'method' => 'POST', 'class' => 'form-login']) !!}

                    <a href="{{ url('/') }}">
                        <img class="logo" src="{{ url('/images/logo-login.png') }}" alt="">
                    </a>

                    <div class="form-group">
                        {!! Form::email('email', null, ['placeholder' => 'Correo', 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::password('password', ['placeholder' => 'Contraseña', 'class' => 'form-control']) !!}
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Acceder</button>

                    <a href="{{ url('') }}">¿Olvido su contraseña?</a>
                {!! Form::close() !!}
            </div>
        </div>  
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>