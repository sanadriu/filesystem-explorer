<?php

function getUserPath()
{
	if (!isset($_GET["path"])) return "/";

	return htmlentities(trim($_GET["path"]));;
}
