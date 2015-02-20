<?php include '../../include/script/secur_back.php';

if (isset($_POST['login'])) {
	$req = $bdd->prepare('DELETE FROM CLIENT WHERE login = ?');
	$req->execute(array($_POST['login']));
	if (!$req){
			echo "\nEreur : \n";
			print_r($req->errorInfo());
	}
	else header('location:../vue/user_bo.php');
}
else header('location:../vue/user_bo.php');
<<<<<<< HEAD

?>
=======
?>
>>>>>>> 42a97da896597745eab97c2cee8b9cbc142f7daa
