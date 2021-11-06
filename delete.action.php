<?php

//TODO: 
// take the data from $_POST, is expected to receive $_POST["path"], which is a relative path of the file or folder to delete.
// Path is relative, so you will have to join the ROOT_DIRECTORY (from config.php) with the received by POST.
// You will require to import some files with some functionalities, suchs as config.php and files inside "utils" folder.

$errorList = [];
$successList = [];

try {
	// Do file stuff here :D
	//...

	array_push($successList, "File has been renamed");
} catch (Throwable $e) {
	array_push($successList, $e->getMessage());
}

// header function will redirect again to the filesystem panel once data has been processed.
header("Location: ../index.php");
