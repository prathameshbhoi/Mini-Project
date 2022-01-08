<?php

$data = 1;
$data2 = 2;
$data3 = 2;
$data4 = 2;
$data5 = 2;
$data6 = 2;
$data7 = 2;
$data8 = 2;
$data9 = 2;
$data11 = 2;
$data10 = $data.$data2.$data3.$data4.$data5.$data6.$data7.$data8.$data9.$data11;
$output=shell_exec("python test.py "  .$data10);

echo $output;


?>
