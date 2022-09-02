<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สูตรการผลิต</title>
    <!--Bootstap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css%22%3E">
</head>
<body>
    <div class="container">
        <div class=" h4 text-center alert alert-info mb-4 mt-4" role="alert">ข้อมูลสูตรการผลิต</div>
        <hr>

        <?php
            if(isset($_SESSION['status']))
            {
                echo "<h4>".$_SESSION['status']."</h4>";
                unset($_SESSION['status']);
            }
        ?>

    <form action="insert_ing.php" method="POST">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ชื่อวัตถุดิบ</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col"></th>
                    <th scope="col">หน่วย</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../config/config_sqli.php';

                $sql = "SELECT * FROM material" ;
                $result=mysqli_query($conn,$sql);

                if(mysqli_num_rows($result) > 0) {
                    foreach($result as $key => $ing) {
                ?>
                    <tr>
                        <td><input type="checkbox" name="" value="<?= $ing['id']; ?>" /> <?= $ing['M_name']; ?></td>
                        <td><input type="number" name="ing_num[]" class="form-control"></td>
                        <td><input type="hidden" name="inglist[]" value="<?= $ing['id']; ?>" /></td>
                        <td><input readonly type="text" name="unit[]" class="form-control" value="<?= $ing['M_unit_use']; ?>"></td>
                        
                    </tr>
                    <?php } 
                } ?>
            </tbody>


        </table>
        <div class="form-group mt-3">
            <button name="save_ing" class="btn btn-primary">บันทึก</button>
        </div>
    </form>
    </div>
</body>
            
</html>