<?php 
    session_start();
    require_once("config/config_sqli.php");

    $errors = array();

    if (isset($_POST['login_state'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "กรุณากรอกชื่อผู้ใช้");
        }

        if (empty($password)) {
            array_push($errors, "กรุณากรอกรหัสผ่าน");
        }

        if (count($errors) == 0) {
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "เข้าสู่ระบบแล้ว";
                header("location: index.php");
            } else {
                array_push($errors, "ชื่อผู้ใช้หรือรหัสผ่านผิด กรุณาลองใหม่ !");
                $_SESSION['error'] = "ชื่อผู้ใช้หรือรหัสผ่านผิด กรุณาลองใหม่ !";
                header("location: loginform.php");
            }
        } else {
            array_push($errors, "กรุณากรอกชื่อผู้ใช้และรหัสผ่าน !");
            $_SESSION['error'] = "กรุณากรอกชื่อผู้ใช้และรหัสผ่าน !";
            header("location: loginform.php");
        }
    }

?>