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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <div class="row d-flex">
        <div class="col-3 bg-primary">
        </div>
        <div class="col-lg-12">

            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo base_url('products/create') ?>"> Create New Product</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo base_url('products/getpdf') ?>">Download PDF</a>
            </div>

        </div>
    </div>
    <div class="table-responsive">
        <table id="exampletable" class="table table-striped" style="width:100%">
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
    <script>
        $(document).ready(function() {
            $('#exampletable').DataTable({
                pagingType: 'full_numbers',
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
</body>

</html>