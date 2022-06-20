<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
</head>

<body>
    <div class="col-lg-6">
        <?php
        if (isset($error)) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php
                echo $error;
                ?>
            </div>
        <?php
        }
        ?>
        <form action="<?= base_url() . 'usersLogin' ?>" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            </div>
            <button type="submit" name="login">Submit</button>

        </form>
        <p>New to squares? <a href="<?= base_url('signup/form') ?>">Signup</a></p>
        <p>Forgot password?</p><a href="<?= base_url('resetpassword/home') ?>">Reset password</a>
    </div>
</body>

</html>