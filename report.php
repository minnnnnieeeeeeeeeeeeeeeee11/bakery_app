<?php


require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [ // lowercase letters only in font key
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'
        ]
    ],
    'default_font' => 'sarabun'
]);
ob_start();

?>

้<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานวัตถุดิบที่ต้องสั่งซื้อ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        body{
            font-family: 'Sarabun', sans-serif;
        }
    </style>
    </head>
<body>
    <div class="container">
    <h2 align="center">รายงานวัตถุดิบที่ต้องสั่งซื้อ</h2>

    <table class="table table-striped table-hover table-bordered">
    <thead >
                <tr align="center">
                    <th scope="col">รหัสวัตถุดิบ</th>
                    <th scope="col">ชื่อวัตถุดิบ</th>
                    <th scope="col">จำนวนคงเหลือ</th>
                    <th scope="col">หน่วยใช้</th>
                    <th scope="col">จุดสั่งซื้อ</th>
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                </tr>
                <tr align="center">
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                </tr>
                <tr align="center">
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                </tr>
            </tbody>
    </table>
    <?php
        $html=ob_get_contents();
        $mpdf->WriteHTML($html);
        $mpdf->Output("MyReport.pdf");
        ob_end_flush();
    ?>
    <a href="MyReport.pdf" class="btn btn-success">Download</a>
    
    </div>

    
</body>
</html>