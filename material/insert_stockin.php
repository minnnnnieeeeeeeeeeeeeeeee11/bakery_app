<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    session_start();
    require_once "../config/config_sqli.php";

    if (isset($_POST['submit'])) {
        $M_ID = $_POST['M_ID'];
        $M_name = $_POST['M_name'];
        $S_date = $_POST['S_date'];
        $S_in = $_POST['S_in'];
        $S_unit_pack = $_POST['S_unit_pack'];
        $S_cost = $_POST['S_cost'];
        

        $sql = "INSERT INTO stockin(M_ID, M_name, S_date, S_in, S_unit_pack, S_cost) VALUES('$M_ID', '$M_name', '$S_date', '$S_in',' $S_unit_pack', '$S_cost')"; 
        $result = mysqli_query($conn, $sql);

        
        //เพิ่มข้อมูลลงใน ตาราง material คอลัมน์ M_balane
        
        $sql3 = $conn->query("SELECT * FROM material WHERE id = $M_name");
        $row3 = mysqli_fetch_array($sql3);
        $tu_balance = $row3["M_number"]*$S_in;

        $sql2 = $conn->prepare("UPDATE material SET M_balane = M_balane+$S_in,U_balance= U_balance+'$tu_balance' WHERE id = $M_name");
        
        

        if ($sql && $sql2->execute()) {
            $_SESSION['success'] = "รับเข้าข้อมูลวัตถุดิบเรียบร้อยแล้ว";
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
            header("refresh:2; url=../material/index_stockin.php");
        } else {
            $_SESSION['error'] = "รับเข้าข้อมูลวัตถุดิบไม่สำเร็จ";
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
            header("refresh:2; url=../material/index_stockin.php");
        }
    }
?>
