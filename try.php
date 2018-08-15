<?php
$time=date("Y-m-d H:i:s");
echo $time, "<br>";
echo $date=date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")."+ 1 minutes"));
?>