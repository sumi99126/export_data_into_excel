<?php
$connect = mysqli_connect("localhost", "root", "", "exportexcel");
$sql = "SELECT * FROM student";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>table</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<body class="bg-light">
  <div class="container">
    <br />
    <br />
    <br />
    <div class="table-responsive">
      <h2 align="center">Export MySQL data to Excel in PHP</h2><br />
      <form method="post" action="export.php">
        <table class="table table-bordered">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>City</th>
            <th>Address</th>
            <th>RollNo.</th>
            <th>Select</th>
          </tr>

          <?php
          while ($row = mysqli_fetch_array($result)) {
          ?>
            <tr>
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["city"]; ?></td>
              <td><?php echo $row["address"]; ?></td>
              <td><?php echo $row["rollno"]; ?></td>
              <td><input type="checkbox" name="selected_rows[]" value="<?php echo $row["id"]; ?>" /></td>
            </tr>
          <?php
          }
          ?>
        </table>
        <a href="index.php" type="btn" class="btn btn-success">Back</a>
        <br><br>
        <input type="submit" name="export_all" class="btn btn-success" value="Export All Data" />
        <input type="submit" name="export_selected" class="btn btn-success" value="Export Selected Data" />
      </form>
    </div>
  </div>
</body>
</html>
