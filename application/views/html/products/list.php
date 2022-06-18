<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Squares product list</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <div class="row d-flex">
        <div class="col-3 bg-primary">
        </div>
        <div class="col-lg-12">
            <div class="pull-right">
                <a class="btn btn-primary m-2" href="<?php echo base_url('products/create') ?>"> Create New Product</a>
            </div>
            <div class="pull-right m-2">
                <a class="btn btn-primary" href="<?php echo base_url('products/getpdf') ?>">View PDF</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
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