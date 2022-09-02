<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    session_start();
    require_once "../config/config_sqli.php";

    if (isset($_POST['submit'])) {
        $M_ID = $_POST['M_ID'];
        $M_name = $_POST['M_name'];
        $M_balane = $_POST['M_balane'];
        
        $sql2 = "SELECT * FROM material WHERE id = $M_name";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($result2);
        $t_balane = $row2["U_balance"]-$M_balane;
        $t_number = $t_balane/$row2["M_number"];
        $ts_number = number_format($t_number,2);

        $sql = "UPDATE material SET U_balance = '$t_balane',M_balane = '$ts_number' WHERE id = $M_name";
        $result = mysqli_query($conn, $sql);
        
        if ($sql ) {
            $_SESSION['success'] = "รับเข้าข้อมูลวัตถุดิบเรียบร้อยแล้ว";
            echo "<script>
                $(document).ready(function () {
                    Swal.fire ({
                        icon: 'success',
                        title: 'สำเร็จ',
                        text: 'ตัดสต็อกข้อมูลวัตถุดิบเรียบร้อยแล้ว',
                        timer: 2000,
                        showConfirmButton: true
                    });
                });
            </script>";
            header("refresh:2; url=../material/cutstock_material.php");
        } else {
            $_SESSION['error'] = "รับเข้าข้อมูลวัตถุดิบไม่สำเร็จ";
            echo "<script>
                $(document).ready(function () {
                    Swal.fire ({
                        icon: error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'ตัดสต็อกข้อมูลวัตถุดิบไม่สำเร็จ',
                        timer: 2000,
                        showConfirmButton: true
                    });
                });
            </script>";
            header("refresh:2; url=../material/cutstock_material.php");
        }
    }
?>
