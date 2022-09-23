<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
include 'config/config_sqli.php';

$u_username = $_POST['username'];
$p_password = $_POST['password'];

$sql="INSERT INTO user(username,password) VALUES('$u_username','$p_password')";
$result=mysqli_query($conn,$sql);
if($result){
    $_SESSION['success'] = '<script>
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "เพิ่มข้อมูลเรียบร้อยแล้ว",
                    showConfirmButton: false,
                    timer: 1500
                    })
                </script>';
                
                header("location: user.php");
}else{
    $_SESSION['success'] = '<script>
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "เพิ่มข้อมูลไม่สำเร็จ",
                    showConfirmButton: false,
                    timer: 1500
                    })
                </script>';
                
                header("location: user.php");

}

mysqli_close($conn);
?>