<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TK2 | Login </title>

    <link href="backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="backend/css/animate.css" rel="stylesheet">
    <link href="backend/css/style.css" rel="stylesheet">
    <link href="backend/css/customize.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to TK2 | Login</h2>

                <p>
                    TK2 là nền tảng thương mại được yêu thích ở Việt Nam
                </p>

                <p>
                    <small>Hãy mua sắm những gì mà bạn thích nhé! Chúng tôi ở đây để phục vụ các bạn.</small>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="{{ route('auth.login') }}" method="POST">
                        {{-- auth.login: tên routing bên web.php --}}
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror <br>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror <br>

                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
                    </form>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                © TK2
            </div>
            <div class="col-md-6 text-right">
               <small>2024</small>
            </div>
        </div>
    </div>

</body>

</html>
