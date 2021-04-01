<?php
$host = "ec2-23-22-191-232.compute-1.amazonaws.com";
$port = "5432";
$dbname = "d90g8rfgki6jb5";
$user = "ofcrelyobnaqan";
$password = "cefb489d75ca8fef81ab3054ee3525b3af3857ebdcc77080d96834153e2a6b94"; 
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
    <h2>Thông tin tài khoản</h2>
	<?php
$result = pg_query($dbconn,"SELECT * FROM login");
echo "<table>";
while($row=pg_fetch_assoc($result)){echo "<tr>";
echo "<td align='center' width='200'>" . $row['email'] . "</td>";
echo "<td align='center' width='200'>" . $row['pw'] . "</td>";
echo "</tr>";}echo "</table>";?>
    </body>
</html>
