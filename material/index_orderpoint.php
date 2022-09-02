<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการข้อมูลความต้องการใช้สินค้า</title>
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
    <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert">จัดการข้อมูลความต้องการใช้สินค้า</div>
    <hr>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr align="center">
                <th scope="col">#</th>
                    <th scope="col">รหัสวัตถุดิบ</th>
                    <th scope="col">ชื่อวัตถุดิบ</th>
                    <th scope="col">D</th>
                    <th scope="col">LT</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                    session_start();
                    require_once "../config/config_sqli.php";
                    $sql = "SELECT orderpoint.*,material.M_name FROM orderpoint INNER JOIN material ON orderpoint.M_ID = material.M_ID ORDER BY orderpoint.id ASC ";                
                    $orderpoint=mysqli_query($conn,$sql);

                    if (!$orderpoint) {
                        echo "<p><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></p>";
                    } else {
                    foreach($orderpoint as $orderpoint)  {  
                ?>
                <tr align="center">
                <td><?php echo $orderpoint['id']; ?></td>
                    <td><?php echo $orderpoint['M_ID']; ?></td>
                    <td><?php echo $orderpoint['M_name']; ?></td>
                    <td><?php echo $orderpoint['D']; ?></td>
                    <td><?php echo $orderpoint['LT']; ?></td>
                </tr>
                <?php } 
                } ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>