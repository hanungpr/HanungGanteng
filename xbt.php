<?php
// HanungPR
function read ($length='255') 
{ 
   if (!isset ($GLOBALS['StdinPointer'])) 
   { 
      $GLOBALS['StdinPointer'] = fopen ("php://stdin","r"); 
   } 
   $line = fgets ($GLOBALS['StdinPointer'],$length); 
   return trim ($line); 
} 
function hpr($reff){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://app.viral-loops.com/api/v2/events');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"publicToken":"RlnFOgDUuNs_mkW38dAZJLG3_Fc","params":{"event":"registration","user":{"firstname":"didi'.rand(1000000000,9999999999).'","email":"didi'.rand(1000000000,9999999999).'@gmail.com"},"referrer":{"referralCode":"'.$reff.'"},"refSource":"copy"}}');\
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    
    $headers = array();
    $headers[] = 'Accept: application/json, text/plain, */*';
    $headers[] = 'Referer: https://primexbt.com/';
    $headers[] = 'Origin: https://primexbt.com';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36';
    $headers[] = 'Content-Type: application/json;charset=UTF-8';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    return $result;
}
echo "Reff : ";
$reff = read();
echo "Berapa Banyak? : ";
$banyak = read();
echo "\n============== START Tuyul ==============\n";
$x = 1;
while($x <= $banyak) {
$ekse = json_decode(hpr($reff));
if ($ekse->isNew == "1"){
    echo "".$x.". SUKSES Ngereff";
} else {
    echo "".$x.". GAGAL Ngereff";
}echo PHP_EOL;
$x++;
}
echo "================= Done ==================\n";
