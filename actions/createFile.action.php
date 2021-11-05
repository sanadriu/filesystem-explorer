<?php

session_start();

require_once("../config.php");
require_once("../modules/validation.php");
require_once("../controllers/sessionController.php");
require_once("../utils/join_path.php");

$errorList = [];
$successList = [];

if ($errorDirectoryPath = validatePath()) array_push($errorList, $errorDirectoryPath);
if ($errorFileName = validateFileName()) 					 array_push($errorList, $errorFileName);

if (!$errorDirectoryPath && !$errorFileName) {
	try {
		$destpath = join_path(["../drive", $_POST["destpath"]]);
		$fullpath = join_path([$destpath, $_POST["filename"] . ".txt"]);

		// Checks if file already exists
		if (file_exists($fullpath)) {
			throw new Exception("File already exists.");
		}

		// Checks if parent does not exist
		if (!file_exists($destpath)) {
			throw new Exception("Parent directory does not exist.");
		}

		// Checks if parent is not a directory
		if (!is_dir($destpath)) {
			throw new Exception("Parent item is not a directory.");
		}

		$file = fopen($fullpath, "w");
		fclose($file);

		array_push($successList, "File has been created.");
	} catch (Throwable $e) {
		array_push($errorList, $e->getMessage());
	}
}

$sessionController = new SessionController();
$sessionController->setSessionValue("errorList", $errorList);
$sessionController->setSessionValue("successList", $successList);

header("Location: ../index.php");
