<?php

function saveData(){
  $calc    = $_POST["calc"];  
  $result  = $_POST["result"]; 
  $date    = $_POST["date"];   
  $browser = $_POST["browser"];
  $ip      = $_POST["ip"];     

  $calc    = !empty($calc)    ? $calc    : "n/a" ;
  $result  = !empty($result)  ? $result  : "0"   ;
  $date    = !empty($date)    ? $date    : "n/a" ;
  $browser = !empty($browser) ? $browser : "n/a" ;
  $ip      = !empty($ip)      ? $ip      : "n/a" ;



  $data = array( $calc, $result, $date, $browser, $ip );
  $file = fopen("calculations.csv", "a");
  fputcsv($file, $data);
  fclose($file);
}
saveData();


function getData(){
  $tbl = array();
  $file = fopen("calculations.csv", "r");
  while (($data = fgetcsv($file, ",")) !== FALSE) {
    if($data[2] !== "n/a"){
      $tbl[] = array(
        "calc" => $data[0],
        "result" => $data[1],
        "date" => $data[2],
        "browser" => $data[3],
        "ip" => $data[4]
      );
    }
  }
  fclose($file);
  $s_date = array_column($tbl, 'date');
  array_multisort($s_date, SORT_DESC, $tbl);

  foreach($tbl as $row){
    echo "<tr>\n";
    foreach($row as $col) {
      echo "<td>" . $col . "</td>\n";
    }
    echo "</tr>\n";
  }
}

?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Bartek Laskowski: Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/main.css">
  </head>
  <body>

<table>
  <thead>
    </tr>
      <td>calculation</td>
      <td>result</td>
      <td>date</td>
      <td>browser</td>
      <td>ip</td>
    </tr>
  </thead>
  <tbody>
    <?=getData()?>
  </tbody>
</table>

  </body>
</html>
<?php // vim: tabstop=2 sw=2 ft=php
