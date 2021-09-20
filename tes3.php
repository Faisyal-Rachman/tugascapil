<?php
include "koneksi.php";
$sql = "SELECT id,bday,namalengkap FROM users WHERE MONTH(bday) = MONTH(CURDATE()) ORDER BY DATE_FORMAT(bday,'%m %d')";
$query = mysql_query($sql);
//$rows = mysql_fetch_array($query);
while($rows=mysql_fetch_array($query))
{
echo $rows['namalengkap'] . "  " . $rows['bday']."<br>";
}
?>