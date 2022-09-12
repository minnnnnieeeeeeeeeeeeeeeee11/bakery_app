<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
    session_start();
    require_once "../config/config_sqli.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลวัตถุดิบที่รับเข้า</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@0,200;0,300;0,400;0,500;0,700;1,200&family=Itim&family=Mali:wght@300&display=swap"
        rel="stylesheet">
    <style>
    body {
        font-family: Bai Jamjuree;
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

        <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert">ข้อมูลวัตถุดิบที่รับเข้า</div>
        <hr>
        <a href="stockin_material.php" class="btn btn-success mb-4"><i class="bi bi-plus-circle-fill"></i>
            รับเข้าวัตถุดิบ</a>
        <table id="datatableid" class="table table-striped table-hover table-bordered style="width:100%"">
            <thead class="table-danger">
                <tr align="center">
                    <th scope="col">วันที่รับเข้า</th>
                    <th scope="col">รหัสวัตถุดิบ</th>
                    <th scope="col">ชื่อวัตถุดิบ</th>
                    <th scope="col">จำนวนที่รับเข้า</th>
                    <th scope="col">หน่วยซื้อ</th>
                    <th scope="col">คงเหลือ</th>
                    <th scope="col">ต้นทุนที่รับเข้า</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
            
            
                $stmt = "SELECT stockin.*,material.M_name FROM stockin INNER JOIN material ON stockin.M_ID = material.M_ID ORDER BY stockin.id ASC ";                
                $stockin = $conn->query($stmt);
                    if (!$stockin) {
                        echo "<p><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></p>";
                    } else {
                    foreach($stockin as $stockin)  {  
                ?>
                <tr align="center">
                    <td><?php echo $stockin['S_date']; ?></td>
                    <td><?php echo $stockin['M_ID']; ?></td>
                    <td><?php echo $stockin['M_name']; ?></td>
                    <td><?php echo $stockin['S_in']; ?></td>
                    <td><?php echo $stockin['S_unit_pack']; ?></td>
                    <td><?php echo number_format($stockin['S_balance']); ?></td>
                    <td align="right"><?php echo number_format($stockin['S_cost'], 2); ?></td>
                </tr>
                <?php } 
                } ?>
            </tbody>

        </table>


    </div>
</body>
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

</html>