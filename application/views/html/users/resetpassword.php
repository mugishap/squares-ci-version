<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <h1>Welcome to the reset password wizard</h1>
    <p>Please enter your email address below and we will send you a link to reset your password.</p>
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
    <form action="<?= base_url('resetpassword/getuser') ?>" method="POST">
        <input type="email" name="email" placeholder="Enter your email here please" required>
        <input type="submit" value="Send reset email link">
    </form>
</body>

</html>