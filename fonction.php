<html> 
    <meta chartset="utf-8">
    <head>
        <title>Boucle PHP</title>
        <body>
       <?php
    function calculator($entier1, $entier2) {
      $addition = $entier1+$entier2; // Variable pour l'addition 
      $soustraction = $entier1-$entier2; // Variable pour la soustraction
      $multiplication = $entier1*$entier2; // Variable pour la multiplication 
      $division = $entier1/$entier2; // Variable pour la division 
      return array($addition,$soustraction,$multiplication,$division); // On associe ces variables sous forme de tableau 
    }

    list($addition,$soustraction,$multiplication,$division) = calculator(150, 60); // On liste les variables opérateurs, puis on appelle la fonction de calcul 
    echo $addition. '<br>'; // On affiche le resultat de la variable de l'addition 
    echo $soustraction. '<br>';
    echo $multiplication. '<br>';
    echo $division. '<br>';
?>
</body>
</html>