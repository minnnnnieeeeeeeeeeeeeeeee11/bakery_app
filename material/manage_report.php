<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>วัตถุดิบที่ต้องสั่งซื้อ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <style>
    body {
        font-family: Bai Jamjuree;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert">ข้อมูลวัตถุดิบที่ต้องสั่งซื้อ</div>
        <hr>
        <div class="col text-end">
            <a href="../reportMat.php" class="btn btn-danger"><i class="bi bi-file-earmark-pdf"></i> โหลดรายงาน</a>
        </div>
        <table id="datatableid" class="table table-striped table-hover table-bordered">
            <thead class="table-danger">
                <tr align="center">
                    <th scope="col">รหัสวัตถุดิบ</th>
                    <th scope="col">ชื่อวัตถุดิบ</th>
                    <th scope="col">จำนวนคงเหลือ</th>
                    <th scope="col">หน่วยซื้อ</th>
                    <th scope="col">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    session_start();
                    require_once "../config/config_sqli.php";
                    $sql = "SELECT * FROM material" ;
                    $material=mysqli_query($conn,$sql);

                    $sql4= "SELECT * FROM material WHERE M_balane >= M_point";
                    $result=mysqli_query($conn,$sql4);
                    $num=mysqli_num_rows($result);
                    echo "รวมทั้งสิ้น $num รายการ" ;
                    /* $num = mysqli_num_rows( $material );
                    echo "จำนวนแถว ฐานข้อมูล เท่ากับ ".$num; */

                    if (!$material) {
                        echo "<p><td colspan='8' class='text-center'>ไม่มีข้อมูล</td></p>";
                    } else {
                    foreach($material as $material)  {  
                        if($material['M_balane'] <= $material['M_point']){

                ?>
                        <tr align="center">
                            <td><?php echo $material['M_ID']; ?></td>
                            <td><?php echo $material['M_name']; ?></td>
                            <td align="right"><?php echo number_format($material['M_balane'],2); ?></td>
                            <td align="right"><?php echo $material['M_unit_pack']; ?></td>
                            <td>
                                <?php
                                        if($material['M_balane'] <= $material['M_point']) {
                                                echo "<font color='red'>สั่งซื้อ</font>";
                                        } else {
                                                echo "<font color='blue'>ปกติ</font>";
                                        }
                                    ?>
                            </td>
                        </tr>
                <?php } 
                    }
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