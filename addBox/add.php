<?php require_once '../inc/db.php'?>
<?php require '../inc/validation.php'?>
<?php
if(isset($_POST['submit']))
{
    $name =santString($_POST['name']);
    $width = $_POST['width'];
    $length = $_POST['length'];
    $height = $_POST['height'];

    if(requiredInput($name) &&  requiredInput($width) &&  requiredInput($length) &&  requiredInput($height) &&  requiredInput($height))
    {
        if(minInput($name,3) && minInput($width,1) && minInput($length,1) && minInput($height,1)){
            $volum = $width * $length * $height ;
            $sql = "INSERT INTO `boxes` (`name`,`width`,`length`,`height`,`volume`) VALUES ('$name','$width','$length','$height','$volum')";
            $result = mysqli_query($conn,$sql);
            if($result){
                $success = "Added Successfully ";
                $page = '../index.php';
                $sec = "3";
                header("Refresh: $sec; url=$page");
            }
        }
        else{
            $error =  "Min for name is 3 chars, and numbers is 1 !";
            $page = $_SERVER['PHP_SELF'];
            $sec = "3";
            header("Refresh: $sec; url=$page");
        }
    }
    else
    {
        $error =  "Please Fill All  Fields !";
        $page = $_SERVER['PHP_SELF'];
        $sec = "3";
        header("Refresh: $sec; url=$page");
    }
}
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
        <h1 class="text-center display-2">ADD NEW BOX</h1>
        <?php if($error): ?>
            <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
        <?php endif;  ?>

        <?php if($success): ?>
            <h5 class="alert alert-success text-center"><?php echo $success; ?></h5>
        <?php endif;  ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="mb-3 col-12">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3 col-12">
                <label  class="form-label">Width</label>
                <input type="number" class="form-control" name="width" required>
            </div>
            <div class="mb-3 col-12">
                <label  class="form-label">Length</label>
                <input type="number" class="form-control" name="length" required>
            </div>
            <div class="mb-3 col-12">
                <label  class="form-label">Height</label>
                <input type="number" class="form-control" name="height" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>