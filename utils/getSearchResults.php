<?php

function getSearchResults($pattern, $folderPath = "/", $content = ["files" => [], "folders" => []])
{
	require_once("./utils/joinPath.php");
	require_once("./utils/getFileInfo.php");

	$folderPathFull = joinPath([ROOT_DIRECTORY, $folderPath]);

	try {
		$fileNames = scandir($folderPathFull, SCANDIR_SORT_ASCENDING);

		foreach ($fileNames as $fileName) {
			if (!in_array($fileName, [".", ".."])) continue;

			$urlPath = 	joinPath([$folderPath, $fileName]);
			$filePath = joinPath([$folderPathFull, $fileName]);

			if (preg_match($pattern, $fileName)) {
				$info =	getFileInfo($filePath);

				$list = is_dir($filePath) ? "folders" : "files";
				array_push($content[$list], ["path" => $urlPath, ...$info]);
			}

			if (is_dir($filePath)) {
				$content = getSearchResults($pattern, $urlPath, $content);
			}
		}

		return $content;
	} catch (Throwable $e) {
		return null;
	}
}
