<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="margin-top: 5%;">
  <h2>Add New User <a class='btn btn-primary' href="view_user.php">View User</a></h2>

  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" placeholder="Enter Name" name="user_name" required />
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" placeholder="Enter Email" name="user_email" required />
    </div>
    <div class="form-group">
      <label for="email">Password:</label>
      <input type="password" class="form-control" placeholder="Enter Password" name="user_password" required />
    </div>
    <div class="form-group">
      <label for="email">Image:</label>
      <input type="file" class="form-control" placeholder="Enter Image" name="user_image" required />
    </div>
    <div class="form-group">
      <label for="email">Details:</label>
      <textarea class="form-control" name="user_details" required=""></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="insert_btn" />
  </form>

  <?php
  $conn = mysqli_connect('localhost','root','','php_crud');

  if(isset($_POST['insert_btn']))
  {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_image = $_FILES['user_image']['name'];
    $tmp_name = $_FILES['user_image']['tmp_name'];
    $user_details = $_POST['user_details'];

    $insert = "INSERT INTO user(user_name,user_email,user_password,user_image,user_details) 
    VALUES('$user_name','$user_email','$user_password','$user_image','$user_details')";

    $run_insert = mysqli_query($conn,$insert);

    if($run_insert == True)
    {
      echo "Data has been inserted !!";
      move_uploaded_file($tmp_name, "upload/$user_image");
    }
    else
    {
      echo "Failed, Try again !!";
    }

    header("Location:view_user.php");

  }
  
  ?>

</div>
</body>
</html>