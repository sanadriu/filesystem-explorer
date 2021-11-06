<?php

function renderFolderContent()
{
	require_once("./utils/getUserPath.php");
	require_once("./utils/getFolderContents.php");

	$userpath = getUserPath();
	$contents = getFolderContents($userpath);
?>
	<div class="folder-content text-light">
		<?php if ($contents) : ?>
			<table id="contents" class="table text-light w-100">
				<thead>
					<tr>
						<th>Type</th>
						<th>Name</th>
						<th>Size</th>
						<th>Last access date</th>
						<th>Last modification date</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($contents["files"] as $file) : ?>
						<tr>
							<td><img src="./assets/images/extensions/<?= $file["type"] ?>-svgrepo-com.svg" width="32" alt="<?= $file["type"] ?>" /></td>
							<td><?= $file["name"] ?></td>
							<td><?= $file["size"] ?></td>
							<td><?= $file["modtime"] ?></td>
							<td><?= $file["acctime"] ?></td>
							<td>--</td>
						</tr>
					<?php endforeach ?>
					<?php foreach ($contents["folders"] as $folder) : ?>
						<tr>
							<td><img src="./assets/images/extensions/folder-svgrepo-com.svg" width="32" alt="folder" /></td>
							<td><?= $folder["name"] ?></td>
							<td><?= $folder["size"] ?></td>
							<td><?= $folder["modtime"] ?></td>
							<td><?= $folder["acctime"] ?></td>
							<td>--</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		<?php else : ?>
			<div class="d-flex justify-content-between align-items-center p-3 bg-white border-bottom">
				<span>Oops! Something went wrong :(</span>
			</div>
		<?php endif ?>
	</div>
	<script>
		$(document).ready(function() {
			$('#contents').DataTable();
		});
	</script>
<?php
}
