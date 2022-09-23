
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขจุดสั่งซื้อ</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
    body {
        font-family: Bai Jamjuree;
    }
    </style>
</head>

<body>
<?php
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }elseif(isset($_SESSION['success'])){
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
    ?>
    <div class="container">
        <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert">แก้ไขคำนวณจุดสั่งซื้อวัตถุดิบ</div>
        <form action="update_orderpoint.php" method="post" enctype="multipart/form-data">
        <?php
                require_once "../config/configpdo.php";
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $stml = $conn->query("SELECT * FROM orderpoint WHERE id = $id");
                    $stml->execute();
                    $data = $stml->fetch();
                }
            ?>
            <div class="row">
                <div class="col">
                    <label>รหัสวัตถุดิบ</label>
                    <input hidden type="text" value="<?= $data['id']; ?>" name="id" class="form-control" >
                    <input readonly type="text" value="<?= $data['M_ID']; ?>" name="M_ID" class="form-control"  >
                </div>
                <div class="col">
                    <label>ชื่อวัตถุดิบ</label>
                    <input readonly type="text" value="<?= $data['M_name']; ?>" name="M_name" class="form-control"  >
                </div>
            </div>

            <label>D</label>
            <div class="input-group">
                <input type="number" name="D" value="<?= $data['D']; ?>" class="form-control" placeholder="ป้อนอัตราความต้องการสินค้าคงคลัง"
                    required>
                <span class="input-group-text">/เดือน</span>
            </div>

            <label>LT</label>
            <div class="input-group">
                <input type="number" name="LT" value="<?= $data['LT']; ?>" class="form-control" placeholder="ป้อนเวลาในการรอคอยสินค้า" required>
                <span class="input-group-text">วัน</span>

            </div>
            <button type="submit" name="update" class="btn btn-success my-3">บันทึก</button>
            <a href="index_orderpoint.php" class="btn btn-danger">กลับ</a>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    
</body>

</html>