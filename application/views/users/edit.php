<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user account</title>
</head>

<body>
    <div class="form">
        <form action="<?= base_url() . 'users/edit/' . $user['id']; ?>" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
            </div>
            <input type="submit" value="Update" name="Update">
            
        </form>
    </div>
</body>

</html>