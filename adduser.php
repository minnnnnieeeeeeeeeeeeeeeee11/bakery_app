  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adduser</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert"> เพิ่มข้อมูลผู้ใช้</div>
        <form action="insert_user.php" method="POST">
            <label>ชื่อผู้ใช้</label>
            <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้" required> <br>
            <label>รหัสผ่าน</label>
            <input type="number" name="password" class="form-control" placeholder="รหัสผ่าน" required> <br>
            <input type="submit" value="บันทึก" class="btn btn-success">
            <a href="user.php" class="btn btn-danger">ยกเลิก</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
      </script>
</body>
</html>