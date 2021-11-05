<?php

session_start();

require_once("../config.php");
require_once("../modules/validation.php");
require_once("../controllers/sessionController.php");
require_once("../utils/join_path.php");

$errorList = [];
$successList = [];

if ($errorDirectoryPath = validateDirectoryPath()) array_push($errorList, $errorDirectoryPath);
if ($errorDirectoryName = validateDirectoryName()) array_push($errorList, $errorDirectoryName);

if (!$errorDirectoryPath && !$errorDirectoryName) {
	try {
		$destpath = join_path(["../drive", $_POST["destpath"]]);
		$fullpath = join_path([$destpath, $_POST["dirname"]]);

		// Checks if directory already exists
		if (file_exists($fullpath)) {
			throw new Exception("Directory already exists.");
		}

		// Checks if parent does not exist
		if (!file_exists($destpath)) {
			throw new Exception("Parent directory does not exist.");
		}

		// Checks if parent is not a directory
		if (!is_dir($destpath)) {
			throw new Exception("Parent item is not a directory.");
		}

		mkdir($fullpath);

		array_push($successList, "Directory has been created.");
	} catch (Throwable $e) {
		array_push($errorList, $e->getMessage());
	}
}

$sessionController = new SessionController();
$sessionController->setSessionValue("errorList", $errorList);
$sessionController->setSessionValue("successList", $successList);

header("Location: ../index.php");
