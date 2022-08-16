
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขสินค้า</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert">แก้ไขข้อมูลสินค้า</div>
        <form action="update.php" method="POST" enctype="multipart/form-data" >
            <?php
                require_once "../config/configpdo.php";
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $stml = $conn->query("SELECT * FROM product WHERE id = $id");
                    $stml->execute();
                    $data = $stml->fetch();
                }
            ?>
            <div class="row">
                <div class="col">
                   <label>รหัสสินค้า</label>
                    <input hidden type="text" name="id" value="<?= $data['id']; ?>" class="form-control" required> 
                    <input readonly type="text" name="P_ID" value="<?= $data['P_ID']; ?>" class="form-control" > 
                    <input type="hidden" name="P_image2" value="<?= $data['P_image']; ?>" class="form-control" required> 

                </div>
                
                <div class="col">
                    <label>ชื่อสินค้า</label>
                    <input type="text" name="P_name" value="<?= $data['P_name']; ?>" class="form-control" placeholder="ป้อนชื่อสินค้า" required>
                </div>
            </div>
            
            <div>
                <label>รูปภาพ</label>
                <input type="file" name="P_image" class="form-control" id="imgInput" >
                <img src="../uploads/<?= $data['P_image']; ?>" id="previewImg" alt=""  width="390px" >
            </div>
            <div >
                <label>ราคา</label>
                <input type="number" name="Price" value="<?= $data['Price']; ?>" class="form-control" placeholder="ป้อนราคา" required>
            </div>
            <div >
                <label>หน่วยผลิต</label>
                <select name="P_unit_pro" class="form-select" id="">
                    <option value="" selected hidden><?= $data['P_unit_pro']; ?></option>
                    <option value="ถาด">ถาด</option>
                    <option value="ปอนด์">ปอนด์</option>
                </select>
                <!-- -->
            </div>
            <div >
                <label>จำนวนแปลงหน่วย</label>
                <input type="number" name="P_number" value="<?= $data['P_number']; ?>" class="form-control" placeholder="ป้อนจำนวนแปลงหน่วย" required>
            </div>
            <button type="submit" name="update" class="btn btn-success my-3">บันทึก</button>
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