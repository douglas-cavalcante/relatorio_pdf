<?php

require_once __DIR__. '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['format'=>'A4-L','orientation'=>'L']);

//Start Table
$lines =  "";
for($i = 1 ; $i < 11; $i++){
    $color = ($i % 2 == 0) ? '#CCC' : '#FFF';
    $lines =  $lines."
    <tr style='background-color:{$color};'>
        <td>Coluna {$i}</td>
        <td>Coluna  {$i}</td>
        <td>Coluna  {$i}</td>
    </tr>
    ";
}

$headTable = "<table style='width:100%;'>";
$footerTable = "</table>";
$table = $headTable . $lines . $footerTable;
//End Table

//Page 
$htmlContent = "
    <html>
        <body>
            {$table}
        </body>
    </html>";
//End page

$mpdf->WriteHTML($htmlContent);
$mpdf->Output();
?>