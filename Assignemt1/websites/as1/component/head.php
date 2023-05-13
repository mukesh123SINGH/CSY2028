<!DOCTYPE html>
<html>

<head>
	<title>ibuy Auctions</title>
	<link rel="stylesheet" href="/ibuy.css" />
</head>

<body>
	<header>
		<h1><span class="i">i</span><span class="b">b</span><span class="u">u</span><span class="y">y</span></h1>
		<form action="/search.php">
			<input type="text" name="search" value="" placeholder="Search for anything" />
			<input type="submit" value="Search" />
		</form>
	</header>
	<nav>
		<ul>
			<li><a class="categoryLink" href="/">Home</a></li>
			<?php
			$categories ??= [];
			foreach ($categories as  $item) {
				echo  "<li><a class='categoryLink' href='/categoryPages.php?pk={$item['id']}'>{$item['name']}</a></li>";
			}
			if (isAdminLogin()) {
			?>
				<li><a href="/admin/adminCategory.php">adminCategory</a></li>
				<li><a href="/admin/manageAdmin.php">admins</a></li>
			<?php
			}
			if (isUserLogin()) {
			?>
				<li><a href="/addAuction.php">Add product</a></li>
			<?php
			}
			if (isUserLogin() || isAdminLogin()) {
			?>
				<li><a href="/logOut.php">logout</a></li>
			<?php
			} else {
			?>
				<li><a href="/register.php">register User</a></li>
				<li><a href="/userLogin.php">user login</a></li>
				<li><a href="/adminLogin.php">admin login</a></li>
			<?php
			}
			?>
			<li><a class="categoryLink" href="#">More</a></li>
		</ul>
	</nav>
	<img src="/banners/1.jpg" alt="Banner" />