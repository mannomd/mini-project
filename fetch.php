<?php
$connect = new mysqli("localhost", "root", "root", "miniproject");
$output = '';
if(isset($_POST["query"]))
{
 $search = $connect->real_escape_string($_POST["query"]);
 $query = "SELECT * FROM data WHERE uname LIKE '%".$search."%'";
}
else
{
 $query = "SELECT * FROM data ORDER BY id";
}
$result = $connect->query($query);
$rowcount=$result->num_rows;

if($rowcount > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Name</th>
     <th>Username</th>
     <th>Email</th>
     <th>Phone Number</th>
     <th>State</th>
     <th>View Details</th>
     <th>Delete</th>
     <th>Make Admin</th>
    </tr>
 ';
 while($row = $result->fetch_assoc())
 {
  $id=$row['email'];
  $output .= '
   <tr>
    <td>'.$row["name"].'</td>
    <td>'.$row["uname"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["pno"].'</td>
    <td>'.$row["state"].'</td>
    <td><button><a href="userdetails.php?id=' . $id . '">View</a></button></td>
    <td><button class="delete" name="delete" id="'.$id.'">Delete</button></td>
    <td><a href="makeadmin.php?id=' .$id. '">Make Admin</a></td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function(){
 jQuery('.delete').click(function(){
  var el = this;
  var id = this.id;
  console.log(this.id);
  jQuery.ajax({
   url: 'delete.php',
   type: 'POST',
   data: { id:id },
   success: function(response){
console.log(response);
 
    $(el).closest('tr').css('background','tomato');
    $(el).closest('tr').fadeOut(800, function(){ 
     $(this).remove();
    });

   }
  });
});
  jQuery('.view').click(function(){
  var el = this;
  var id = this.id;
  console.log(this.id);
  jQuery.ajax({
   url: 'userdetails.php',
   type: 'POST',
   data: { id:id },
   success: function(response){
   //console.log(id);
   jQuery(id).html(response);
   }
  });
 });

});
</script>
</body>
</html>