<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('../assets/img/favicon-128.png')}}">
    <style>
        body {
            background: url('https://png.pngtree.com/thumb_back/fw800/background/20231103/pngtree-awe-inspiring-clouds-captivating-texture-wallpaper-reveals-a-panoramic-view-of-image_13740763.png') no-repeat center center fixed;
            background-size: cover;
        }
        .card {
            width: 40%;
        }
    </style>

    @stack('styles')
</head>
<body>
<div class="container mt-5 pt-5">
    <div class="card mx-auto border-0">
        <div class="card-header border-bottom-0 bg-transparent">
            <ul class="nav nav-tabs justify-content-center pt-4" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-primary" id="pills-login-tab" data-bs-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login"
                       aria-selected="true">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-primary" href="{{route('postRegister')}}"role="tab" aria-controls="pills-login"
                       aria-selected="false">Register</a>
                </li>

            </ul>
        </div>

        <div class="card-body pb-4">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                    <form action="{{route('postLogin')}}" method="post">
                        @csrf
                        <h1 class="text-center"> Đăng nhập </h1>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <br>
                        <div class="mb-3">
                            <label class="fw-bold">Email:</label><br>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email"  autofocus>
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Password</label><br>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" id="customCheck1" checked>
                            <label class="form-check-label" for="customCheck1">Remember me</label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                        <div class="text-center pt-3">
                            <button class="btn btn-link text-primary"><a href="changePassword.blade.php">Forgot Your Password?</a></button>
                        </div>
                    </form>
                </div>

                {{--                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">--}}
                {{--                    <form>--}}
                {{--                        <div class="mb-3">--}}
                {{--                            <input type="text" name="username" id="name" class="form-control" placeholder="Username" required autofocus>--}}
                {{--                        </div>--}}

                {{--                        <div class="mb-3">--}}
                {{--                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>--}}
                {{--                        </div>--}}

                {{--                        <div class="mb-3">--}}
                {{--                            <input type="password" name="password" id="password" class="form-control" placeholder="Set a password" required>--}}
                {{--                        </div>--}}

                {{--                        <div class="mb-3">--}}
                {{--                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Confirm password" required>--}}
                {{--                        </div>--}}

                {{--                        <div class="text-center">--}}
                {{--                            <button type="submit" class="btn btn-primary">Register</button>--}}
                {{--                        </div>--}}
                {{--                    </form>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
</div>
</body>
@stack('scripts')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</html>
