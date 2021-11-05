<?php

session_start();

require_once("./layouts/header.php");
require_once("./layouts/aside.php");
require_once("./layouts/folderContent.php");
require_once("./layouts/modalAddFile.php");
require_once("./layouts/modalAddFolder.php");
require_once("./layouts/modalUploadFiles.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>FileSystem Explorer</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
	<link href="./assets/styles/css/main.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body class="body min-vh-100" style="background-image: url('./assets/images/Polygon\ Luminary.svg');">
	<?php renderModalAddFile(); ?>
	<?php renderModalAddFolder(); ?>
	<?php renderModalUploadFiles(); ?>
	<?php renderHeader(); ?>
	<div class="row m-0">
		<div class=" col-12 col-md-4 col-lg-3 col-xl-2 p-0 overflow-hidden">
			<?php renderAside(); ?>
		</div>
		<div class="col-12 col-md-8 col-lg-9 col-xl-10 p-3 d-flex flex-column justify-content-center align-items-center">
			<?php renderFolderContent(); ?>
		</div>
	</div>
</body>

</html>