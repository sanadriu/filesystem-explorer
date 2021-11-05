<?php

session_start();

require_once("../config.php");
require_once("../modules/validation.php");
require_once("../modules/session.php");
require_once("../utils/joinPath.php");
require_once("../utils/getUploadedFiles.php");

define("ROOT_DIRECTORY", "../drive");

$errorList = [];
$successList = [];

if (!isset($_POST["destpath"])) array_push($errorList, "Destination path is not specified.");
if (!isset($_FILES["files"]))		array_push($errorList, "Files to upload have not been specified.");

if (!count($errorList)) {
	$destpath = htmlentities(trim($_POST["destpath"]));
	if ($errorDirectoryPath = validatePath($destpath)) array_push($errorList,  $errorDirectoryPath);
}

if (!count($errorList)) {
	try {
		$destpath = joinPath([ROOT_DIRECTORY, $_POST["destpath"]]);

		// Checks if parent does not exist
		if (!file_exists($destpath)) {
			throw new Exception("Parent directory does not exist.");
		}

		// Checks if parent is not a directory
		if (!is_dir($destpath)) {
			throw new Exception("Parent item is not a directory.");
		}

		$files = getUploadedFiles($_FILES['files']);

		$errorList = [];
		$successList = [];

		for ($i = 0; $i < count($files); $i++) {
			if ($errorMessage = validateUploadedFile($files[$i])) {
				array_push($errorList, $errorMessage);
			} else {
				$tmpname 	= $files[$i]['tmp_name'];
				$filename = $files[$i]["name"];
				$fullname = joinPath([$destpath, $filename]);

				move_uploaded_file($tmpname, $fullname);

				$successMessage = "File " . $files[$i]["name"] . " has been uploaded succesfully.";
				array_push($successList, $successMessage);
			}
		}
	} catch (Throwable $e) {
		array_push($errorList, $e->getMessage());
	}
}

setSessionValue("errorList", $errorList);
setSessionValue("successList", $successList);

header("Location: ../index.php");
