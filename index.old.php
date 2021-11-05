<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>$title</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
	<link href="./assets/styles/css/main.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body class="body min-vh-100">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<h1 class="navbar-brand fs-5 fw-light">The Haroonian Panel</h1>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Demo
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="./logout.action.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="row m-0">
		<div class="col-12 col-md-4 col-lg-3 col-xl-2 p-0 overflow-hidden">
			<aside class="aside-nav accordion accordion-flush" id="aside-nav">
				<div class="accordion-item">
					<h2 class="accordion-header" id="flush-heading-1">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
							<div class="d-flex align-items-center gap-2">
								<span class="material-icons"> admin_panel_settings </span>
								<span class="fw-light">Admin Settings</span>
							</div>
						</button>
					</h2>
					<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-heading-1">
						<div class="accordion-body p-0">
							<div class="list-group-flush">
								<a href="#" class="list-group-item list-group-item-action fw-light disabled">Security</a>
								<a href="#" class="list-group-item list-group-item-action fw-light disabled">Payments</a>
							</div>
						</div>
					</div>
				</div>
				<div class="accordion-item">
					<h2 class="accordion-header" id="flush-heading-2">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-2" aria-expanded="false" aria-controls="flush-collapse-2">
							<div class="d-flex align-items-center gap-2">
								<span class="material-icons"> manage_accounts </span>
								<span class="fw-light">Account management</span>
							</div>
						</button>
					</h2>
					<div id="flush-collapse-2" class="accordion-collapse collapse" aria-labelledby="flush-heading-2">
						<div class="accordion-body p-0">
							<div class="list-group-flush">
								<a href="#" class="list-group-item list-group-item-action fw-light disabled">Add account</a>
								<a href="#" class="list-group-item list-group-item-action fw-light disabled">Remove account</a>
								<a href="#" class="list-group-item list-group-item-action fw-light disabled">Edit account settings</a>
							</div>
						</div>
					</div>
				</div>
				<div class="accordion-item">
					<h2 class="accordion-header" id="flush-heading-3">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-3" aria-expanded="false" aria-controls="flush-collapse-3">
							<div class="d-flex align-items-center gap-2">
								<span class="material-icons"> analytics </span>
								<span class="fw-light">Analytics</span>
							</div>
						</button>
					</h2>
					<div id="flush-collapse-3" class="accordion-collapse collapse" aria-labelledby="flush-heading-3">
						<div class="accordion-body p-0">
							<div class="list-group-flush">
								<a href="#" class="list-group-item list-group-item-action fw-light disabled">Add chart</a>
								<a href="#" class="list-group-item list-group-item-action fw-light disabled">Remove chart</a>
								<a href="#" class="list-group-item list-group-item-action fw-light disabled">Edit chart settings</a>
							</div>
						</div>
					</div>
				</div>
			</aside>
		</div>
		<div class="col-12 col-md-8 col-lg-9 col-xl-10 p-3 d-flex justify-content-center align-items-center">
			<main class="panel p-3">
				<div class="row"></div>
			</main>
		</div>
	</div>
</body>

</html>