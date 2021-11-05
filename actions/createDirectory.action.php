<?php

session_start();

require_once("../config.php");
require_once("../modules/validation.php");
require_once("../modules/session.php");
require_once("../utils/joinPath.php");

define("ROOT_DIRECTORY", "../drive");

$errorList = [];
$successList = [];

if (!isset($_POST["dirname"]))  array_push($errorList, "Folder name not specified.");
if (!isset($_POST["destpath"])) array_push($errorList, "Destination path not specified.");

if (!count($ErrorList)) {
	$dirname =  htmlentities(trim($_POST["dirname"]));
	$destpath = htmlentities(trim($_POST["destpath"]));

	if ($errorDestPath = validatePath($destpath)) array_push($errorList, $errorDestPath);
	if ($errorDirName =  validateName($dirname))  array_push($errorList, $errorDirName);
}

if (!count($ErrorList)) {
	try {
		$destpath = joinPath([ROOT_DIRECTORY, $destpath]);
		$fullpath = joinPath([$destpath, $_POST["dirname"]]);

		// Checks if folder already exists
		if (file_exists($fullpath)) {
			throw new Exception("Directory already exists.");
		}

		// Checks if destination does not exist
		if (!file_exists($destpath)) {
			throw new Exception("Parent directory does not exist.");
		}

		// Checks if destination is not a directory
		if (!is_dir($destpath)) {
			throw new Exception("Parent item is not a directory.");
		}

		mkdir($fullpath);

		array_push($successList, "Directory has been created.");
	} catch (Throwable $e) {
		array_push($errorList, $e->getMessage());
	}
}

setSessionValue("errorList", $errorList);
setSessionValue("successList", $successList);

header("Location: ../index.php");
