<?php
include 'config/config_sqli.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผู้ใช้</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert"> ข้อมูลผู้ใช้ (พนักงาน)</div>
        <a href="adduser.php" class="btn btn-success mb-4">เพิ่มผู้ใช้</a>
        <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>ชื่อผู้ใช้</th>
            <th>จัดการ</th>
        </tr>
    <?php
$sql = "SELECT * FROM user";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
?>
    <tr>
        <td><?=$row["id"]?></td>
        <td><?=$row["username"]?></td>
        <td>
        <a href="delete_user.php?id=<?=$row["id"]?>" class="btn btn-danger" onclick="Delete(this.href);return false;">ลบ</a>
        </td>
    </tr>
    <?php
}
mysqli_close($conn); //ปิดการเชื่อมต่อฐานข้อมูล
?>
</table>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
      </script>

</div>
</body>
</html>

<script language="JavaScript">
    function Delete(mypage){
        var agree=confirm("ยืนยันการลบข้อมูลหรือไม่");
        if(agree){
            window.location=mypage;
        }
        
    }
</script>