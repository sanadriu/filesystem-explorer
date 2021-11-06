<?php

function renderHeader()
{
?>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid d-flex justify-content-between align-items-center">
				<h1 class="navbar-brand fs-5 fw-light">FileSystem Explorer</h1>
				<form class="d-flex">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-primary" type="submit">Search</button>
				</form>
			</div>
		</nav>
	</header>
<?php
}
