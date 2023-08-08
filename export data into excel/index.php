<?php
// Initialize the session
// session_start();


$con = mysqli_connect('localhost', 'root', '', 'exportexcel');

// if(!isset($_SESSION['admin_name'])){
//   header('location:index.php');
// }
// database connection
$con = mysqli_connect('localhost', 'root', '', 'exportexcel');

$added = false;


//Add  new student code 

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $rollno = $_POST['rollno'];

 $insert_data = "INSERT INTO student(name,email,city,address,rollno) VALUES ('$name','$email','$city','$address','$rollno')";
  $run_data = mysqli_query($con, $insert_data);

  if ($run_data) {
    $added = true;
    echo "
 	<script>
 	alert('Successfully registered');
 	window.location.href = 'table.php'
 	</script>
 	";
  } else {
    echo "Data not insert";
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<style>
  form a {
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    text-align: center;
  }

  form a:hover {
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    text-align: center;
  }

  center .btn2 {
    padding: 5px 10px;
    border-radius: 5px;
  }
</style>

<body class="bg-light">
  <div class="container">
    <div class="row  justify-content-center">
      <div class="col-sm-12 col-md-8 col-lg-6">
        <div class="container bg-white rounded my-2 px-0">
          <div class="py-1 bg-info text-white">
            <h1 style="text-align: center;">FORM</h1>
          </div>
          <form class="" action="" method="post" autocomplete="off">
            <div class="py-3 mx-5">
              <input type="text" name="name" id="name" required value="" class="form-control  border-info" placeholder="Enter full name">
            </div>
            <div class="py-3 mx-5">
              <input type="email" name="email" id="email" required value="" class="form-control  border-info" placeholder="Enter Email Address">
            </div>
            <div class="py-3 mx-5">
              <input type="text" name="city" class="form-control  border-info" id="city" required value="" placeholder="Enter your city">
            </div>
            <div class="py-3 mx-5">
              <input type="text" name="address" id="address" required value="" class="form-control  border-info" placeholder="Enter Address">
            </div>
            <div class="py-3 mx-5">
              <input type="text" name="rollno" id="rollno" required value="" class="form-control  border-info" placeholder="Enter Roll No.">
            </div>
            <div class="py-3 mx-5 ">
              <input type="submit" name="submit" class="form-control btn-info text-white" value="REGISTRATION ">
            </div>
          </form>
          <br>
        </div>
      </div>
    </div>
  </div>



</body>

</html>