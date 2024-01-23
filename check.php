<?php
//echo $_POST['email'];
//echo "<br>";
//echo $_POST['pass'];
if(isset($_POST['email']) ){
    $conn = mysqli_connect('localhost','root', '','profile');
    if($conn->connect_error){
        echo "Баазруу хандахад алдаа өглөө!";
        exit();
    }

    $stmt = $conn->prepare("select * from user where username = ? and password = ?");
    $stmt->bind_param('ss', $_POST['email'], $_POST['pass']);

    $stmt->execute();
    $result = $stmt->get_result();

    if($row = $result->fetch_array(MYSQLI_NUM)){
        // Амжилттай
        //    print_r($row);
        session_start();
        $_SESSION['email']= $_POST['email'];
        header("location: home.php");
    }else{
        // Нэвтрэх нэр эсвэл нууц үг буруу
        echo 'Нэвтрэх нэр эсвэл нууц үг буруу';
        header("location: login.php?error=1");
    }

}else{
    header("location: login.php");
}
?>


