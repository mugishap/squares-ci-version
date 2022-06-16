<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new product</title>
</head>

<body>
    <form method="post" action="<?php echo base_url('productsCreate'); ?>">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label class="col-md-3">Title</label>
                    <div class="col-md-9">
                        <input type="text" name="title" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label class="col-md-3">Description</label>
                    <div class="col-md-9">
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label class="col-md-3">Price</label>
                    <div class="col-md-9">
                        <input name="price" class="form-control" type="number" required>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label class="col-md-3">Amount</label>
                    <div class="col-md-9">
                        <input name="amount" class="form-control" type="number" required>
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