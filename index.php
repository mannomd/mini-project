<?php
session_start();
$_SESSION['message']="";
$conn = new mysqli("localhost", "root", "root", "miniproject");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($_POST['submit'])
{

  if ($_POST['pwd']==$_POST['c_pwd']) 
  {
    $name=$conn->real_escape_string($_POST['name']);
    $username=$conn->real_escape_string($_POST['u_name']);
    $email=$conn->real_escape_string($_POST['u_email']);
    // echo $email;exit();
    $password=md5($_POST['pwd']);
    $c_pwd=md5($_POST['c_pwd']);
    $phone=$conn->real_escape_string($_POST['phone']);
    $house=$conn->real_escape_string($_POST['house']);
    $street=$conn->real_escape_string($_POST['street']);
    $city=$conn->real_escape_string($_POST['city']);
    $state=$conn->real_escape_string($_POST['state']);
    $pin=$conn->real_escape_string($_POST['pin']);
    $s_house=$conn->real_escape_string($_POST['s_house']);
    $s_street=$conn->real_escape_string($_POST['s_street']);
    $s_city=$conn->real_escape_string($_POST['s_city']);
    $s_state=$conn->real_escape_string($_POST['s_state']);
    $s_pin=$conn->real_escape_string($_POST['s_pin']);
    // $avatar_path=$conn->real_escape_string('image/'.$_FILES['avatar']['name']);

    // $_SESSION['username']=$username;
    // $_SESSION['avatar']=$avatar_path;

    $sql = "INSERT INTO data(name,uname,email,pwd,cpwd,pno,house,street,city,state,pcode,s_house,s_street,s_city,s_state,s_pcode)
    VALUES ('".$name."','".$username."','".$email."','".$password."','".$c_pwd."','".$phone."','".$house."','".$street."','".$city."','".$state."','".$pin."','".$s_house."','".$s_street."','".$s_city."','".$s_state."','".$s_pin."')";

    if ($conn->query($sql)===TRUE) 
    {
      $_SESSION['message']="Registration successfull!";
      header("Location: welcome.php");
    }
    else
    {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      $_SESSION['message']="User could not be added to the database";
    }
  }
  else{
    $_SESSION['message']="Password does not match with confirm password";
  }
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="form.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('input[type="checkbox"]').click(function(){
        if($(this).prop("checked") == true){
          $(".seco").show(300);
        }
        else if($(this).prop("checked") == false){
          $(".seco").hide(300);
                var house=$("#house").val();
                var street=$("#street").val();
                var city=$("#city").val();
                var state=$("#state").val();
                var pin=$("#pin").val();
                $.ajax({
                    url:'secondary.php',
                    method:'POST',
                    data:{
                        house:house,
                        street:street,
                        city:city,
                        state:state,
                        pin:pin
                    },
                   success:function(data){
                       alert(data);
                   }
                });
        }
      });
    });
  </script>
</head>
<body>
  <div class="body-content">
    <div class="module">
      <h1>Create an account</h1>
      <form class="form" action="index.php" method="post" enctype="multipart/form-data"><!-- autocomplete="off" -->
        <div class="alert alert-error"><?= $_SESSION['message']?></div>
        Name: *<input type="text" id="name" name="name" title="Enter your name" placeholder="eg: John" required><br><br>

        Username: *<input id="u_name" type="text" name="u_name" title="Enter your username" placeholder="eg: john_123" required><br><br>

        Email: *<input id="u_email" type="email" name="u_email" title="Enter your E-mail" required><br><br>

        Password: *<input id="pwd" type="password" name="pwd" title="Enter your desired password" required><br><br>

        Confirm Password: *<input id="c_pwd" type="password" name="c_pwd" title="Re-enter your password" required><br><br>

        Phone Number: *<input id="phone" type="text" name="phone" title="Enter your phone number" placeholder="eg: 1234567890" maxlength="10" required><br><br><br>

        <div class="resi">- - - - - - - - - Residential address - - - - - - - - -<br><br><br></div>
        House Location: <input id="house" type="text" name="house" placeholder="eg: A/123, ABC Apartment" required><br><br>
        Street Address: <input id="street" type="text" name="street" placeholder="eg: xyz road" required><br><br>
        City: <input id="city" type="text" name="city" placeholder="eg: Mumbai" required><br><br>
        State: <input id="state" type="text" name="state" placeholder="eg: Maharashtra" required><br><br>
        Pin Code: <input id="pin" type="text" name="pin" placeholder="eg: 123456" maxlength="6" required><br><br><br>

        <input id="checkbox" type="hidden" name="sec_check" value="n">
        <input id="checkbox" type="checkbox" name="sec_check" value="y"> Please check if you have a different address<br><br><br>

        <div class="seco"><div class="sec_title">- - - - - - - - - Secondary address - - - - - - - - -</div><br><br><br>
        House Location: <input id="s_house" type="text" name="s_house" placeholder="eg: A/123, ABC Apartment"><br><br>
        Street Address: <input id="s_street" type="text" name="s_street" placeholder="eg: xyz road"><br><br>
        City: <input id="s_city" type="text" name="s_city" placeholder="eg: Mumbai"><br><br>
        State: <input id="s_state" type="text" name="s_state" placeholder="eg: Maharashtra"><br><br>
        Pin Code: <input id="s_pin" type="text" name="s_pin" placeholder="eg: 123456" maxlength="6"><br><br>
        <br>
      </div>

      <!-- <div class="avatar"><label>Select your profile image: </label><input type="file" name="avatar" accept="image/*"/></div><br><br> -->

      <input id="sub" type="submit" name="submit" value="Register" class="btn btn-block btn-primary"><br><br>
    </form>
  </div>
</div>
</body>
</html>
