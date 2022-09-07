<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    session_start();
    require_once "../config/config_sqli.php";

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $stmt1 = "UPDATE product set P_status='0' WHERE id = $delete_id";
        $stmt1 = mysqli_query($conn, $stmt1);

        if ($stmt1 ) {
            $_SESSION['success'] = "ลบข้อมูลเรียบร้อยแล้ว";
            header("refresh:2; url=../material/index.php");
        } 
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สินค้า</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        body{
            font-family: Bai Jamjuree;
        }
    </style>
</head>
<body>
<?php
        if(isset($_SESSION['success'])){
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
    ?>
    <div class="container">
        <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert"> ข้อมูลสินค้า</div>
        <hr>
        <a href="add_product.php" class="btn btn-success mb-4"><i class="bi bi-plus-circle-fill"></i> เพิ่มสินค้า</a>
        <a href="restore_product.php" class="btn btn-outline-info mb-4"><i class="bi bi-trash3"></i> คืนค่าข้อมูล</a>
    
        <table class="table table-striped table-hover">
            <thead>
                <tr>

                    <th scope="col">รหัสสินค้า</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">รูปภาพ</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">หน่วยผลิต</th>
                    <th scope="col">จำนวนต่อหน่วย</th>
                    <th scope="col">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        $stmt = "SELECT * FROM product WHERE P_status='1'" ;
                        $product=mysqli_query($conn,$stmt);
                    /* $stmt = $conn -> query("SELECT * FROM product WHERE P_status='1' ");
                    $stmt -> execute();
                    $product = $stmt -> fetchAll(); */

                    if (!$product) {
                        echo "<p><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></p>";
                    } else {
                    foreach($product as $product)  {  
                ?>
                <tr>
                    <td><?php echo $product['P_ID']; ?></td>
                    <td><?php echo $product['P_name']; ?></td>
                    <td width="250px"><img height="60" src="../uploads/<?= $product['P_image']; ?>" class="rounded" alt=""></td>
                    <td><?php echo $product['Price']; ?></td>
                    <td><?php echo $product['P_unit_pro']; ?></td>
                    <td><?php echo $product['P_number']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $product['id']; ?>" class="btn btn-warning">แก้ไข</a>
                        <a data-id="<?php echo $product['id']; ?>" href=" ?delete=<?php echo $product['id']; ?>"
                        class="btn btn-danger delete-btn">ลบ</a>
                        
                        <?php 
                        
                            $P_ID = "";
                            $stmt2 = "SELECT * FROM ing WHERE P_ID = '".$product['id']."'";

                            $q = mysqli_query($conn, $stmt2);
                            $followingdata = $q->fetch_assoc();
                            
                            if(mysqli_num_rows($q) >0){
                                if ($product['id'] == $followingdata['P_ID']) {
                                    echo '<button type="submit" name="submit" class="btn btn-success ">ดูสูตร</button>';
                                } 
                            }else{
                                echo "<a href='ingredient.php?id=".$product['id']."' class='btn btn-primary'><i class='bi bi-plus-circle-fill'></i> เพิ่มสูตร</a>";
                            }
                        ?>
                    </td>
                   
                    
                </tr>
                <?php } 
                } ?>
            </tbody>
            
        </table>
        <hr>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
    $('.delete-btn').click(function(e) {
        var materialID = $(this).data('id');
        e.preventDefault();
        deleteConfirm(materialID);
    })

    function deleteConfirm(materialID) {
        Swal.fire({
            title: 'แจ้งเตือน',
            text: 'ต้องการลบรายการนี้หรือไม่',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#bebebe',
            confirmButtonText: "ตกลง",
            cancelButtonText: "ยกเลิก",
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: 'index.php',
                            type: 'GET',
                            data: 'delete=' + materialID
                        })
                        .done(function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'สำเร็จ',
                                text: 'ลบข้อมูลสำเร็จแล้ว',
                                timer: '2000'
                            }).then(() => {
                                document.location.href =
                                    'index.php';
                            })
                        })
                        .fail(function() {
                            Swal.fire('เกิดข้อผิดพลาด ',
                                'โปรดลองใหม่อีกครั้ง', 'error'
                            );
                            window.location.reload();
                        })
                })
            }
        })
    }
    </script>
        
</body>
</html>

