<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO members (gpname,pjname,avg,percent) VALUES (:gpname,:pjname,:avg,:percent)");
			//if-else statement in executing our prepared statement
            $average=avg($_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"],$_POST["p10"]);
            $sum = sum($_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"],$_POST["p10"]);
            $percent = percent($sum,100);
			$_SESSION['message'] = ( $stmt->execute(array(':gpname' => $_POST['gpname'], ':pjname' => $_POST['pjname'], ':avg' => $average, 'percent' => $percent)) ) ? 'گروه با موفقیت اضافه شد.' : 'Something went wrong. Cannot add member';
	    
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: index.php');

function avg($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10){
    // Calculate the sum of the array elements
    $sum = sum($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10);
    // Calculate the count of the array elements
    $count = 10;
    // Calculate the average by dividing the sum by the count
    $average = $sum / $count;
    // Return the average
    return $average;
}


function percent($point, $total) {
    // Check if the total is zero to avoid division by zero error
    if ($total == 0) {
        return 0;
    }

    // Calculate the percentage by dividing the number by the total and multiplying by 100
    return ($point / $total) * 100;
}

function sum($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10){
    $sum = $p1 + $p2 + $p3 + $p4 + $p5 + $p6 + $p7 + $p8 + $p9 + $p10;
    return $sum;
}

?>

