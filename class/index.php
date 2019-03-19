<?php 

$allowedFile = [
    'image/png',
    'image/jpg'
];
if(isset($_FILES['photo'])){
  if(in_array($_FILES['photo']['type'],$allowedFile) !==false){
      move_uploaded_file($_FILES['photo']['tmp_name'],'image'.time().$_FILES['photo']['name']);
      echo '<h3 style="color:green;">Image upload successfully</h3>';
  }else{
    echo '<h3 style="color:red;">Image upload Failed !</h3>';
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="form">
        <div class="form-header">
            <h3>Image Upload</h3>
        </div>
        <div class="form-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname">
                <label for="uimg">Profile Pic</label>
                <input type="file" name="photo" id="uimg">
                <input type="submit" value="Submit">
            </form>
        </div>
   </div>
</body>
</html>