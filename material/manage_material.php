<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการข้อมูลวัตถุดิบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert">จัดการข้อมูลวัตถุดิบ</div>
        <hr>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr align="center">
                    <th scope="col">รหัสวัตถุดิบ</th>
                    <th scope="col">ชื่อวัตถุดิบ</th>
                    <th scope="col">จำนวนคงเหลือ</th>
                    <th scope="col">หน่วยใช้</th>
                    <th scope="col">จุดสั่งซื้อ</th>
                    <th scope="col">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    session_start();
                    require_once "../config/config_sqli.php";
                    $sql = "SELECT * FROM material" ;
                    $material=mysqli_query($conn,$sql);

                    if (!$material) {
                        echo "<p><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></p>";
                    } else {
                    foreach($material as $material)  {  
                ?>
                <tr align="center">
                    <td><?php echo $material['M_ID']; ?></td>
                    <td><?php echo $material['M_name']; ?></td>
                    <td align="right"><?php echo number_format($material['M_balane'], 2); ?></td>
                    <td><?php echo $material['M_unit_use']; ?></td>
                    <td><?php echo $material['M_point']; ?></td>
                    <td>
                        <?php
                                   if($material['M_balane'] <= $material['M_point']) {
                                        echo '<button type="submit" name="submit" class="btn btn-danger ">สั่งซื้อ</button>';
                                   } else {
                                        echo '-';
                                   }
                               ?>
                    </td>
                </tr>
                <?php } 
                } ?>
            </tbody>
        </table>
    </div>
    </div>
</body>

</html>