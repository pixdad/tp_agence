<?php 

$serveur = 'www-inf.it-sudparis.eu';
$nombdd = 'Agence_12';
$nomuser = 'user_Agence_12';
$mdp = 'Mardi19Fev';

try
{
	$bdd = new PDO('mysql:host='.$serveur.';dbname='.$nombdd, $nomuser, $mdp);
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

/* ========================================================================== *\
 * CLASSE SECURITE
\* ========================================================================== */
if (!class_exists('Securite')) {
	class Securite
		{
			// Données entrantes
			public static function bdd($string)
			{
				// On regarde si le type de string est un nombre entier (int)
				if(ctype_digit($string))
				{
					$string = intval($string);
				}
				// Pour tous les autres types
				else
				{
					//$string = $bdd->quote($string);
					$string = addcslashes($string, '%_');
				}
					
				return $string;

			}
			// Données sortantes
			public static function html($string)
			{
				return htmlentities($string);
			}
		}
}
 ?>