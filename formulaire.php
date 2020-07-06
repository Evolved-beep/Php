<?php

if(isset($_POST['submit'])){ // On vérifie que le bouton envoyer fonctionne
$erreur = array(); // En cas d'erreur on demande à les afficher 
}

// On paramètre les regexs
$pattern_nom_prenom = '/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-]{3,30}$/';
$pattern_naissance = '/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]|(?:Jan|Mar|May|Jul|Aug|Oct|Dec)))\1|
(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2]|(?:Jan|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec))\2))
(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)(?:0?2|(?:Feb))\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|
(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9]|(?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep))|
(?:1[0-2]|(?:Oct|Nov|Dec)))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/';
$pattern_ville = '/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-]{2,50}$/';
$pattern_code_postal = '/^[0-9]{5}$/';

//Fonction pour tester les valeurs en toute sécurité 
function input_test($data){
    $data= trim($data);
    $data= stripslashes($data);
    $data= htmlspecialchars($data);
    return $data;
}

// On test les valeurs du formulaire
$nom = input_test($_POST['nom']);
$prenom = input_test($_POST['prenom']);
$sexe = input_test($_POST['sexe']);
$naissance = input_test($_POST['ddn']);
$cp = input_test($_POST['cp']);
$adresse = input_test($_POST['adresse']);
$ville = input_test($_POST['ville']);
$email = input_test($_POST['email']);
$sujet = input_test($_POST['sujet']);
$question = input_test($_POST['question']);
$traitement= input_test($_POST['traitement']);

// On vérifie l'existance des valeurs existances
if((empty($nom)) || (empty($prenom)) || (empty($sexe)) || (empty($naissance)) || (empty($adresse)) || (empty($ville)) || (empty($email)) || (empty($sujet)) || (empty($question)) || (empty($traitement)))
{
    if(empty($nom)) {
        $erreur["nom"] = 'Veuillez entrer votre nom';
    }
    if(empty($prenom)) {
        $erreur["prenom"] = 'Veuillez entrer votre prénom';
    }
    if(empty($sexe)) {
        $erreur["sexe"] = 'Veuillez cochez votre sexe';
    }
    if(empty($naissance)){
        $erreur["cp"] = 'Veuillez entrer votre code postal';
    }
    if(empty($adresse)){
        $erreur["adresse"] = 'Veuillez entrer votre adresse';
    }
    if(empty($ville)){
        $erreur["ville"] = 'Veuillez entrer votre ville';
    }
    if(empty($email)){
        $erreur["email"] = 'Veuillez entrer votre email';
    }
    if(empty($sujet)){
        $erreur["sujet"] = 'Veuillez choisir le sujet de votre demande';
    }
    if(empty($question)){
        $erreur["question"] = 'Veuillez entrer votre question';
    }
    if(empty($traitement)){
        $erreur["traitement"] = 'Veuillez accepter le traitement de vos informations';
    }


// Affichage de vos erreurs 
echo "Veuillez compléter tous les champs du formulaires !";
foreach( $erreurs as $erreur )
{
    echo $erreur.'<br>';
}
}
else {
// On vérifie le regex 
if((!preg_match($pattern_nom_prenom, $nom)) || (!preg_match($pattern_nom_prenom, $prenom)) || (!preg_match($pattern_naissance, $naissance)) || (!preg_match($pattern_ville,$ville)) || (!preg_match($pattern_code_postal,$cp)) ||(!filter_var($email)))
{
    if(!preg_match($pattern_nom_prenom,$nom)){
        $erreurs["nom"] = 'Veuillez entrer un nom valide';
    }
    
    if(!preg_match($pattern_nom_prenom,$prenom)){
        $erreurs["prenom"] = 'Veuillez entrer un prénom valide';
    }
    
    if(!preg_match($pattern_naissance, $naissance)){
        $erreurs["ddn"] = 'Veuillez entrer votre date de naissance';
    }
    
    if(!preg_match($pattern_ville,$ville)){
        $erreurs["ville"] = 'Veuillez entrer votre ville';
    }
    
    if(!preg_match($pattern_code_postal, $cp)){
        $erreurs["cp"] = 'Veuillez entrer votre code postal';
    }
    
    if(!filter_var($email)){
        $erreurs["email"] = 'Veuillez entrer votre adresse mail';
    }
}
// Affichage des erreurs 
if(!empty($erreurs)){

foreach($erreurs as $erreur)
{
    echo $erreur.'<br>';
}
}
// Si les valeurs sont bonnes + affichage des valeurs dans un tableau 
else {
    $affichage = array(
        "nom" => $nom,
        "prenom" => $prenom,
        "sexe" => $sexe,
        "ddn" => $naissance,
        "cp" => $cp,
        "adresse" => $adresse,
        "ville" => $ville,
        "email" => $email,
        "sujet" => $sujet,
        "question" => $question,
        "traitement" => $traitement,
    );
    print_r($affichage);
}
}

?>
<!doctype html>

<head>

<meta charset="utf-8">

<title>formulaire</title>

    

</head>

<body>

<form action="http://bienvu.net/script.php" method="POST">

    



   <fieldset>

       <legend>Vos coordonées</legend>

        <label for="nom">Votre nom*: </label><input type="text" name="nom" id="nom" required><br>

        <label for="prenom">Votre prenom*: </label><input type="text" name="prenom" id="prenom" required><br>
    
    <label for="sexe">Sexe: </label>

            <input type="radio" name="sexe" value="Féminin" checked><label>Féminin</label>

            <input type="radio" name="sexe" value="Masculin"><label>Masculin</label><br>             

        <label for="date">Date de naissance*: </label><input type="date" name="ddn" id="date" required><br>

        <label for="codepostal">Code postal:</label><input type="text" name ="cp" id="cp"><br>

        <label for="adresse">Adresse: </label><input type="text" name ="adresse" id="adresse"><br>

        <label for="ville">Ville:</label><input type="text" name ="ville" id="ville"><br>

        <label for="email">Email*: </label><input type="email" name ="email" id="mail" required><br>

   </fieldset> 



    <fieldset> 

        <legend>Votre demande </legend>

        <label for="sujet">Sujet*:</label>

            <select name="sujet">

                <option>Commande</option>

                <option>Question sur un produit</option>

                <option>Réclamation</option>

                <option>Autres</option>

            </select><br>

         <label>Votre question*:</label><br>

         <textarea name="question" rows="3" cols="30" required></textarea>

    </fieldset> 

<input type="checkbox" name="traitement" required><label>J'accepte le traitement informatique de ce formulaire </label> <br>



<input type="submit" value="Envoyer">

<input type="reset" value="annuler">
</form>
</body>