<?php 
include '../../include/script/secur_back.php';

if (isset($_POST['action']))
{
	switch ($_POST['action']) {
		case 'supprimer':
			{
				$pID = $_POST['pID'];
				$sql = 'DELETE FROM CIRCUITPROGRAMME WHERE circuitID = ?';
				$req = $bdd->prepare($sql);
				$req->execute(array($pID));
				if (!$req)
				{
					echo "\nEreur :\n";
					print_r($req->errorInfo());
				}
			}
			break;

		case 'ajouter':
			{
				$dateDepart = $_POST['dateDepart'];
				$nombre = $_POST['nombre'];
				$prix = $_POST['prix'];
				$cID = $_POST['cID'];

				$sql = 'INSERT INTO CIRCUITPROGRAMME(circuitID, dateDepart, nombrePersonnes, prix) VALUES (?,?,?,?)';
				$req = $bdd->prepare($sql);
				$req->execute(array($cID, $dateDepart, $nombre, $prix));
				if (!$req)
				{
					echo "\nEreur :\n";
					print_r($req->errorInfo());
				}
			}
			break;

		default:
			break;
	}
}

# Redirection ...
header('location:../vue/programmation_bo.php');
