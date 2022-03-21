<?php
  function writePokemonsList($pokemonsList){
    $ret = "";
    foreach ($pokemonsList as $pokemon) {
      // echo var_dump($pokemon);
        $ret.="
          <tr>
          
          </tr>";
      }
      return $ret;
  }
  
  // Requête get all Pokémons
  function getAllPokemons(PDO $dsn) {
    $pokemonsList = [];
    $sql = "SELECT * FROM pk_list";
    $stmt = $dsn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $pokemonsList=$stmt->fetchAll();

    return $pokemonsList;
  }

  // Requête get Type
  function getTypes(PDO $dsn) {
    $typesList = [];
    $sql = "SELECT * FROM pk_types";
    $stmt = $dsn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $typesList=$stmt->fetchAll();

    return $typesList;
  }
   // Helper: Lier les types de Pokémon à la table des types et retourner la chaîne avec le bon type
   function displayType($typesList, $id) {
    foreach($typesList as $key => $value) {
      if ($id-1 === $key){
        // Transforme la valeur du tableau en string
        $value = json_encode($value["Type"]);
        // Enlève les guillemets de la string (methode string)
        return trim($value, '"');
      }
    }
  }
  // Supprime pokemon
  function deletePokemon(PDO $dsn, $pkid) {
    $sql = "DELETE FROM pk_list WHERE Id_list = :pkid;";
    $stmt = $dsn->prepare($sql);
    $stmt->bindValue('pkid', $pkid, PDO::PARAM_INT);
    $stmt->execute();
    header('Location: '.$_SERVER['PHP_SELF']);
  }
  // Ajout pokemon
  function ajoutPokemon(PDO $dsn, $nom, $pv, $type1, $type2, $editable, $img){
    // var_dump($type2);
    // echo "<br />";
    // if($type2===19){
    // $sql = "INSERT INTO pk_list VALUE (NULL, :nom , :pv , 'default.png', :type1 , :type2 , 1)";
    // $stmt = $dsn->prepare($sql);
    // $stmt->bindValue('nom', $nom, PDO::PARAM_STR);
    // $stmt->bindValue('pv', $pv, PDO::PARAM_INT);
    // $stmt->bindValue('type1', $type1, PDO::PARAM_INT);
    // $stmt->bindValue('type2', $type2, PDO::PARAM_INT);
    // $stmt->execute();
    // header('Location: '.$_SERVER['PHP_SELF']);
    // }
    // else{
      if($editable==='1'){
    $sql = "INSERT INTO pk_list VALUE (NULL, :nom , :pv , :monFichier, :type1 , :type2 , 1)";
    
      }
      else{
    $sql = "INSERT INTO pk_list VALUE (NULL, :nom , :pv , :monFichier, :type1 , :type2 , 0)";
      }
    $stmt = $dsn->prepare($sql);
    $stmt->bindValue('nom', $nom, PDO::PARAM_STR);
    $stmt->bindValue('pv', $pv, PDO::PARAM_INT);
    $stmt->bindValue('type1', $type1, PDO::PARAM_INT);
    $stmt->bindValue('type2', $type2, PDO::PARAM_INT);
    $stmt->bindValue('monFichier', $img, PDO::PARAM_STR);
    $stmt->execute();
    header('Location: '.$_SERVER['PHP_SELF']);
    // }
  //   function ajoutPokemon(PDO $dsn, $nom, $pv, $type1 ){
  //     // var_dump($type2);
  //     // echo "<br />";
  //     // if($type2===19){
  //     $sql = "INSERT INTO pk_list VALUE (NULL, :nom , :pv , 'default.png', :type1 , NULL , 1)";
  //     $stmt = $dsn->prepare($sql);
  //     $stmt->bindValue('nom', $nom, PDO::PARAM_STR);
  //     $stmt->bindValue('pv', $pv, PDO::PARAM_INT);
  //     $stmt->bindValue('type1', $type1, PDO::PARAM_INT);
      
  //     $stmt->execute();
  //     header('Location: '.$_SERVER['PHP_SELF']);
  }
  // Modif pokemon
  function modifPokemon(PDO $dsn, $pkid, $champ){
    //echo $pkid . "-" . "$pv";
    $sql = "UPDATE pk_list SET Pv = :champ  WHERE Id_list = :pkid;";
    $stmt = $dsn->prepare($sql);
    $stmt->bindValue('pkid', $pkid, PDO::PARAM_INT);
    $stmt->bindValue('champ', $champ, PDO::PARAM_INT);
    $stmt->execute();
    header('Location: '.$_SERVER['PHP_SELF']);
  }
?>