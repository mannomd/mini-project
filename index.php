<?php session_start(); ?>
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
        if($(this).prop("checked") === true){
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
                $(".seco").hide(300);
        }
        else{
            $(".seco").show(300);
        }
      });
    });
  </script>

  <script>
      function check()
        {
          if(!isNaN(document.signup.namee.value))
            {
            alert("Please enter valid Name");
            document.signup.namee.focus();
            return false;
            }
          if(!isNaN(document.signup.u_name.value))
            {
            alert("Please enter valid username");
            document.signup.u_name.focus();
            return false;
            }
          if(document.signup.pwd.value != document.signup.c_pwd.value)
            {
            alert("Confirm password does not match password");
            document.signup.c_pwd.focus();
            return false;
            }
            if(isNaN(document.signup.phone.value) || (document.signup.phone.value<10))
            {
            alert("Please enter Phone No. in number format only and 10 digit long");
            document.signup.phone.focus();
            return false;
            }
            if(!isNaN(document.signup.house.value))
            {
            alert("Please enter valid location name");
            document.signup.house.focus();
            return false;
            }
            if(!isNaN(document.signup.street.value))
            {
            alert("Please enter valid Street name");
            document.signup.street.focus();
            return false;
            }
            if(!isNaN(document.signup.city.value))
            {
            alert("Please enter valid City");
            document.signup.city.focus();
            return false;
            }
            if(!isNaN(document.signup.state.value))
            {
            alert("Please enter valid State");
            document.signup.state.focus();
            return false;
            }
            if(isNaN(document.signup.pin.value))
            {
            alert("Please enter Pin in number format only");
            document.signup.pin.focus();
            return false;
            }
            if(!isNaN(document.signup.s_house.value))
            {
            alert("Please enter valid location name");
            document.signup.s_house.focus();
            return false;
            }
            if(!isNaN(document.signup.s_street.value))
            {
            alert("Please enter valid Street name");
            document.signup.s_street.focus();
            return false;
            }
            if(!isNaN(document.signup.s_city.value))
            {
            alert("Please enter valid City");
            document.signup.s_city.focus();
            return false;
            }
            if(!isNaN(document.signup.s_state.value))
            {
            alert("Please enter valid State");
            document.signup.s_state.focus();
            return false;
            }
            if(isNaN(document.signup.s_pin.value))
            {
            alert("Please enter Pin in number format only");
            document.signup.s_pin.focus();
            return false;
            }
        }
          
    </script>
</head>


<body>
  <div class="body-content">
    <div class="module">
      <h1>Create an account</h1>
      <form class="form" name="signup" action="signup_db.php" method="post" onSubmit="return check();" enctype="multipart/form-data" sautocomplete="off">
      	 <a id="link" href="welcome.php" target="_top">Existing user? Sign in</a><br><br>
        <div class="alert alert-error"><?= $_SESSION['message']?></div>
        Name: *<input type="text" id="name" name="namee" title="Enter your name" placeholder="eg: John" ><br><br>

        Username: *<input id="u_name" type="text" name="u_name" title="Enter your username" placeholder="eg: john_123" ><br><br>

        Email: *<input id="u_email" type="email" name="u_email" title="Enter your E-mail" ><br><br>

        Password: *<input id="pwd" type="password" name="pwd" title="Enter your desired password" ><br><br>

        Confirm Password: *<input id="c_pwd" type="password" name="c_pwd" title="Re-enter your password" ><br><br>

        Phone Number: *<input id="phone" type="text" name="phone" title="Enter your phone number" placeholder="eg: 1234567890" maxlength="10" ><br><br><br>

        <div class="avatar"><label>Select your profile image: </label><input type="file" name="avatar" accept="image/*"/></div><br><br>

        <div class="resi">- - - - - - - - - Residential address - - - - - - - - -<br><br><br></div>
        House Location: <input id="house" type="text" name="house" placeholder="eg: A/123, ABC Apartment" ><br><br>
        Street Address: <input id="street" type="text" name="street" placeholder="eg: xyz road" ><br><br>
        City: <input id="city" type="text" name="city" placeholder="eg: Mumbai" ><br><br>
        State: <input id="state" type="text" name="state" placeholder="eg: Maharashtra" ><br><br>
        Pin Code: <input id="pin" type="text" name="pin" placeholder="eg: 123456" maxlength="6" ><br><br><br>

        <input id="checkbox" type="checkbox" name="sec_check"> Please check if your Residential address is same as Secondary address<br><br><br>

        <div id="sAdd" class="seco"><div class="sec_title">- - - - - - - - - Secondary address - - - - - - - - -</div><br><br><br>
        House Location: <input id="s_house" type="text" name="s_house" placeholder="eg: A/123, ABC Apartment"><br><br>
        Street Address: <input id="s_street" type="text" name="s_street" placeholder="eg: xyz road"><br><br>
        City: <input id="s_city" type="text" name="s_city" placeholder="eg: Mumbai"><br><br>
        State: <input id="s_state" type="text" name="s_state" placeholder="eg: Maharashtra"><br><br>
        Pin Code: <input id="s_pin" type="text" name="s_pin" placeholder="eg: 123456" maxlength="6"><br><br>
        <br>
      </div>

      <input id="sub" type="submit" name="submit" value="Register" class="btn btn-block btn-primary"><br><br>
    </form>
  </div>
</div>
</body>
</html>


<!-- JQUERY ___________________________________________
<script type="text/javascript">
jQuery("input:checkbox").change(function() {
var ischecked= jQuery(this).is(':checked');

var x = document.getElementById("pmt_add");
if (!ischecked) {
x.style.display = "block";
} else {
x.style.display = "none";
}
}); 
</script>



button
<div id="pmt_add" ><input type="text" name="pAdd" autocomplete="off"placeholder="Permanent Address"/></div>



css
#pmt_add{
   width: 100%;
   text-align: center;
   display :block;

}
logic
if(!empty($_POST['pAdd']))
{
$prmt=$_POST['pAdd'];
}
$prmt=$_POST['cAdd'];
 -->