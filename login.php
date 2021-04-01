<?php
$host = "ec2-107-22-245-82.compute-1.amazonaws.com";
$port = "5432";
$dbname = "dcpmvj6udn2uga";
$user = "nnmnxzwmykzeyk";
$password = "
1c0f7244c61917b03c1faddbaf81fc309d87e00ffe53304f4065d239bee67f83"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);
if (isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $query = pg_query($dbconn, "SELECT * FROM login WHERE email='{$fname}' AND pw='{$lname}'");
    $login_check = pg_num_rows($query);
    if($login_check > 0){ 
        
        echo "Login Successfully";    
    }else{
        
        echo "Invalid Details";
    }
}
?>
<!DOCTYPE  html>
<html>
    <body>
        <h2>Login Forms</h2>

        <form  method="POST">
            Email:<br>
            <input  type="text"  name="firstname">
            <br>
            Password:<br>
            <input  type="text"  name="lastname">
            <br><br>
            <input  type="submit"  name="submit">
        </form>
    
    </body>
</html>
