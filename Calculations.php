<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function saveData(){
  $calc    = $_POST["calc"];  
  $result  = $_POST["result"]; 
  $date    = $_POST["date"];   
  $browser = $_POST["browser"];
  $ip      = $_POST["ip"];     

  $calc    = !empty($calc)    ? $calc    : "n/a" ;
  $result  = !empty($result)  ? $result  : "n/a" ;
  $date    = !empty($date)    ? $date    : "n/a" ;
  $browser = !empty($browser) ? $browser : "n/a" ;
  $ip      = !empty($ip)      ? $ip      : "n/a" ;



  $data = array( $calc, $result, $date, $browser, $ip );
  $file = fopen("calculations.csv", "a");
  fputcsv($file, $data);
  fclose($file);
}
saveData();

?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Bartek Laskowski: Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/main.css">
  </head>
  <body>


  </body>
</html>
<? // vim: tabstop=2 sw=2 ft=php
