<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ 'public/frontend/bootstrap-5.0.2-dist/css/bootstrap.min.css' }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ 'public/frontend/fonts/fontawesome-free-6.0.0-web/css/all.min.css' }}">
    <link href="{{ 'public/frontend/css/bases.css' }}" rel="stylesheet">
    <link href="{{ 'public/backend/css/admin_login.css' }}" rel="stylesheet">
    <title>Admin login</title>
</head>

<body>

    <div class="form-group-wrapper">
        <form class="form-login-admin" action="{{ URL::to('/admin-dashboard') }}" method="POST">

            {{ csrf_field() }}

            <div class="form-login-title">
                <h2>Đăng nhập</h2>
            </div>

            <?php
            $message = Session::get('message');
            if($message) {
              echo "<h2 class='error-title'>";
              echo $message;
              echo "</h2>";
              Session::put('message', null);
            }
            ?>

            <div class="form-group">
                <label for="email">Email:</label>
                <input name="admin_email" type="email" class="form-control" placeholder="Nhập email">
            </div>
            <div class="form-group">
                <label for="pwd">Mật khẩu:</label>
                <input name="admin_password" type="password" class="form-control" placeholder="Nhập mật khẩu">
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox">Lưu đăng nhập
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>

</body>

</html>
