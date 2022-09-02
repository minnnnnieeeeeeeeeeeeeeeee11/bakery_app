<?php
include 'config/config_sqli.php';

$P_name = $_POST['P_name'];


$sql="UPDATE SET user2 set test2 = test2+$test1 where id=$id";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script>window.location='user.php.';</script>";
}else{
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";

}

mysqli_close($conn);
?>