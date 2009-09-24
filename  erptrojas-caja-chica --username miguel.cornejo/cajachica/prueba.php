<?php
$tomorrow  =  (date("d")-10)."-".date("m")."-".date("Y");
$lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
$nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);
 echo "".$tomorrow;
?>
