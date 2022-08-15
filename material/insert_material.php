<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    session_start();
    require_once "../config/configpdo.php";

    if (isset($_POST['submit'])) {
        $M_ID = $_POST['M_ID'];
        $M_name = $_POST['M_name'];
        $M_unit_pack = $_POST['M_unit_pack'];
        $M_unit_use = $_POST['M_unit_use'];
        $M_number = $_POST['M_number'];
        $M_Yield = $_POST['M_Yield'];
        
        $sql = $conn->prepare("INSERT INTO material(M_ID, M_name, M_unit_pack, M_unit_use, M_number, M_Yield) VALUES(:M_ID, :M_name, :M_unit_pack, :M_unit_use, :M_number, :M_Yield)");
        $sql->bindParam(":M_ID", $M_ID);
        $sql->bindParam(":M_name", $M_name);
        $sql->bindParam(":M_unit_pack", $M_unit_pack);
        $sql->bindParam(":M_unit_use", $M_unit_use);
        $sql->bindParam(":M_number", $M_number);
        $sql->bindParam(":M_Yield", $M_Yield);
        $sql->execute();

        if ($sql) {
            $_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อยแล้ว";
            echo "<script>
                $(document).ready(function () {
                    Swal.fire ({
                        icon: 'success',
                        title: 'สำเร็จ',
                        text: 'เพิ่มข้อมูลเรียบร้อยแล้ว',
                        timer: 2000,
                        showConfirmButton: true
                    });
                });
            </script>";
            header("refresh:2; url=../material/index.php");
        } else {
            $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ";
            echo "<script>
                $(document).ready(function () {
                    Swal.fire ({
                        icon: error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'เพิ่มข้อมูลไม่สำเร็จ',
                        timer: 2000,
                        showConfirmButton: true
                    });
                });
            </script>";
            header("refresh:2; url=../material/index.php");
        }
    }


?>