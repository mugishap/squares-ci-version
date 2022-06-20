<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All users</title>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= base_url() ?>">Squares</a>
            </div>
            <ul class="nav navbar-nav">
                <li class=""><a href="#">Home</a></li>
                <li class="active"><a href="<?= base_url('users') ?>">Users</a></li>
                <li><a href="<?= base_url('products') ?>">Products</a></li>
                <li><a href="<?= base_url() . 'user/' . $this->session->userdata('user_id') ?>">Account</a></li>
                <li><a class="btn btn-primary color-white" href="<?= base_url('logout') ?>">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="table">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr class="bg-info">
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= $user->count ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->firstname ?></td>
                        <td><?= $user->lastname ?></td>
                        <td>
                            <?php
                            $this->session->userdata('username') === $user->username ? $disabled = '' : $disabled = 'diabled';
                            if ($this->session->userdata('username') != $user->username) {
                            ?>
                                <button style="cursor:not-allowed;" class="btn btn-secondary ">Edit</a>
                                <button style="cursor: not-allowed;" class="btn btn-secondary">Delete</a>
                            <?php
                            } else {
                            ?>
                                <a href="<?= base_url('update/form'); ?>" class="btn btn-info">Edit</a>
                                <a href="<?= base_url('usersDelete/' . $user->user_id) ?>" class="btn btn-danger">Delete</a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</body>

</html>