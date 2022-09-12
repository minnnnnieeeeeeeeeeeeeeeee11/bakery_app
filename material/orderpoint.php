<?php
    ini_set('display_errors',1);
    session_start();
    require_once '../config/config_sqli.php';
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จุดสั่งซื้อ</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert">จุดสั่งซื้อวัตถุดิบ</div>
        <form action="insert_orderpoint.php" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col">
                    <label>รหัสวัตถุดิบ</label>
                    <input readonly type="text" name="M_ID" id="M_ID" class="form-control">

                </div>
                <div class="col">
                    <label>ชื่อวัตถุดิบ</label>

                    <select name="M_name" id="orderpoint_name" class="form-select" onchange="fetchemp2()">
                        <option value="" selected hidden>----เลือก----</option>
                        <?php 
                                $sql = "SELECT * FROM material" ;
                                $result=mysqli_query($conn,$sql);

                                while($rows = mysqli_fetch_array($result)){
                                
                                $m_name ="";
                                $show_mat  = "SELECT * FROM orderpoint  WHERE M_name = '".$rows['id']."' ORDER BY id ASC";
                                $query_mat = mysqli_query($conn, $show_mat);

                                while($row1=mysqli_fetch_array($query_mat)) {
                                    $m_name = $row1['M_name'];
                                } 
                                
                                if($m_name !== $rows['id']){
                                ?>
                                    <option value="<?=$rows['id'];?>"><?=$rows['M_name'];?></option>
                                <?php
                                }}

                            ?>
                    </select>
                    
                </div>
            </div>

            <label>D</label>
            <div class="input-group">
                <input type="number" name="D" class="form-control" placeholder="ป้อนอัตราความต้องการสินค้าคงคลัง"
                    required>
                <span class="input-group-text">/เดือน</span>

            </div>

            <label>LT</label>
            <div class="input-group">
                <input type="number" name="LT" class="form-control" placeholder="ป้อนเวลาในการรอคอยสินค้า" required>
                <span class="input-group-text">วัน</span>

            </div>
            <button type="submit" name="submit" class="btn btn-success my-3">บันทึก</button>
            <a href="#" class="btn btn-danger">กลับ</a>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
    function fetchemp2() {
        var id = document.getElementById("orderpoint_name").value;

        $.ajax({
            url: "../material/fetchMat2.php",
            method: "POST",
            data: {
                x: id
            },
            dataType: "JSON",
            success: function(data) {
                document.getElementById("M_ID").value = data.M_ID;
                console.log(data);
            }
        });
    }
    </script>
</body>

</html>