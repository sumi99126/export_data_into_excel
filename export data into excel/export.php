<?php

$con = mysqli_connect('localhost', 'root', '', 'exportexcel');

if (isset($_POST["export_all"])) {
  $query = "SELECT * FROM student";
  $result = mysqli_query($con, $query);
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

  if (!empty($data)) {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename=exportexcel_all.xls');

    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>City</th><th>Address</th><th>Rollno</th></tr>';

    foreach ($data as $row) {
      echo '<tr>';
      echo '<td>' . $row['id'] . '</td>';
      echo '<td>' . $row['name'] . '</td>';
      echo '<td>' . $row['email'] . '</td>';
      echo '<td>' . $row['city'] . '</td>';
      echo '<td>' . $row['address'] . '</td>';
      echo '<td>' . $row['rollno'] . '</td>';
      echo '</tr>';
    }

    echo '</table>';
  }
} elseif (isset($_POST["export_selected"])) {
  if (isset($_POST['selected_rows']) && !empty($_POST['selected_rows'])) {
    $selectedRows = $_POST['selected_rows'];

    $data = array();
    foreach ($selectedRows as $selectedRow) {
      $query = "SELECT * FROM student WHERE id = " . intval($selectedRow);
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_assoc($result);
      if ($row) {
        $data[] = $row;
      }
    }

    if (!empty($data)) {
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment; filename=exportexcel_selected.xls');

      echo '<table border="1">';
      echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>City</th><th>Address</th><th>Rollno</th></tr>';

      foreach ($data as $row) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['city'] . '</td>';
        echo '<td>' . $row['address'] . '</td>';
        echo '<td>' . $row['rollno'] . '</td>';
        echo '</tr>';
      }

      echo '</table>';
    }
  }
}
?>
