<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ดูสูตรการผลิต</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <style>
        body{
            font-family: Bai Jamjuree;
        }
        .icon-cog {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert">ข้อมูลสูตรการผลิต</div>
    <hr>
    
    <table class="table table-striped table-hover table-bordered">
    <thead>
                <tr align="center">
                    <th scope="col">รหัสสินค้า</th>
                    <th scope="col">หน่วยผลิต</th>
                    <th scope="col">รหัสวัตถุดิบ</th>
                    <th scope="col">จำนวนใช้</th>
                    <th scope="col">หน่วยใช้</th>
                    <th scope="col">จัดการ</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                        session_start();
                        require_once "../config/config_sqli.php";
                        $in_ing = "SELECT * FROM ing WHERE ing_status='1'" ;
                        $ind_ing=mysqli_query($conn,$in_ing);
                    if (!$ind_ing) {
                        echo "<p><td colspan='8' class='text-center'>ไม่มีข้อมูลสูตรการผลิต</td></p>";
                    } else {
                    foreach($ind_ing as $ind_ing)  {  
                ?>
                <tr align="center">
                    
                </tr>
                <?php } 
                } ?>
            </tbody>
    </table>
    </div>
</body>
</html>