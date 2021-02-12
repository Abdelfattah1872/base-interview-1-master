<?php require 'inc/db.php'?>
<?php require 'inc/validation.php'?>
<?php
$sql = "SELECT * FROM `boxes` ";
$result = mysqli_query($conn,$sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <title>PHP task</title>
  </head>
  <body>
  <section class="boxes-table">
      <div class="container">
          <h1 class="text-center display-2">BOXES MANGER</h1>
          <table class="table my-3">
              <a href="addBox/add.php" class="text-center">Add new BOX</a>
              <thead>
              <tr>
                  <th scope="col">ID</th>
                  <th scope="col">name</th>
                  <th scope="col">width</th>
                  <th scope="col">length</th>
                  <th scope="col">height</th>
                  <th scope="col">volume</th>
                  <th scope="col">edit</th>
              </tr>
              </thead>
              <tbody>
              <?php  if(mysqli_num_rows($result) > 0): ?>
              <?php  while($row = mysqli_fetch_assoc($result)): ?>
              <tr>
                  <th scope="row"><?php echo $row['id']; ?></th>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['width']; ?></td>
                  <td><?php echo $row['length']; ?></td>
                  <td><?php echo $row['height']; ?></td>
                  <td><?php echo $row['volume']; ?></td>
                  <td><a href="edit.php?id=<?php echo $row['id']; ?>" style="color: black"><i class="fa fa-2x fa-edit"></i></a></td>
              </tr>
                  <?php endwhile; ?>
              <?php endif; ?>
              </tbody>
          </table>
      </div>
  </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>