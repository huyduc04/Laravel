<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
<div class="form-container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="valid-message">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2 class="text-center">Change Password</h2>
    <form id="change-password-form" action="{{ route('admin.password.update') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="current_password" class="font-weight-bold">Mật khẩu hiện tại:</label>
            <input type="password" id="current_password" name="current_password" class="form-control" value="">
            <span id="current_password_error" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="new_password" class="font-weight-bold">Mật khẩu mới:</label>
            <input type="password" id="new_password" name="new_password" class="form-control" value="">
            <span id="new_password_error" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="confirm_password" class="font-weight-bold">Xác minh mật khẩu mới:</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" value="">
            <span id="confirm_password_error" class="error-message"></span>
        </div>
        <div class="form-group d-flex justify-content-between">
            <input type="hidden" name="id" value="">
            <button type="submit" class="btn btn-primary" name="capnhat">Cập nhật</button>
            <button type="reset" class="btn btn-secondary">Nhập lại</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.getElementById('change-password-form').addEventListener('submit', function(event) {
        var currentPassword = document.getElementById('current_password').value.trim();
        var newPassword = document.getElementById('new_password').value.trim();
        var confirmPassword = document.getElementById('confirm_password').value.trim();
        var currentPasswordError = document.getElementById('current_password_error');
        var newPasswordError = document.getElementById('new_password_error');
        var confirmPasswordError = document.getElementById('confirm_password_error');
        var isValid = true;

        currentPasswordError.textContent = '';
        newPasswordError.textContent = '';
        confirmPasswordError.textContent = '';

        if (currentPassword === '') {
            currentPasswordError.textContent = 'Vui lòng nhập mật khẩu hiện tại.';
            isValid = false;
        }

        if (newPassword === '') {
            newPasswordError.textContent = 'Vui lòng nhập mật khẩu mới.';
            isValid = false;
        }

        if (confirmPassword === '') {
            confirmPasswordError.textContent = 'Vui lòng xác minh mật khẩu mới.';
            isValid = false;
        }

        if (newPassword !== confirmPassword) {
            confirmPasswordError.textContent = 'Mật khẩu mới và Xác minh mật khẩu mới không khớp. Vui lòng kiểm tra lại.';
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
</script>
</body>
</html>
