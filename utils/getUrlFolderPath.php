<?php

function getUrlFolderPath()
{
	if (!isset($_GET["path"])) return "/";

	return htmlentities(trim($_GET["path"]));;
}
