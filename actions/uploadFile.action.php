<?php

session_start();

require_once("../config.php");
require_once("../modules/validation.php");
require_once("../modules/session.php");
require_once("../utils/join_path.php");
require_once("../utils/groupUploadedFilesContent.php");

$errorList = [];
$successList = [];

if ($errorDirectoryPath = validatePath()) array_push($errorList,  $errorDirectoryPath);

if (!$errorDirectoryPath) {
	try {
		$destpath = join_path(["../drive", $_POST["destpath"]]);

		// Checks if parent does not exist
		if (!file_exists($destpath)) {
			throw new Exception("Parent directory does not exist.");
		}

		// Checks if parent is not a directory
		if (!is_dir($destpath)) {
			throw new Exception("Parent item is not a directory.");
		}

		$files = groupUploadedFilesContent($_FILES['files']);

		$errorList = [];
		$successList = [];

		for ($i = 0; $i < count($files); $i++) {
			echo 1;

			if ($errorMessage = validateUploadedFile($files[$i])) {
				array_push($errorList, $errorMessage);
			} else {
				$tmpname 	= $files[$i]['tmp_name'];
				$filename = $files[$i]["name"];
				$fullname = join_path([$destpath, $filename]);

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
