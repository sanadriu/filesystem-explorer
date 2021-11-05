<?php

function renderFolderContent()
{
	// Get current directory path from session
	// Get files and subfolders based on current path
	// For each file or folder, render a card

	//demo
	require_once("./config.php");
	require_once("./utils/join_path.php");

	try {
		$items = scandir(ROOT_DIRECTORY, SCANDIR_SORT_ASCENDING);
		$files = [];
		$folders = [];

		foreach ($items as $item) {
			if (!in_array($item, [".", ".."])) {
				$fullpath = join_path([ROOT_DIRECTORY, $item]);

				$name = 		basename($fullpath);
				$type =			pathinfo($fullpath, PATHINFO_EXTENSION);
				$size = 		filesize($fullpath);
				$modtime = 	date("Y/m/d H:i:s", filemtime($fullpath));
				$acctime = 	date("Y/m/d H:i:s", fileatime($fullpath));

				if (is_dir($fullpath)) {
					array_push($folders, ["name" => $name, "size" => $size, "modtime" => $modtime, "acctime" => $acctime]);
				} else {
					array_push($files, ["name" => $name, "type" => $type, "size" => $size, "modtime" => $modtime, "acctime" => $acctime]);
				}
			}
		}

?>
		<div class="folder-content">
			<div style="flex-basis: 100%;" class="d-flex justify-content-between p-3 bg-dark text-light">
				<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;">Type</div>
				<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;">Name</div>
				<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;">Size</div>
				<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;">Last access date</div>
				<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;">Last modification date</div>
			</div>
			<?php foreach ($files as $file) : ?>
				<div style="flex-basis: 100%;" class="d-flex justify-content-between align-items-center p-3 bg-white border-bottom">
					<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;"><img src="./assets/images/extensions/<?= $file["type"] ?>-svgrepo-com.svg" width="32" /></div>
					<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;"><?= $file["name"] ?></div>
					<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;"><?= $file["size"] ?></div>
					<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;"><?= $file["modtime"] ?></div>
					<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;"><?= $file["acctime"] ?></div>
				</div>
			<?php endforeach ?>
			<?php foreach ($folders as $folder) : ?>
				<div style="flex-basis: 100%;" class="d-flex justify-content-between align-items-center p-3 bg-white border-bottom">
					<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;"><img src="./assets/images/extensions/folder-svgrepo-com.svg" width="32" /></div>
					<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;"><?= $folder["name"] ?></div>
					<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;"><?= $folder["size"] ?></div>
					<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;"><?= $folder["modtime"] ?></div>
					<div style="flex-grow: 1; flex-shrink: 1; flex-basis: 0;"><?= $folder["acctime"] ?></div>
				</div>
			<?php endforeach ?>
		</div>
<?php

	} catch (Throwable $e) {
		var_dump($e->getMessage());
	}
}
