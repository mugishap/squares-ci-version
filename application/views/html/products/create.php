<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new product</title>
</head>

<body>
<nav class="navbar navbar-default">
        <div class="container-fluid">
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
                <li class=""><a href="<?= base_url() . 'user/' . $this->session->userdata('user_id') ?>">Account</a></li>
                <li><a style="padding: 0 !important;" href="<?= base_url('logout') ?>"><button class="btn btn-primary"  >Logout</button></a></li>
            </ul>
        </div>
    </nav>
    <?php if (isset($error) && count(array_keys($error)) > 0) { ?>
        <div class="alert alert-danger" role="alert">
            <?php
            $keys = array_keys($error);
            echo $error[$keys[0]]; 
            // echo $error[$keys[0]];
            ?>
        </div>
    <?php } ?>
    <form method="post" action="<?php echo base_url('productsCreate'); ?>">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label class="col-md-3">Title</label>
                    <div class="col-md-9">
                        <input type="text" value="<?php if(isset($title)){echo $title;}?>" name="title" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label class="col-md-3">Description</label>
                    <div class="col-md-9">
                        <textarea value="<?php if(isset($description)){echo $description;}?>" name="description" class="form-control" required></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label class="col-md-3">Price</label>
                    <div class="col-md-9">
                        <input value="<?php if(isset($price)){echo $price;}?>" name="price" class="form-control" type="number" required>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label class="col-md-3">Amount</label>
                    <div class="col-md-9">
                        <input name="amount" value="<?php if(isset($amount)){echo $amount;}?>" class="form-control" type="number" required>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2 pull-right">
                <input type="submit" name="Save" class="btn">
            </div>
        </div>

    </form>
</body>

</html>