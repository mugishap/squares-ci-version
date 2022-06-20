<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Squares product list</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body class="d-flex align-items-center justify-content-center">

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
                <li class="active"><a href="<?= base_url('products') ?>">Products</a></li>
                <li class=""><a href="<?= base_url() . 'user/' . $this->session->userdata('user_id') ?>">Account</a></li>
                <li><a style="padding: 0 !important;" href="<?= base_url('logout') ?>"><button class="btn btn-primary"  >Logout</button></a></li>
            </ul>
        </div>
    </nav>
    </div>
    <div class="row d-flex">

        <div class="col-lg-10">
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo base_url('products/create') ?>"> Create New Product</a>
                <a class="btn btn-primary" href="<?php echo base_url('products/getpdf') ?>">View PDF</a>
            </div>
        </div>
    </div>
    <div class="table-responsive col-lg-11">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) { ?>
                    <tr>

                        <td><?php echo $d->title; ?></td>
                        <td><?php echo $d->description; ?></td>
                        <td><?php echo $d->amount; ?></td>
                        <td><?php echo $d->price; ?></td>

                        <td>
                            <form method="DELETE" action="<?php echo base_url('products/delete/' . $d->entry_id); ?>">
                                <a class="btn btn-info btn-xs" href="<?php echo base_url('products/edit/' . $d->entry_id) ?>">
                                    <i class="material-icons">edit</i></a>
                                <button type="submit" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>