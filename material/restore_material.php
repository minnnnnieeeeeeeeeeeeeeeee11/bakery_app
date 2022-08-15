<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    session_start();
    require_once "../config/configpdo.php";

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $stmt = $conn -> query("DELETE FROM material WHERE id = $delete_id");
        $stmt -> execute();

        if ($stmt) {
            $_SESSION['success'] = "ลบข้อมูลเรียบร้อยแล้ว";
            echo "<script>
                $(document).ready(function () {
                    Swal.fire ({
                        icon: 'success',
                        title: 'สำเร็จ',
                        text: 'ลบข้อมูลเรียบร้อยแล้ว',
                        timer: 2000,
                        showConfirmButton: true
                    });
                });
            </script>";
            header("refresh:2; url=../material/restore_material.php");
        } else {
            $_SESSION['error'] = "ลบข้อมูลไม่สำเร็จ";
            echo "<script>
                $(document).ready(function () {
                    Swal.fire ({
                        icon: error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'ลบข้อมูลไม่สำเร็จ',
                        timer: 2000,
                        showConfirmButton: true
                    });
                });
            </script>";
            header("refresh:2; url=../material/restore_material.php");
        }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>material</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>

    <div class="container">
        <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert"> ข้อมูลวัตถุดิบ</div>
        <hr>
        <a href="add_material.php" class="btn btn-success mb-4"><i class="bi bi-plus-circle-fill"></i> เพิ่มวัตถุดิบ</a>
        <a href="restore_material.php" class="btn btn-outline-info mb-4"><i class="bi bi-trash3"></i> คืนค่าข้อมูล</a>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">รหัสวัตถุดิบ</th>
                    <th scope="col">ชื่อวัตถุดิบ</th>
                    <th scope="col">หน่วยซื้อ</th>
                    <th scope="col">หน่วยใช้</th>
                    <th scope="col">แปลงหน่วย</th>
                    <th scope="col">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    
                    $stmt = $conn -> query("SELECT * FROM material WHERE M_status='0' ");
                    $stmt -> execute();
                    $material = $stmt -> fetchAll();

                    if (!$material) {
                        echo "<p><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></p>";
                    } else {
                    foreach($material as $material)  {  
                ?>
                <tr>
                    <td><?php echo $material['id']; ?></td>
                    <td><?php echo $material['M_ID']; ?></td>
                    <td><?php echo $material['M_name']; ?></td>
                    <td><?php echo $material['M_unit_pack']; ?></td>
                    <td><?php echo $material['M_unit_use']; ?></td>
                    <td><?php echo $material['M_number']; ?></td>
                    <td>
                        <a data-id="<?php echo $material['id']; ?>" href=" ?delete=<?php echo $material['id']; ?>"
                        class="btn btn-danger">ลบ</a>
                    </td>
                    <!-- <td>
                        <a href="" class="btn btn-warning">แก้ไข</a>
                        <a href="" class="btn btn-danger">ลบ</a>
                    </td> -->
                </tr>
            </tbody>
            <?php } } ?>
        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>