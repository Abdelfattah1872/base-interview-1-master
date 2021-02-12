<?php require_once 'inc/db.php'?>
<?php require 'inc/validation.php'?>
<?php
if(!isset($_GET['id']) or !is_numeric($_GET['id']))
{
    header("Location:index.php");
}
$id = $_GET['id'];
$sql = "SELECT * FROM `boxes`  WHERE `id`='$id LIMIT 1'";
$result = mysqli_query($conn,$sql);
$check = mysqli_num_rows($result);
if(!$check)
{
    header("Location:index.php");
}
$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>PHP task - Add new BOX</title>
</head>
<body>
<section class="boxes-table text-center">
    <div class="container">
        <h1 class="text-center display-2">EDIT BOX</h1>
        <form method="post" action="update.php">
            <div class="mb-3 col-12">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required value="<?php echo $row['name']  ?>">
            </div>
            <div class="mb-3 col-12">
                <label class="form-label">Width</label>
                <input type="number" class="form-control" name="width" required value="<?php echo $row['width']  ?>">
            </div>
            <div class="mb-3 col-12">
                <label class="form-label">length</label>
                <input type="number" class="form-control" name="length" required value="<?php echo $row['length']  ?>">
            </div>
            <div class="mb-3 col-12">
                <label class="form-label">height</label>
                <input type="number" class="form-control" name="height" required value="<?php echo $row['height']  ?>">
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="id" />
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>
