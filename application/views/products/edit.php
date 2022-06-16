<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>
</head>

<body>
    <form method="post" action="<?php echo base_url('products/update/' . $product->entry_id); ?>">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label class="col-md-3">Title</label>
                    <div class="col-md-9">
                        <input type="text" name="title" class="form-control" value="<?php echo $product->title; ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label class="col-md-3">Description</label>
                    <div class="col-md-9">
                        <textarea name="description" class="form-control"><?php echo $product->description; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label class="col-md-3">Amount</label>
                    <div class="col-md-9">
                        <input type="number" name="amount" class="form-control" value="<?php echo $product->amount; ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <label class="col-md-3">Price</label>
                    <div class="col-md-9">
                        <input type="number" name="price" class="form-control" value="<?php echo $product->price; ?>">
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