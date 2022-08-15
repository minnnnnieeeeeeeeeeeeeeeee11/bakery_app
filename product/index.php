

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
   
    <div class="container">
        <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert"> ข้อมูลสินค้า</div>
        <hr>
        <a href="add_product.php" class="btn btn-success mb-4"><i class="bi bi-plus-circle-fill"></i> เพิ่มสินค้า</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>รูปภาพ</th>
                    <th>ราคา</th>
                    <th>หน่วยผลิต</th>
                    <th>จำนวนแปลงหน่วย</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="" class="btn btn-warning">แก้ไข</a>
                        <a href="" class="btn btn-danger">ลบ</a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script>
            let imgInput = document.getElementById('imgInput');    
            let previewImg = document.getElementById('previewImg');
            
            imgInput.onchange = evt => {
                const [file] = 
            }
        </script>
</body>
</html>

