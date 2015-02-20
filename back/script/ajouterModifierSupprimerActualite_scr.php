<?php 
include '../../include/script/secur_back.php';

if (isset($_POST['action']))
{
	switch ($_POST['action']) {
		case 'supprimer':
			{
				$actuID = $_POST['actuID'];
				$sql = 'DELETE FROM ACTUALITE WHERE id = ?';
				$req = $bdd->prepare($sql);
				$req->execute(array($actuID));
				if (!$req)
				{
					echo "\nEreur :\n";
					print_r($req->errorInfo());
				}
			}
			break;

		case 'modifier':
			{
				$actuID = $_POST['actuID'];
				$titre = $_POST['titre'];
				$texte = $_POST['texte'];

				$sql = 'UPDATE ACTUALITE SET titre = ?, texte = ? WHERE id = ?';
				$req = $bdd->prepare($sql);
				$req->execute(array($titre, $texte, $actuID));
				if (!$req)
				{
					echo "\nEreur :\n";
					print_r($req->errorInfo());
				}
			}
			break;

		case 'ajouter':
			{
				$titre = $_POST['titre'];
				$texte = $_POST['texte'];

				$sql = 'INSERT INTO ACTUALITE(titre, texte) VALUES (?,?)';
				$req = $bdd->prepare($sql);
				$req->execute(array($titre, $texte));
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
header('location:../vue/actualite_bo.php');
