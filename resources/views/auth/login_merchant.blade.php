<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('global.site_title') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/adminltev3.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
</head>

<body class="header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden login-page">
    <div class="login-box">
        <div class="login-logo">
            <div class="login-logo">
                <a href="#">
                    {{ trans('global.site_title') }}
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if(\Session::has('message'))
                    <p class="alert alert-info">
                        {{ \Session::get('message') }}
                    </p>
                @endif
                <form action="{{ route('login_merchant') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback">
                        <div class="input-group">
                            <input type="tel" class="form-control" placeholder="{{ trans('global.login_email') }}" name="phone">
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="{{ trans('global.login_password') }}" name="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <input type="checkbox" name="remember"> {{ trans('global.remember_me') }}
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('global.login') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <p class="mb-1">
                    <a class="" href="{{ route('password.request') }}">
                        {{ trans('global.forgot_password') }}
                    </a>
                </p>
                <p class="mb-0">

                </p>
                <p class="mb-1">

                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</body>
</html>