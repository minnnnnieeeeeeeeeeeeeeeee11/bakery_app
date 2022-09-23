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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">


    <style>
    body {
        font-family: Bai Jamjuree;
    }

    .icon-cog {
        color: #ffc107;
        font-size: 20px;
    }

    .icon-de {
        color: red;
        font-size: 20px
    }

    .icon-ing {
        color: green;
        font-size: 20px
    }

    .icon-ing-do {
        color: grey;
        font-size: 20px
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

        <table id="datatableid" class="table table-striped table-hover table-bordered">
            <thead class="table-danger">
                <tr align="center">

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


                    if (!$product) {
                        echo "<p><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></p>";
                    } else {
                    foreach($product as $product)  {  
                ?>
                <tr align="center">
                    <td><?php echo $product['P_ID']; ?></td>
                    <td><?php echo $product['P_name']; ?></td>
                    <td><img height="60" width="70" src="../uploads/<?= $product['P_image']; ?>" class="rounded" alt="">
                    </td>
                    <td><?php echo number_format($product['Price'], 2); ?></td>
                    <td><?php echo $product['P_unit_pro']; ?></td>
                    <td><?php echo $product['P_number']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $product['id']; ?>"
                            class="icon-cog fs-5 me-3 btn btn-outline-warning"><i class="bi bi-pencil-fill"></i></a>
                        <a data-id="<?php echo $product['id']; ?>" href=" ?delete=<?php echo $product['id']; ?>"
                            class="delete-btn icon-de fs-5 me-3 btn btn-outline-danger"><i
                                class="bi bi-trash3-fill"></i></a>

                        <?php 
                        
                            $P_ID = "";
                            $stmt2 = "SELECT * FROM ing WHERE P_ID = '".$product['id']."'";
                            $q = mysqli_query($conn, $stmt2);
                            $followingdata = $q->fetch_assoc();
                            
                            if(mysqli_num_rows($q) >0){
                                if ($product['id'] == $followingdata['P_ID']) {
                                    
                                    echo "<a href='#' class='icon-ing-do btn btn-outline-success' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='bi bi-eye-fill'></i></a>
                                    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>สูตรการผลิต</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                                <div class='row'>
                                                    <div class='col'>
                                                        <h4>".$followingdata['P_ID']."</h4>
                                                    </div>
                                                </div>
                                                <div class='row py-2'>
                                                    <div class='col'>
                                                        <h6>".$followingdata['M_ID']."</h6>
                                                    </div>
                                                    <div class='col'>
                                                        <h6>".$followingdata['ing_num']."</h6>
                                                    </div>
                                                    <div class='col'>
                                                        <h6>".$followingdata['ing_use']."</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>ปิด</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>";
                                } 
                            }else{
                                echo "<a href='ingredient.php?id=".$product['id']."' class='icon-ing btn btn-outline-success'><i class='bi bi-file-earmark-plus-fill'></i></a>";
                            }
                        ?>
                    </td>

                </tr>
                <?php } 
                } ?>
            </tbody>

        </table>

        
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

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
    <script>
    $(document).ready(function() {

        $('#datatableid').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "ไม่มีข้อมูลในตาราง",
                "info": "แสดง _START_ - _END_ จาก _TOTAL_ รายการ",
                "infoEmpty": "แสดง 0 - 0 จาก 0 รายการ",
                "infoFiltered": "(กรอง จาก _MAX_ รายการทั้งหมด)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "แสดง _MENU_ รายการ",
                "loadingRecords": "กำลังโหลด...",
                "processing": "",
                "search": "ค้นหา:",
                "zeroRecords": "ไม่พบบันทึกที่ตรงกัน",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "หน้าถัดไป",
                    "previous": "ก่อนหน้า"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            },
            "searching": false,

        });
    });
    </script>

</body>

</html>