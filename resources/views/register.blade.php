<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
</head>
<body>
<div class="container mt-5 pt-5">
    <div class="card mx-auto border-0">
        <div class="card-header border-bottom-0 bg-transparent">
            <ul class="nav nav-tabs justify-content-center pt-4" id="pills-tab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link text-primary"  href="{{route('postLogin')}}" role="tab" aria-controls="pills-login"
                       aria-selected="true">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-primary" id="pills-register-tab" data-bs-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register"
                       aria-selected="false">Register</a>
                </li>
            </ul>
        </div>

        <div class="card-body pb-4">
            <div class="tab-content" id="pills-tabContent">
                    <form action="{{route('postRegister')}}" method="post">
                        @csrf
                        <h1 class="text-center"> Đăng ký </h1>
                        @if(session('error'))
                            <p class="text-danger">{{session('error')}}</p>
                        @endif
                        <br>
                        <div class="mb-3">
                            <label class="fw-bold">User name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Please enter your username" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Please enter your email" required>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Please enter your password" required>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Confirm Password:</label>
                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Please confirm your password"  required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</html>
