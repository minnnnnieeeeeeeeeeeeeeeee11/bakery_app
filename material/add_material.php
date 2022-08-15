
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
</head>
<body>
    <div class="container my-5">
        <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert">เพิ่มข้อมูลวัตถุดิบ</div>
        <form action="insert_material.php" method="post" enctype="multipart/form-data" >
            <div class="row py-2">
                <div class="col">
                    <label>รหัสวัตถุดิบ</label>
                    <input type="text" name="M_ID" class="form-control" placeholder="ป้อนรหัสวัตถุดิบ" required maxlength="4">
                </div>
                <div class="col">
                    <label>ชื่อวัตถุดิบ</label>
                    <input type="text" name="M_name" class="form-control" placeholder="ป้อนชื่อวัตถุดิบ" required>
                </div>
            </div>
            
            <div class="row py-2">
                <div class="col">
                    <label>หน่วยซื้อ</label>
                    <input type="text" name="M_unit_pack" class="form-control" placeholder="ป้อนหน่วยซื้อ" autocomplete="off" required>
                </div>
                <div class="col">
                    <label>หน่วยใช้</label>
                    <input type="text" name="M_unit_use" class="form-control" placeholder="ป้อนหน่วยใช้" autocomplete="off" required>
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