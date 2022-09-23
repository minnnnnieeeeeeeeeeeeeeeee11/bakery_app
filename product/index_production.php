<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การผลิต</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    body {
        font-family: Bai Jamjuree;
    }
    </style>
</head>

<body>
<?php
        session_start();
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }elseif(isset($_SESSION['success'])){
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
    ?>
    <div class="container">
        <div class=" h4 text-center alert alert-info mb-4 mt-2" role="alert">รายการสินค้าที่สั่งผลิต</div>
        <hr>
        <div class="col text-end">
          <a href="production_order.php" class="btn btn-success" ><i class="fa-solid fa-circle-plus"></i> สั่งผลิต</a>
        </div>
        <table id="datatableid" class="table table-striped table-hover table-bordered" style="width:100%">
            <thead class="table-danger">
                <tr align="center">
                    <th scope="col">วันที่สั่งผลิต</th>
                    <th scope="col">รหัสสินค้า</th>
                    <th scope="col">ชื่อสินค้า</th>
                    <th scope="col">จำนวนที่ผลิต</th>
                    <th scope="col">หน่วยผลิต</th>
                    <th scope="col">ต้นทุนในการผลิต</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                  
                  require_once "../config/config_sqli.php";
                  
                  $sql = "SELECT * FROM production_order JOIN product ON production_order.P_ID = product.id" ;   
                  $in_order=mysqli_query($conn,$sql);

              
                  if (!$in_order) {
                      echo "<p><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></p>";
                  } else {
                  foreach($in_order as $in_order)  {  
              ?>
                <tr align="center">
                    <td><?php echo $in_order['Pro_date']; ?></td>
                    <td><?php echo $in_order['P_ID']; ?></td>
                    <td><?php echo $in_order['P_name']; ?></td>
                    <td><?php echo $in_order['Pro_amount']; ?></td>
                    <td><?php echo $in_order['P_unit_pro']; ?></td>
                    <td><?php echo number_format($in_order['Pro_cost'],2); ?></td>
                </tr>
                <?php } 
                } ?>

            </tbody>
        </table>
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