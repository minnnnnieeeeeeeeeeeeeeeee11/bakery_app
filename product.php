





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
</head>
<body>

<div class="modal fade" id="plantModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header mb-4">
                              <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลสินค้า</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                              <form action="insert.php" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                          <label for="name" class="col-form-label">ชื่อสินค้า </label>
                                          <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                          <label for="enname" class="col-form-label">ชื่อของโรค (อังกฤษ) :</label>
                                          <input type="text" class="form-control" name="enname" required>
                                    </div>
                                    <div class="mb-3">
                                          <label for="img" class="col-form-label">รูปภาพ :</label>
                                          <input type="file" class="form-control" name="img" id="imgInput" required>
                                          <img id="previewImg" width="100%" alt="">
                                    </div>
                                    <div class="modal-footer">
                                          <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                                          
                                    </div>
                              </form>
                        </div>
                  </div>
            </div>
      </div>
    
</body>
</html>