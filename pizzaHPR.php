<?php
function read ($length='255') 
{ 
   if (!isset ($GLOBALS['StdinPointer'])) 
   { 
      $GLOBALS['StdinPointer'] = fopen ("php://stdin","r"); 
   } 
   $line = fgets ($GLOBALS['StdinPointer'],$length); 
   return trim ($line); 
} 
echo "Reff : ";
$reff = read();
echo "Berapa Banyak? : ";
$banyak = read();
echo "No : ";
$no = read();
echo "\n==================== START Tuyul ====================\n";
$x = 1;
while($x <= $banyak) {
    $reqid = file_get_contents('https://tools-hanungpr.c9users.io/api-pizza/getotp.php?no='.$no);
    if (!$reqid){
        echo "GAGAL BOSQ! - Hubungi Admin";
    } else {
        echo "Otp : ";
        $otp = read();
        $regist = file_get_contents('https://tools-hanungpr.c9users.io/api-pizza/hprRegist.php?otp='.$otp.'&reqid='.$reqid.'&reff='.$reff);
        echo $regist;
    }echo PHP_EOL;
    $x++;
}