<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | <?= $this->session->userdata('username') ?></title>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= base_url() ?>">Squares</a>
            </div>
            <ul class="nav navbar-nav d-flex align-items-center " style="
    display: flex;
    align-items: center;
">
                <li class=""><a href="#">Home</a></li>
                <li class=""><a href="<?= base_url('users') ?>">Users</a></li>
                <li><a href="<?= base_url('products') ?>">Products</a></li>
                <li class="active"><a href="<?= base_url() . 'user/' . $this->session->userdata('user_id') ?>">Account</a></li>
                <li><a style="padding: 0 !important;" href="<?= base_url('logout') ?>"><button class="btn btn-primary">Logout</button></a></li>
            </ul>
        </div>
    </nav>
    <h1>Account</h1>
    <p>Welcome <?= $this->session->userdata('username') ?></p>
    <form>
        <div class="form-group">
            <label for="username">First name</label>
            <input type="text" class="form-control" id="username" value="<?= $this->session->userdata('firstname') ?>" readonly>
        </div>
        <div class="form-group">
            <label for="username">Last name</label>
            <input type="text" class="form-control" id="username" value="<?= $this->session->userdata('lastname') ?>" readonly>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" value="<?= $this->session->userdata('username') ?>" readonly>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" value="<?= $this->session->userdata('email') ?>" readonly>
        </div>
    </form>
    <a href="<?= base_url('update/form') ?>"><button class="btn btn-primary">Update profile</button></a>
</body>

</html>