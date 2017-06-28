<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>

<?php
if(isset($_POST['submit'])){
	require_once('init.php');

	$userObj = new User();
	if(isset($_GET['id'])){
		$userObj->id = $_GET['id'];
	}
	$userObj->setName($_POST['name']);

	$db = new Dbpdo(); //new Db();
	$saved = $db->save($userObj);

	if($saved){
		echo 'User Saved';
	}
	else {
		echo 'There has been an error';
	}
}
?>
<body>
	<form action="" method="post">
		Name: <input type="text" name="name">
		<input type="submit" name="submit">
	</form>
		<br/>

</body>
</html>