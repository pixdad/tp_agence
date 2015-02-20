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

?>