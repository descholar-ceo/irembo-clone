<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Page 2 | CAT 2</title>
</head>
<body>
  <main class="container">
  <?php 
  $staff_id = $_GET['staff_id'];
  $connection = mysqli_connect('localhost', 'root', '', 'fat');
  $select_query = "select * from staff where id='$staff_id'";
  $records = mysqli_query($connection, $select_query);
  $row = mysqli_fetch_assoc($records);
  
  ?>
  <h1>Edit staff</h1>
  <form action="update_staff.php?staff_id=<?php echo $staff_id ?>" method="POST">
    <h2>Staff information</h2>
    <div class="form-row">
      <div class="form-group col-md-6 d-flex flex-row">
        <label for="lname" class="col-md-3">Last Name</label>
        <input value="<?php echo $row['last_name']; ?>" class="form-control form-control-sm" type="text" id="lname" name="lname" placeholder="Last Name / Nom">
      </div>
      <div class="form-group col-md-6 d-flex flex-row">
        <label for="fname" class="col-md-3">First Name</label>
        <input value="<?php echo $row['first_name']; ?>" class="form-control form-control-sm" type="text" id="fname" name="fname" placeholder="First Name / Prenom">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6 d-flex flex-row">
        <label for="dob" class="col-md-3">Date of birth</label>
        <input class="form-control form-control-sm" type="date" id="dob" name="dob">
      </div>
      <div class="form-group col-md-6 d-flex flex-row">
        <label for="sex" class="col-md-3">Sex</label>
        <select class="form-control form-control-sm" name="sex" id="sex">
          <option value="<?php echo $row['sex']; ?>"><?php echo $row['sex'];?></option>
          <option value="female">Female</option>
          <option value="male">Male</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6 d-flex flex-row">
        <label for="phone" class="col-md-3">Phone Number</label>
        <input value="<?php echo $row['phone']; ?>" class="form-control form-control-sm" type="tel" id="phone" name="phone">
      </div>
      <div class="form-group col-md-6 d-flex flex-row">
        <label for="nid" class="col-md-3">NID Card</label>
        <input value="<?php echo $row['nid']; ?>" class="form-control form-control-sm" type="number" id="nid" name="nid">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6 d-flex flex-row">
        <label for="email" class="col-md-3">Email</label>
        <input value="<?php echo $row['email']; ?>" class="form-control form-control-sm" type="email" id="email" name="email" placeholder="Your e-mail address">
      </div>
      <div class="form-group col-md-6">
        <label class="form-group col-md-6">Is he / she driver?</label>
        <div class="form-check form-check-inline">
          <label class="form-check-label" for="driver-yes">Yes</label>
          <input class="form-check-input m-2" type="radio" id="driver-yes" name="is-he-driver" value="yes">
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label" for="driver-no">No</label>
          <input class="form-check-input m-2" type="radio" id="driver-no" name="is-he-driver" value="no">
        </div>
      </div>
    </div>
    <div class="form-row d-flex justify-content-center">
      <input class="btn btn-primary" type="submit" value="Edit Staff" name="submit">
    </div>
  </form>
  </main>
</body>
</html>
