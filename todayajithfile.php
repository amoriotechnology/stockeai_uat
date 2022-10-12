<?php

 

$con = mysql_connect("localhost","root","");

if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }

mysql_select_db("smart", $con);

$result = mysql_query("SELECT * FROM Form");

while($row = mysql_fetch_array($result))

  {

  echo $row['Id'] . " " . $row['name']. $row['Mobile']. $row['email'];

  echo "<br />";

  }

 

?>