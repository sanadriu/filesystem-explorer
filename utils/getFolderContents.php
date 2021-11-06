<?php

function getFolderContents($userpath)
{
	require_once("./utils/joinPath.php");
	require_once("./utils/getFormattedSize.php");

	$content = ["files" => [], "folders" => []];
	$drivepath = joinPath([ROOT_DIRECTORY, $userpath]);

	try {
		$items = scandir($drivepath, SCANDIR_SORT_ASCENDING);

		foreach ($items as $item) {
			if (!in_array($item, [".", ".."])) {
				$fullpath = joinPath([$drivepath, $item]);
				$hrefpath = joinPath([$userpath, $item]);
				$name = 		basename($fullpath);
				$size = 		getFormattedSize(filesize($fullpath));
				$modtime = 	date("Y/m/d H:i:s", filemtime($fullpath));
				$acctime = 	date("Y/m/d H:i:s", fileatime($fullpath));

				if (is_dir($fullpath)) {
					array_push($content["folders"], ["path" => $hrefpath, "name" => $name, "size" => $size, "modtime" => $modtime, "acctime" => $acctime]);
				} else {
					$type =	pathinfo($fullpath, PATHINFO_EXTENSION);
					array_push($content["files"], ["path" => $hrefpath, "name" => $name, "type" => $type, "size" => $size, "modtime" => $modtime, "acctime" => $acctime]);
				}
			}
		}

		if ($userpath !== "/") {
			$parentpath = preg_replace("/\/[^\/:*?\"<>|]*$/", "", $userpath);
			array_push($content["folders"], ["path" => $parentpath, "name" => "..", "size" => null, "modtime" => null, "acctime" => null]);
		}

		return $content;
	} catch (Throwable $e) {
		return null;
	}
}
