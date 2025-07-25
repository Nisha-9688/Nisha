<?php
date_default_timezone_set("Asia/Kolkata"); // Set timezone as needed
echo "<h2>Current date and time in different formats</h2>";

//format 1  full date and time
echo "1.Full date and time =>". date("d-m-Y H:i:s")."<br>";

//format 2 year and month
echo "2. Date/Month/year =>".date("d-m-y")."<br>";

//format 3 day of week,month and year
echo "3.Day of week,Month,year(l,F Y) =>".date("l,F Y")."<br>";

//format 4  12-hour format with AM/PM
echo "4.12-hour format with AM/PM =>".date("h:i A")."<br>";

//for future date prediction
// time() print unix time-stamp from 1, jan 1970
echo time()."<br>";
$onehour=time()+(1*60*60);
echo "Future date from current time =>".date('h:i a',$onehour)."<br>";
$oneday=time()+(1*24*60*60);
echo "Future day from current time =>".date("d/m/Y",$oneday)."<br>";

// to get the future date and time add
$time=mktime(date("h")+1,date("i")+5,date("s")+1);
echo "Date and time after 2 hour =>".$d=date("h:i:s",$time)."<br>";

//it easier way from last 2 function using string
echo date("d-m-Y",strtotime("+ 5 days"))."<br>";
echo date('h:i:s A',strtotime("+ 5 date"))."<br>";

?>