<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การผลิต</title>
     <!--Bootstap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <style>
        body{
            font-family: Bai Jamjuree;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert">รายการสินค้าที่สั่งผลิต</div>
    <hr>
        <a href="production_order.php" class="btn btn-success mb-4"><i class="fa-solid fa-circle-plus"></i> สั่งผลิต</a>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr align="center">
                    <th scope="col">วันที่สั่งผลิต</th>
                    <th scope="col">รหัสสินค้า</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">จำนวนที่ผลิต</th>
                    <th scope="col">หน่วยผลิต</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                    session_start();
                    require_once "../config/config_sqli.php";
                    
                    $sql = "SELECT * FROM production_order" ; 
                    $in_order=mysqli_query($conn,$sql);

                    if (!$in_order) {
                        echo "<p><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></p>";
                    } else {
                    foreach($in_order as $in_order)  {  
                ?>
                <tr align="center">
                    <td><?php echo $in_order['Pro_date']; ?></td>
                    <td><?php echo $in_order['P_ID']; ?></td>
                    <td><?php echo $in_order['P_name']; ?></td>
                    <td><?php echo $in_order['Pro_amount']; ?></td>
                    <td><?php echo $in_order['P_use']; ?></td>
                </tr>
                <?php } 
                } ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>