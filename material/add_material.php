<?php 
    session_start();
    require_once "../config/config_sqli.php";
    $query = "SELECT * FROM material ORDER BY M_ID desc limit 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $lastid = $row["M_ID"];

    if (empty($lastid)) 
    {
        $materialid = "M001";
    } 
    else
    {
        $idd = str_replace("M","",$lastid);
        $id = str_pad($idd + 1,3,0, STR_PAD_LEFT);
        $materialid = 'M' .$id;
    }
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มวัตถุดิบ</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>
<body>
    <div class="container my-5">
        <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert">เพิ่มข้อมูลวัตถุดิบ</div>
        <form action="insert_material.php" method="post" enctype="multipart/form-data" >
            <div class="row py-2">
                <div class="col">
                    <label>รหัสวัตถุดิบ</label>
                    <input type="text" name="M_ID" id="M_ID" class="form-control" value="<?php echo $materialid; ?>" readonly>
                </div>
                <div class="col">
                    <label>ชื่อวัตถุดิบ</label>
                    <input type="text" name="M_name" class="form-control" placeholder="ป้อนชื่อวัตถุดิบ" required>
                </div>
            </div>
            
            <div class="row py-2">
                <div class="col">
                    <label>หน่วยซื้อ</label>
                    <select name="M_unit_pack" class="form-select" id="" required >
                        <option value="" selected hidden>--- เลือกหน่วยซื้อ---</option >
                        <option value="กิโลกรัม">กิโลกรัม</option>
                        <option value="กรัม">กรัม</option>
                        <option value="แผง">แผง</option>
                        <option value="ลิตร">ลิตร</option>
                    </select>
                </div>
                <div class="col">
                <label>หน่วยใช้</label>
                    <select name="M_unit_use" class="form-select" id="" required>
                        <option value="" selected hidden>--- เลือกหน่วยใช้ ---</option>
                        <option value="กรัม">กรัม</option>
                        <option value="ฟอง">ฟอง</option>
                        <option value="ช้อนโต๊ะ">ช้อนโต๊ะ</option>
                        <option value="ช้อนชา">ช้อนชา</option>
                    </select>
                </div>
            </div> 
            
            <div class="row py-2">
                <div class="col">
                    <label>จำนวนแปลงหน่วย</label>
                    <input type="number" name="M_number" class="form-control" placeholder="ป้อนค่าจำนวนแปลงหน่วย" autocomplete="off" required>
                </div>
                <div class="col">
                    <label>ค่า yield</label>
                    <input type="number" name="M_Yield" class="form-control" placeholder="ป้อนค่า yield" autocomplete="off" required>
                </div>
                
            </div> 
            
            <button type="submit" class="btn btn-primary" name="submit">บันทึก</button>
            <!-- <input type="submit" name="submit" class="btn btn-success my-3" value="บันทึก"> -->
            <a href="index.php" class="btn btn-danger">กลับ</a>
        </form>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>