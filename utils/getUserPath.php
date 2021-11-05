<?php

function getUserPath()
{
	require_once("./config.php");
	require_once("./validation.php");
	require_once("./utils/joinPath.php");

	if (!isset($_GET["path"])) 		return "/";

	$userpath = htmlentities(trim($_GET["path"]));
	$fullpath = joinPath([ROOT_DIRECTORY, $userpath]);

	if (!validatePath($fullpath)) return "/";
	if (!is_dir($fullpath)) 			return "/";

	return $userpath;
}
