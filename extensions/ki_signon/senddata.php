<?php

$name = ($_POST["name"]);

//$name = "eve";

include("database.php");

$customerID = 2;
$projectID = 2;
$activityID = 2;
$query = "SELECT name FROM kimai_users WHERE name = '" . $name . "';";

echo ($query);

$exe = $conn->query($query);
	if ($exe->num_rows == 0){
		$nameQuery = "INSERT INTO kimai_users (name, alias, trash, active, mail, password, passwordResetHash, ban, banTime, secure, lastProject, lastActivity, lastRecord, timeframeBegin, timeframeEnd, apikey, globalRoleID) "
		. "VALUES (\"". $name . "\", NULL, 0, 1, \"\", NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 2);";
		echo ($nameQuery);
		$exe = $conn->query($nameQuery);
}
$query = "SELECT userID FROM kimai_users WHERE name = '" . $name . "';";
echo ("<br>");
echo ($query);
$exeTwo = $conn->query($query);
	if ($exeTwo->num_rows > 0){
		while ($row = $exeTwo->fetch_assoc()){
			$timeQuery = "INSERT INTO kimai_timesheet (start, end, duration, userID, projectID, activityID, description, comment, commentType, cleared, location, trackingNumber, rate, fixedRate, budget, approved, statusID, billable) "
			. "VALUES (" . time() . ", 0, 0, \"" . $row["userID"] . "\", 2, 2, NULL, NULL, 0, 0, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, NULL);";
			$exeThree = $conn->query($timeQuery);
		}
	}

//close the connection to the database
mysqli_close($conn);
?>