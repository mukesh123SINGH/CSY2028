<?php
try {
	$db = new PDO('mysql:dbname=assignment1;host=mysql', 'v.je', 'v.je');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
}
function executeQuery($query, $data = [], $success = false, $errorMsg = false)
{
	try {
		global $db;

		$prep = $db->prepare($query);
		$prep->execute($data);
		if ($success) showSuccessAlert($success);
		return $prep->fetchAll() ?? $prep;
	} catch (\Throwable $th) {
	
		if ($errorMsg) showFailedAlert($th->getMessage());
		return [];
	}
}
function isFormSubmit(string $name = "submit"): bool
{
	return isset($_POST[$name]);
}
function showSuccessAlert($msg)
{
	echo "<div class='alert success'>
		<input type='checkbox' id='alert2' />
		<label class='close' title='close' for='alert2'>
			<i class='fa fa-regular fa-circle-xmark'></i>
		</label>
		<p class='inner'>
			{$msg}
		</p>
	</div>";
}
function showFailedAlert($msg)
{
	echo "
	<div class='alert error'>
		<input type='checkbox' id='alert2' />
		<label class='close' title='close' for='alert2'>
		<i class='fa-sharp fa-regular fa-circle-xmark'></i>
		</label>
		<p class='inner'>
			{$msg}
		</p>
	</div>";
}
