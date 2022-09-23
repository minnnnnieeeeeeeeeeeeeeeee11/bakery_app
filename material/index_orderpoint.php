<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการข้อมูลความต้องการใช้สินค้า</title>
    <!--Bootstap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <style>
        body{
            font-family: Bai Jamjuree;
        }
        .icon-cog {
        color: #ffc107;
        font-size: 20px;
    }
    </style>
</head>
<body>
<?php
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }elseif(isset($_SESSION['success'])){
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
    ?>
    <div class="container">
    <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert">คำนวณจุดสั่งซื้อวัตถุดิบ</div>
    <hr>
        <a href="orderpoint.php" class="btn btn-success mb-4"><i class="bi bi-plus-circle-fill"></i> เพิ่มความต้องการใช้สินค้า</a>
        <table id="datatableid" class="table table-striped table-hover table-bordered">
            <thead class="table-danger">
                <tr align="center">
                    <th scope="col">รหัสวัตถุดิบ</th>
                    <th scope="col">ชื่อวัตถุดิบ</th>
                    <th scope="col">D</th>
                    <th scope="col">LT</th>
                    <th scope="col">จัดการ</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                    
                    require_once "../config/config_sqli.php";
                    $sql = "SELECT orderpoint.*,material.M_name FROM orderpoint INNER JOIN material ON orderpoint.M_ID = material.M_ID ORDER BY orderpoint.id ASC  ";                
                    $orderpoint=mysqli_query($conn,$sql);

                    if (!$orderpoint) {
                        echo "<p><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></p>";
                    } else {
                    foreach($orderpoint as $orderpoint)  {  
                ?>
                <tr align="center">
                
                    <td width="20%"><?php echo $orderpoint['M_ID']; ?></td>
                    <td><?php echo $orderpoint['M_name']; ?></td>
                    <td><?php echo $orderpoint['D']; ?></td>
                    <td><?php echo $orderpoint['LT']; ?></td>
                    <td width="15%">
                    <a href="edit_orderpoint.php?id=<?php echo $orderpoint['id']; ?>" class="icon-cog "><i
                                class="btn btn-outline-warning bi bi-pencil-fill"></i></a>
                    </td>
                </tr>
                <?php } 
                } ?>
            </tbody>
        </table>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    
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