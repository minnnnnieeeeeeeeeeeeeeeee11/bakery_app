<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php
session_start();
require_once '../config/config_sqli.php';

if(isset($_POST['save_ing']))
{

    $inglist = $_POST['inglist'];
    $ing_num = $_POST['ing_num'];
    $unit = $_POST['unit'];
    

    for ($x=0; $x<count($_REQUEST['inglist']; $x++))

    {
        $inglist = $_REQUEST['inglist'][$x];
        $ing_num = $_REQUEST['ing_num'][$x];
        $unit = $_REQUEST['unit'][$x];

        $query = "INSERT INTO ing (M_name,ing_num,M_unit_use) VALUE ('$inglist','$ing_num','$unit')";
        $query_run = mysqli_query($conn, $query);

    }
/* 
    foreach(array_combine($inglist, $ing_num) as $ing => $num)

    {
        $inglist = implode(",",$_POST['inglist']);
        $ing_num = implode(",",$_POST['ing_num']);

        if (!empty($num)) {
            

            $query = "INSERT INTO ing (M_name,ing_num) VALUE ('$ing','$num')";
            $query_run = mysqli_query($conn, $query);
        }
    } */
    /* if ($query_run) {
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
        header("refresh:2; url=../material/ing.php");
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
        header("refresh:2; url=../material/ing.php");
    } */
    


    /* if($query_run)
    {
        $_SESSION['status'] = "เพิ่มข้อมูลเรียบร้อย";
        header("Location: ../material/ing.php");
     }
    else
    {
        $_SESSION['status'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header("Location: ../material/ing.php");
    } /

   /  $query = "INSERT INTO ing (name,ing_num) VALUE ('$inglist','$ing_num')";
    $query_run = mysqli_query($conn, $query); */


}
?>