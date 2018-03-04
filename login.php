<?php include 'dbconnection.php';?>
<?php 

$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
$_SESSION['userkey'] = $_POST['userkey'];
$_SESSION['user_name'] = $_POST['name'];
$_SESSION['user_email'] = $_POST['email'];

if(isset($_POST["userkey"]) && !empty($_POST["userkey"]))
{

    $userkey = $_POST['userkey'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql_userkey = "SELECT * FROM users WHERE userkey = '$userkey'";
    
    $res_u = mysqli_query($conn, $sql_userkey);
    
    if(mysqli_num_rows($res_u) > 0){
        
    }else{ $sql = "insert into users (userkey,name,email) VALUES ('$userkey','$name','$email')";
    
        $result = mysqli_query($conn, $sql);
        $conn->close();
            }
       } 


else {
    echo ("false");
    }

    header("Location: login.html");
?>
