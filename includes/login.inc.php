<?php

	session_start();
	if(isset($_POST["b_login"])){
		include "dbh.inc.php";
		$handle = mysqli_real_escape_string($conn,$_POST["handle"]);
		$password = mysqli_real_escape_string($conn,$_POST["password"]);
		// $password = password_hash($password, PASSWORD_DEFAULT);
		if(empty($handle) || empty($password)){
			header("Location: ../login.php?login=empty");
		}
		else{
			$sql = "SELECT * FROM LOGINTRY WHERE HANDLE='$handle'";
			$result = mysqli_query($conn,$sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck<1){
				header("Location: ../login.php?login=error");
				exit();
			}
			else{
				if($row = mysqli_fetch_assoc($result)){
					$checkPassword = password_verify($password,$row["PASSWORD"]);
					if($checkPassword==false){
						header("Location: ../login.php?login=errorpass");
						exit();
					}
					elseif($checkPassword==true){
						// Login the user here
						$_SESSION["user"] = $row["HANDLE"];
						$_SESSION["name"] = $row["NAME"];
						header("Location: ../index.php?login=success");
						exit();
					}
				}
			}
		}
	}
	else{
		header("Location: ../login.php?login=error");
		exit();
	}
?>
