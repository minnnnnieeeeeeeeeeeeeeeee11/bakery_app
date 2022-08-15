<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    session_start();
    require_once "../config/configpdo.php";

    if (isset($_POST['submit'])) {
        $P_ID = $_POST['P_ID'];
        $P_name = $_POST['P_name'];
        $P_image = $_FILES['P_image'];
        $Price = $_POST['Price'];
        $P_unit_pro = $_POST['P_unit_pro'];
        $P_number = $_POST['P_number'];

        $allow = array('jpg', 'jpeg', 'png');
        $extention = explode(".", $P_image['name']);
        $fileActExt = strtolower(end($extention));
        $fileNew = rand() . "." . $fileActExt;
        $filePath = "../uploads/".$fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($P_image['size'] > 0 && $P_image['error'] == 0){
                if (move_uploaded_file($P_image['tmp_name'], $filePath)) {
                    $sql = $conn->prepare("INSERT INTO product(P_ID, P_name, P_image, Price, P_unit_pro, P_number) VALUES(:P_ID, :P_name, :P_image, :Price, :P_unit_pro, :P_number)");
                    $sql->bindParam(":P_ID", $P_ID);
                    $sql->bindParam(":P_name", $P_name);
                    $sql->bindParam(":P_image", $fileNew);
                    $sql->bindParam(":Price", $Price);
                    $sql->bindParam(":P_unit_pro", $P_unit_pro);
                    $sql->bindParam(":P_number", $P_number);
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
                        header("refresh:2; url=../product/index.php");
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
                        header("refresh:2; url=../product/index.php");
                    }
                }
            }
        }
        
    }
?>