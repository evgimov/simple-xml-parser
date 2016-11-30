<?php
  echo "<pre>";
  header('Content-Type: text/html; charset= utf8');
  $operators = simplexml_load_file("http://www.logofon.ru/xml/ips.xml");
  foreach ($operators->operator as $operator) {
    foreach ($operator->range as $range) {
      $id = $operator["id"];
      $begin_ip = $range["ip1"];
      $end_ip = $range["ip2"];
      $query = "SELECT * FROM ips_country";
      $res = mysql_query($query);
      while ($row = mysql_fetch_array($res)){
        if ($row["operator_id"] == $id){
          $query2 = "INSERT INTO ips_ip(operator_id,begin_ip,end_ip) VALUES($id,$begin_ip,$end_ip)";
          $res = mysql_query($query2);
          var_dump($res);
        }
        else "Error";
        echo "<br>";
      }
    }
  }

?>
