<?php

require_once __DIR__ . '/vendor/autoload.php';
include ('config/config_sqli.php');

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];	
$mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 
            'format' => 'A4',
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 10,
            'margin_bottom' => 16,
            'margin_header' => 9,
            'margin_footer' => 9,
            'mirrorMargins' => true,

            'fontDir' => array_merge($fontDirs, [
                __DIR__ . 'vendor/mpdf/mpdf/custom/font/directory',
            ]),
            'fontdata' => $fontData + [
                'thsarabun' => [
                    'R' => 'THSarabunNew.ttf',
                    'I' => 'THSarabunNew Italic.ttf',
                    'B' => 'THSarabunNew Bold.ttf',
                    'U' => 'THSarabunNew BoldItalic.ttf'
                ]
            ],
            'default_font' => 'thsarabun',
            'defaultPageNumStyle' => 1
        ]);

$mpdf->setFooter('{PAGENO}');//ตัวรันหน้า

	$tableh1 = '
    <hr>
    <br />
    </div>

	<table id="bg-table" width="100%" style="table table-borderless">
	    <tr >
	        <td  style="font-size: 22px; font-weight: bold;solid #000;padding:4px;text-align:center;"   width="10%">รหัสวัตถุดิบ</td>
	        <td  style="font-size: 22px; font-weight: bold;solid #000;padding:4px;text-align:center;"  width="15%">ชื่อวัตถุดิบ</td>
	        <td  width="15%" style="font-size: 22px; font-weight: bold; solid #000;padding:4px;text-align:center;">&nbsp; จำนวนคงเหลือ </td>
	        <td  style="font-size: 22px;font-weight: bold;padding:4px;text-align:center;"  width="15%">หน่วยซื้อ </td>
	    </tr>

	</thead>
		<tbody>';
        
		//คำสั่งให้เลือกข้อมูลจาก TABLE ชื่อ tbl_member โดยเรียงจาก member_id และให้เรียงลำดับจากมากไปน้อยคือ DESC และ เปิดดู error เวลามีปัญหา
    
    $query = "SELECT * FROM material " ; 
	$result = mysqli_query($conn, $query);
	$content = "";
		foreach ($result as $rs) {
            if($rs['M_balane'] <= $rs['M_point']){
            
			$tablebody .= '<tr>
				<td style="text-align:center;"  >'.$rs['M_ID'].'</td>
				<td style="text-align:center;"  >'.$rs['M_name'].'</td>
                <td style="text-align:center;"  >'.number_format($rs['M_balane'],2).'</td>
                <td style="text-align:center;"  >'.$rs['M_unit_pack'].'</td>
                
                </tr>';
                
		}
    }

    $sql4= "SELECT * FROM material WHERE M_balane <= M_point";
    $result=mysqli_query($conn,$sql4);
    $num=mysqli_num_rows($result);

    $date = '<p  style="font-size: 18px;font-weight: bold; ">รวมทั้งสิ้น '.$num.' รายการ</p>';



$table_date = ' <p  style="font-size: 18px; ">วันที่ $date</p>';
$tableend1 = " </tbody>
</table> <br /> <hr>"
;

$body_1='
	<style>
		body{
			  font-family: "thsarabun"; 
		}
	</style>';
$fordev22 ='
<style>

.img {
    text-align: left;
   
}
div{
       
    }
table {
  border-collapse: collapse;
  width: 100%;
}

td, th {
    font-size: 20px;
  
  padding: 5px;
}

tr:nth-child(even) {
  
}

</style>

<p align="left"  style="font-size: 24px; ">ร้านเบเกอรี</p>
<p  style="font-size: 18px; ">รายงานวัตถุดิบที่ต้องสั่งซื้อ</p>


    

';
	


$mpdf->WriteHTML($fordev22);
  
$mpdf->WriteHTML($tableh1);

$mpdf->WriteHTML($tablebody);

$mpdf->WriteHTML($tableend1);
$mpdf->WriteHTML($body_1);
$mpdf->WriteHTML($date);

$mpdf->Output($output, 'I');