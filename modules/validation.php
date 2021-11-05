<?php

function validatePath($path)
{
	if (!preg_match("/^\/?([^\/:*?\"<>|]+\/?)*$/", $path)) 	return "Directory path is invalid.";
	if (preg_match("/\/\.\./", $path)) 											return "Directory path does not allow reverse traversal.";

	return null;
}

function validateName($name)
{
	if (!preg_match("/^[^\/\\:*?\"<>|]+$/", $name)) return "Name for the new file or folder is invalid.";

	return null;
}

function validateUploadedFile($file)
{
	$name = 			$file['name'];
	$type = 			$file['type'];
	$errorCode = 	$file['error'];

	$FILE_TYPES = [
		'application/msword',
		'application/vnd.ms-powerpoint',
		'application/vnd.ms-excel',
		'image/svg+xml',
		'image/jpg',
		'image/jpeg',
		'image/png',
		'text/csv',
		'text/plain',
		'application/vnd.oasis.opendocument.text',
		'application/pdf',
		'application/zip',
		'application/vnd.rar',
		'application/x-msdownload',
		'audio/mpeg',
		'video/mp4',
	];

	$PHP_FILE_UPLOAD_ERRORS = [
		0 => "File $name uploaded successfully.",
		1 => "File $name exceeds the upload_max_filesize directive in php.ini.",
		2 => "File $name exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
		3 => "File $name was only partially uploaded.",
		4 => "No file was uploaded.",
		6 => "Missing a temporary folder.",
		7 => "Failed to write file to disk.",
		8 => "A PHP extension stopped the file upload.",
	];

	if ($errorCode) {
		$errorMessage = $PHP_FILE_UPLOAD_ERRORS[$errorCode];
		return $errorMessage;
	}

	if (!in_array($type, $FILE_TYPES)) {
		$errorMessage = "File $name has invalid type ($type).";
		return $errorMessage;
	}

	return null;
}
