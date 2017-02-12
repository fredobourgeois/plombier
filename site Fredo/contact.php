<?php

$erreur_nom ='';
$erreur_prenom = '';
$erreur_email = '';
$erreur_texte = '';

$nom = '';
$prenom = '';
$email = '';
$texte = '';
$telephone = '';

$message = '';

$erreur = false;
$afficher = true;

if (isset ($_POST["posted"])) {

	// deja passe dans le formulaire, controle des differents champs

	if (isset($_POST["prenom"]) && $_POST["prenom"] != "") {
		$prenom = $_POST["prenom"];
	}
	else {
		$erreur_prenom = '<div class="erreur">merci de saisir un pr&eacute;nom</div>';
		$erreur = true;
	}

	if (isset($_POST["nom"]) && $_POST["nom"] != "") {
		$nom = $_POST["nom"];
	}
	else {
		$erreur_nom = '<div class="erreur">merci de saisir un nom</div>';
		$erreur = true;
	}

	if (isset($_POST["email"]) && $_POST["email"] != "") {
		$email = $_POST["email"];
	}
	else {
		$erreur_email = '<div class="erreur">merci de saisir une adresse email</div>';
		$erreur = true;
	}
	
	if (isset($_POST["telephone"]) && $_POST["telephone"] != "") {
		$telephone = $_POST["telephone"];
	}
	else {
		$erreur_telephone = '<div class="erreur">merci de saisir une adresse email</div>';
		$erreur = true;
	}
	
	if (isset($_POST["texte"]) && $_POST["texte"] != "") {
		$texte = $_POST["texte"];
	}
	else {
		$erreur_texte = '<div class="erreur">merci de saisir un texte</div>';
		$erreur = true;
	}
	
	if (!$erreur) {
		$destinataire = "frederic.bourgeois@efb.services , robert.bourgeois@isnel.net";
		$subject = "contact depuis le site web";
		$body = "message envoye par (nom, prenom) : " . $nom . " " . $prenom . "\n";
		$body .= "adresse email : " . $email . "\n";
		$body .= "numero telephone : " . $telephone . "\n";
		$body .= "contenu du message : " . $texte;
		if (mail($destinataire,$subject,$body)) { 
			$message = "Votre mail a bien &eacute;t&eacute; envoy&eacute;."; 
			$afficher = false;
		} else { 
			$message = "Une erreur s'est produite"; 
			$erreur = true;
	} 
		
	}

}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>TELEOBJET - Formation et conseil en informatique</title>
<meta name="Author" content="TELEOBJET" />
<meta name="Keywords"
	content="plomberie" />
<meta name="Description"
	content="plomberie" />
<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type" />
<meta name="Revisit-after" content="1" />
<meta name="Robots" content="all" />
<link rel="stylesheet" href="css/main.css" type="text/css" />

<script type="text/javascript">
function validation()
{
	
	// teste nom
	var nom = document.forms.formulaire.nom.value;
	if (nom == '')
	{
		alert('Entrez un nom');
		document.forms.formulaire.nom.focus();
		return(false);
	}	

	// teste prenom
	var prenom = document.forms.formulaire.prenom.value;
	if (prenom == '')
	{
		alert('Entrez un prenom');
		document.forms.formulaire.prenom.focus();
		return(false);
	}	
	
	// teste l'email
	var adresse = document.forms.formulaire.email.value;
	var place = adresse.indexOf("@",1);
	var point = adresse.indexOf(".",place+1);
	if ((place > -1)&&(adresse.length >2)&&(point > 1))
		{
		}
	else
		{
		alert('Entrez une adresse e-mail valide');
		document.forms.formulaire.email.focus();
		return(false);
		}
	
	// teste numero telephone
	var tel = document.forms.formulaire.telephone.value;
	if (tel == '')
	{
		alert('Entrez un numero de telephone');
		document.forms.formulaire.telephone.focus();
		return(false);
	}	

	// teste message
	var tel = document.forms.formulaire.texte.value;
	if (tel == '')
	{
		alert('Entrez un message');
		document.forms.formulaire.texte.focus();
		return(false);
	}	
	
	return(true);

}
</script>
</head>

<body>
	<div id="container">
		<img alt="Frédéric BOURGEOIS" src="images/fredo.jpg" class="sigle"/>
		<div id="north">
			<p class="legend" >Intervention rapide</p>
			<a class="accueil" href="index.html">Accueil</a>
			<a class="contact" href="contact.php">Contact</a>
		</div>
<div id='center7'>
<p>Adresse de l'Entreprise BOURGEOIS Multiservices :<br/><br/>
<b>74 bis avenue du Docteur Schweitzer<br/>
66000 PERPIGNAN</b><br/><br/>
Vous pouvez nous contacter par t&eacute;l&eacute;phone au <b>06 83 67 26 04</b><br/>
ou nous envoyer un message</p>
<p class="text">
<?php echo $message; ?>
</p>
<?php 
if ($afficher) {
?>
<form id="formulaire" action="contact.php"
	onsubmit="return validation();" method="post">
<fieldset>
<input type="hidden" name="posted" value="1" />
<label class='formLabel'>Nom *</label>
<input class='formText' type="text" name="nom" size="80" value="<?php echo $nom; ?>" />
<label class='formLabel'>Pr&eacute;nom *</label>
<input class='formText' type="text" name="prenom" size="80" value="<?php echo $prenom; ?>" />
<label class='formLabel'>Email *</label>
<input class='formText' type="text" name="email" size="80" value="<?php echo $email;?>" />
<label class='formLabel'>T&eacute;l&eacute;phone *</label>
<input class='formText' type="text" name="telephone" size="80" value="<?php echo $telephone;?>" />
<label class='formLabel'>Texte de votre message *</label>
<textarea class="formText3" name="texte" rows="5" cols="80"><?php echo $texte;?></textarea>
<br/>
<input type="reset" name="reset" />&nbsp;<input type="submit" name="submit" value="Envoyer" />
</fieldset>
</form>
<?php } ?>
</div>
</div>
<!--#include file="js/google-analytics.js" -->
</body>
</html>
