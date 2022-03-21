<h1>CONDITIONELLES (If... else...): Exercice</h1>

<?php

  // CONDITIONAL (EXERCICE)

  // Déclarer variables age
  // Créer une fonction calculateAgeDifference ()
  // Récupérer variables age en paramètre
  // Créer une nouvelle variable résultat
  // Faire le calcul de la différence (attention au résulat négatif: if)
  // Afficher le résulat

  $personName1 = "Frodon";
  $personAge1 = 33;

  $personName2 = "Sam";
  $personAge2 = 21;

  function calculateAgeDifference ($personAge1, $personAge2) {
    $result = $personAge1 - $personAge2;
    if($result < 0) {
      $result = -$result;
    }
    return $result;
  }

  // echo calculateAgeDifference ($personAge1, $personAge2);
  $ageDifference = calculateAgeDifference ($personAge1, $personAge2);
  echo "La différence d'âge est de " . $ageDifference;

?>