<main>
	<h1><?php
		$edit ??= false;
		echo $edit ? "edit" : "add"
		?>category</h1>
	<form action="#" method="post">
		<label>name</label> <input type="text" value="<?php echo $currentCategory['name'] ?? ""
														?>" name="data[name]" required />
		<input type="submit" value="Submit" name="submit" />
	</form>
</main>