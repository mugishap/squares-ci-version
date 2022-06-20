<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update account | <?= $this->session->userdata('username') ?></title>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <img class="navbar-header" width=70 height=50 src="<?= base_url('assets/logo.png') ?>" alt="">
            <div class="navbar-header mr-5">
                <a class="navbar-brand" href="<?= base_url() ?>">Squares</a>
            </div>
            <ul class="nav navbar-nav">
                <li class=""><a href="#">Home</a></li>
                <li><a href="<?= base_url('users') ?>">Users</a></li>
                <li class="active"><a href="<?= base_url('products') ?>">Products</a></li>
                <li><a href="<?= base_url() . 'user/' . $this->session->userdata('user_id') ?>">Account</a></li>
                <li><a href="<?= base_url('logout') ?>"><button class="btn btn-primary" >Logout</button></a></li>
            </ul>
        </div>
    </nav>
    <div class="form">
        <h1>Update account</h1>
        <?php
        if (isset($error)) {
        ?>
            <div class="alert alert-danger">
                <?= $error ?>
            </div>
        <?php
        }
        ?>
        <form action="<?= base_url() . 'usersUpdate/' . $this->session->userdata('user_id') ?>" method="post">
            <div class="form-group">
                <label for="username">First name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $this->session->userdata('firstname') ?>">
            </div>
            <div class="form-group">
                <label for="username">Last name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $this->session->userdata('lastname') ?>">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $this->session->userdata('username') ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $this->session->userdata('email') ?>" required>
            </div>
            <input type="submit" value="Update" name="Update">
        </form>
    </div>

</body>

</html>