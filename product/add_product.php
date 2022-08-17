<?php 
    session_start();
    require_once "../config/config_sqli.php";
    $query = "SELECT * FROM product ORDER BY P_ID desc limit 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $lastid = $row["P_ID"];

    if (empty($lastid)) 
    {
        $productid = "P001";
    } 
    else
    {
        $idd = str_replace("P","",$lastid);
        $id = str_pad($idd + 1,3,0, STR_PAD_LEFT);
        $productid = 'P' .$id;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้า</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert">เพิ่มข้อมูลสินค้า</div>
        <form action="insert_product.php" method="POST" enctype="multipart/form-data" >
            <div class="row">
                <div class="col">
                   <label>รหัสสินค้า</label>
                    <input type="text" name="P_ID" id="P_ID" value="<?php echo $productid; ?>" class="form-control"  readonly> 
                </div>
                
                <div class="col">
                    <label>ชื่อสินค้า</label>
                    <input type="text" name="P_name" class="form-control" placeholder="ป้อนชื่อสินค้า" required>
                </div>
            </div>
            
            <div>
                <label>รูปภาพ</label>
                <input type="file" name="P_image" class="form-control" id="imgInput" required>
                <img id="previewImg" alt=""  width="390px" >
            </div>
            <div >
                <label>ราคา</label>
                <input type="number" name="Price" class="form-control" placeholder="ป้อนราคา" required>
            </div>

            <div >
                <label for="">หน่วยผลิต</label>
                <select name="P_unit_pro" class="form-select" id="">
                    <option value="" selected hidden>--- เลือกหน่วยผลิต ---</option>
                    <option value="ถาด">ถาด</option>
                    <option value="ปอนด์">ปอนด์</option>
                </select>
            </div>
            <div >
                <label>จำนวนแปลงหน่วย</label>
                <input type="number" name="P_number" class="form-control" placeholder="ป้อนจำนวนแปลงหน่วย" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success my-3">บันทึก</button>
            <a href="index.php" class="btn btn-danger">กลับ</a>
        </form>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
            let imgInput = document.getElementById('imgInput');    
            let previewImg = document.getElementById('previewImg');
            
            imgInput.onchange = evt => {
                const [file] = imgInput.files;
                if (file) {
                    previewImg.src = URL.createObjectURL(file);
                }
            }
        </script>
</body>
</html>