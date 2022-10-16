<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Kalender</title>
</head>
<body>
    <header>Kalender</header>
	<?php
	include("namnsdag.php");
$date = $_GET["date"] ?? date ("Y-m-d");
$now= date($date);
$timestamp = strtotime($now);

$prevMonth = date("Y-m-d", strtotime("-1 month", $timestamp));
$nextMonth = date("Y-m-d", strtotime("+1 month", $timestamp));

echo date("Y-m-d", $timestamp);

 
 $numDay = date('d', $timestamp);
 $numMonth = date('m', $timestamp);
 $strMonth = date('F', $timestamp);
 $numYear = date('Y', $timestamp);
 $firstDay = mktime(0,0,0,$numMonth,1,$numYear);
 $daysInMonth = cal_days_in_month(0, $numMonth, $numYear);
 $dayOfWeek = date('w', $firstDay);
 $month=date("n",$timestamp);


?>
<br>
<a class="reset" href="kalender.php">Reset</a>
<br>
<table>
 <caption><? echo("<h2>".$strMonth."</h2>"); ?></caption>
 <thead>
 <tr>
 <th abbr="Sunday" scope="col" title="Sunday">S</th>
 <th abbr="Monday" scope="col" title="Monday">M</th>
 <th abbr="Tuesday" scope="col" title="Tuesday">T</th>
 <th abbr="Wednesday" scope="col" title="Wednesday">W</th>
 <th abbr="Thursday" scope="col" title="Thursday">T</th>
 <th abbr="Friday" scope="col" title="Friday">F</th>
 <th abbr="Saturday" scope="col" title="Saturday">S</th>
 
 </tr>
 </thead>
 <tbody>
 <tr>



<h4> 
 <a class="link1" href="<?echo '?date='.$prevMonth?>">Prev Month</a>
 <a class="link2"href="<?echo '?date='.$nextMonth?>">Next Month</a>
</h4>
 <?
 
 if(0 != $dayOfWeek) { echo('<td colspan="'.$dayOfWeek.'"> </td>'); }
 for($i=1;$i<=$daysInMonth;$i++) {
	$dag=date("$i-$month-$numYear");
	$totaldays=date("z", strtotime($dag))+1;
	$namnsdag = implode(" " , $namn[$totaldays]);
 
 if($i == $numDay) { echo('<td id="today">'); } else { echo("<td>"); }
 echo($i." <br>".$namnsdag);
 echo("</td>");
 if(date('w', mktime(0,0,0,$numMonth, $i, $numYear)) == 6) {
 echo("</tr><tr>");
 }


 }



	
 ?>
</body>
</html>