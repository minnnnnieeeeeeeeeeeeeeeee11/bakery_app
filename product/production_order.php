<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สั่งผลิต</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&family=Itim&family=Mali:wght@300&display=swap"
        rel="stylesheet">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--datepicker-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--datepicker js-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&family=Itim&family=Mali:wght@300&display=swap"
        rel="stylesheet">
        <style>
        body {
            font-family: Bai Jamjuree;
        }
        </style>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
</head>

<body>
    <?php
        if(isset($_SESSION['success'])){
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
    ?>
    <div class="container">
        <div class=" h4 text-center alert alert-info mb-4 mt-2" role="alert">สั่งผลิตสินค้า</div>
        <hr>
        <form action="insert_production.php" method="POST" enctype="multipart/form-data">
            <div class="row form-group">
                <label>วันที่สั่งผลิต</label>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                    <input type="text" name="Pro_date" id="datepicker" class="form-control"
                        value="<?=date("d-m-Y", strtotime(date('Y-m-d'))) ?>">
                </div>
            </div>

            <table class="table table-striped table-hover table-bordered mt-2">
                <thead>
                    <tr align="center">
                    <th scope="col" style="width: 200px;">รหัสสินค้า</th>
                    <th scope="col" style="width: 200px;">ชื่อสินค้า</th>
                    <th scope="col" style="width: 200px;">จำนวน</th>
                    <th scope="col" >หน่วยผลิต</th>
                        
                    </tr>
                </thead>

                <tbody>

                    <?php
                require_once '../config/config_sqli.php';
                $sql = "SELECT * FROM product" ;
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0)
                {
                    foreach($result as $key => $product)
                    {
                        ?>
                    <tr align="center">
                    <td><input type="checkbox"  name="" value="<?= $product['id']; ?>" /> <?= $product['P_ID']; ?></td>
                    <td><input type="hidden" name="pro_name[]" value="<?= $product['id']; ?>" /> <?= $product['P_name']; ?></td>
                            <td width='10%'><input type="number" name="pro_num[]" class="form-control" min="0" ></td>
                            <input type="hidden" name="prolist[]"  value="<?= $product['id']; ?>" />
                            <td><input type="hidden" name="pro_use[]" value="<?= $product['id']; ?>" /> <?= $product['P_unit_pro']; ?></td>
                    </tr>

                    <?php
                    } 
                    
                } else{echo "ไม่มีข้อมูล";}
            ?>
                </tbody>

            </table>
            <button name="save_order" class="btn btn-primary">สั่งผลิต</button>
            <a href="index_production.php" class="btn btn-danger">กลับ</a>
        </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js"
        integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
    $('#datepicker').datepicker({
        format: 'dd-mm-yyyy',
        language: 'th',
    });
    </script>
</body>

</html>