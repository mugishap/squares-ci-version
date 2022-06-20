<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <img class="navbar-header" width=70 height=50 src="<?= base_url('assets/logo.png') ?>" alt="">
            <div class="navbar-header mr-5">
                <a class="navbar-brand" href="<?= base_url() ?>">Squares</a>
            </div>
            <ul class="nav navbar-nav d-flex align-items-center " style="
    display: flex;
    align-items: center;
">
                <li class=""><a href="#">Home</a></li>
                <li><a href="<?= base_url('users') ?>">Users</a></li>
                <li class="active"><a href="<?= base_url('products') ?>">Products</a></li>
                <li><a href="<?= base_url() . 'user/' . $this->session->userdata('user_id') ?>">Account</a></li>
                <li><a style="padding: 0 !important;" href="<?= base_url('logout') ?>"><button class="btn btn-primary"  >Logout</button></a></li>
            </ul>
        </div>
    </nav>
    <div class="form">

    </div>
</body>

</html>