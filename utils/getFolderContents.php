<?php

function getFolderContents($userpath)
{
	require_once("./utils/joinPath.php");

	$content = ["files" => [], "folders" => []];
	$dirpath = joinPath([ROOT_DIRECTORY, $userpath]);

	try {
		$items = scandir($dirpath, SCANDIR_SORT_ASCENDING);

		foreach ($items as $item) {
			if (!in_array($item, [".", ".."])) {
				$fullpath = joinPath([$dirpath, $item]);

				$name = 		basename($fullpath);
				$size = 		filesize($fullpath);
				$modtime = 	date("Y/m/d H:i:s", filemtime($fullpath));
				$acctime = 	date("Y/m/d H:i:s", fileatime($fullpath));

				if (is_dir($fullpath)) {
					array_push($content["folders"], ["name" => $name, "size" => $size, "modtime" => $modtime, "acctime" => $acctime]);
				} else {
					$type =	pathinfo($fullpath, PATHINFO_EXTENSION);
					array_push($content["files"], ["name" => $name, "type" => $type, "size" => $size, "modtime" => $modtime, "acctime" => $acctime]);
				}
			}
		}

		return $content;
	} catch (Throwable $e) {
		return null;
	}
}
