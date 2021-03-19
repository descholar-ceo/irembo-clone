<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Page 3 | FAT</title>
</head>
<body>
<main class="container mt-5">
<?php
if (isset($_POST['submit'])) {
  $staff_id = $_GET['staff_id'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $dob = $_POST['dob'];
  $sex = $_POST['sex'];
  $phone = $_POST['phone'];
  $nid = $_POST['nid'];
  $email = $_POST['email'];
  $driver = $_POST['is-he-driver'];
  $connection = mysqli_connect('localhost', 'root', '', 'fat');
  $update = "update staff set first_name='$fname', last_name='$lname', sex='$sex', phone='$phone', email='$email', nid='$nid', driver='$driver' where id='$staff_id'";
  $affected_rows = mysqli_query($connection, $update);
  if ($affected_rows) {
    $select_query = "select * from staff";
    $records = mysqli_query($connection, $select_query);
  ?>
    <table class="table table-bordered table-hover">
      <tr>
        <th>Staff name</th>
        <th>NID</th>
        <th>Phone</th>
        <th>Driver</th>
        <th>Action</th>
      </tr>
  <?php
    while ($data = mysqli_fetch_array($records)) {
  ?>
    <tr>
      <td><?php echo $data['last_name']." ".$data['first_name']; ?></td>
      <td><?php echo $data['nid']; ?></td>
      <td><?php echo $data['phone']; ?></td>
      <td><?php echo $data['driver']; ?></td>
      <td><a href="edit_staff.php?staff_id=<?php echo $data['id'] ?>">Edit</a></td>
    </tr>
  <?php
    }
  }else {
    echo("Something went wrong, data failed to save! the staff id was ".$staff_id);
  }
}



?>
</table>
</main>
</body>
</html>
