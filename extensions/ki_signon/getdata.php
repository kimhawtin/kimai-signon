<?php

$timeEntryID = ($_POST["timeEntryID"]);
$start = ($_POST["start"]);


if (isset($_POST["debug"])){
		$debug = ($_POST["debug"]);
} else {
	$debug = 0;
}

include("database.php");

$duration = time() - $start;
if ($debug == 0){
	$sql = "UPDATE kimai_timesheet SET end = ". time() . ", duration = " . $duration . " WHERE timeEntryID =" . $timeEntryID . ";";
}

if ($debug == 1){
	$sql = "UPDATE kimai_timesheet SET end = 0, duration = 0 WHERE timeEntryID =10;";
}
//echo($sql);

$exe = $conn->query($sql);


//close the connection to the database
mysqli_close($conn);
?>