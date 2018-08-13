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
    $name=$conn->real_escape_string($_POST['namee']);
    $username=$conn->real_escape_string($_POST['u_name']);
    $email=$conn->real_escape_string($_POST['u_email']);
    $password=$_POST['pwd'];
    $c_pwd=$_POST['c_pwd'];
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
    $avatar_path=$_FILES['avatar']['name'];
    

    if (preg_match("!image!", $_FILES['avatar']['type'])) {

      if(move_uploaded_file($_FILES["avatar"]["tmp_name"],"images/".$_FILES["avatar"]['name'])){
        $_SESSION['name']=$name;
        $_SESSION['username']=$username;
        $_SESSION['email']=$email;
        $_SESSION['pwd']=$password;
        $_SESSION['c_pwd']=$c_pwd;
        $_SESSION['phone']=$phone;
        $_SESSION['house']=$house;
        $_SESSION['street']=$street;
        $_SESSION['city']=$city;
        $_SESSION['state']=$state;
        $_SESSION['pin']=$pin;
        $_SESSION['avatar']=$avatar_path;
        

        $sql = "INSERT INTO data(name,uname,email,pwd,cpwd,pno,house,street,city,state,pcode,s_house,s_street,s_city,s_state,s_pcode,avatar)
        VALUES ('".$name."','".$username."','".$email."','".$password."','".$c_pwd."','".$phone."','".$house."','".$street."','".$city."','".$state."','".$pin."','".$s_house."','".$s_street."','".$s_city."','".$s_state."','".$s_pin."','".$avatar_path."')";
        if ($conn->query($sql)===TRUE) 
        {
          header("Location: welcome.php");
        }
        else
        {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          $_SESSION['message']="User could not be added to the database";
        }
      }
      else{
        $_SESSION['message']= "File upload failed";
      }
    }
    else{
      $_SESSION['message']= "Insert proper image format file";
    }
  }
  else{
    $_SESSION['message']= "Passwords do not match";
  }
}

?>