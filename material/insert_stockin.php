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
        
        //เพิ่มข้อมูลลงใน ตาราง material คอลัมน์ M_balane
        $sql3 = $conn->query("SELECT * FROM material WHERE id = $M_name");
        $row3 = mysqli_fetch_array($sql3);
        $tu_balance = $row3["M_number"]*$S_in;
        
        $sql = "INSERT INTO stockin(M_ID, M_name, S_date, S_in, S_unit_pack, S_balance, S_cost) VALUES('$M_ID', '$M_name', '$S_date', '$S_in','$S_unit_pack','$tu_balance','$S_cost')"; 
        $result = mysqli_query($conn, $sql);


        $sql2 = $conn->prepare("UPDATE material SET M_balane = M_balane+$S_in,U_balance= U_balance+'$tu_balance' WHERE id = $M_name");
        

        //เพิ่มข้อมูลลงใน ตาราง stockin คอลัมน์ S_balance

        if ($sql && $sql2->execute()) {

            $select = $conn->query("SELECT * FROM stockin WHERE M_name = $M_name");
            $chk_select = mysqli_num_rows($select);
            if($chk_select == '1'){
                $up_mcost = $conn->prepare("UPDATE material SET M_cost = $S_cost WHERE id = $M_name");
            }else{
                $select2 = $conn->query("SELECT * FROM stockin WHERE M_name = $M_name");
                $numrow_select2 = mysqli_num_rows($select2);
                while($row_select2 = $select2->fetch_array()){
                    $S_cost = $row_select2['S_cost'];
                    $total_cost +=  $S_cost / $numrow_select2;
                }
                $up_mcost = $conn->prepare("UPDATE material SET M_cost = $total_cost WHERE id = $M_name");
            }
            if($up_mcost->execute()){
                $select3 = $conn->query("SELECT * FROM material WHERE id = $M_name");
                $row_select3 = $select3->fetch_array();
                $m_cost = $row_select3['M_cost'];
                $m_number = $row_select3['M_number'];
                $up_msale = $conn->prepare("UPDATE material SET M_sale = $m_cost/$m_number WHERE id = $M_name");
                $up_msale->execute();
            }
            $_SESSION['success'] = '<script>
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "รับเข้าวัตถุดิบเรียบร้อยแล้ว",
                        showConfirmButton: false,
                        timer: 1500
                      })
                </script>';
                    
                    header("location: ../material/index_stockin.php");
        } else {
            $_SESSION['error'] = '<script>
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "รับเข้าวัตถุดิบไม่สำเร็จ",
                        showConfirmButton: false,
                        timer: 1500
                      })
                </script>';
                    
                    header("location: ../material/index_stockin.php");
            
        }
    }
?>