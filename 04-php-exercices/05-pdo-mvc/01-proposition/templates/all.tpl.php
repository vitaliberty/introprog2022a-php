  <!-- <h2>Vue</h2> -->
  
  <!-- <form action="#" method="post"  enctype="multipart/form-data">
  <fieldset>
    <legend>Ajout de Pokemon</legend>
    <label for="nom">Nom : </label>
    <input type="text" name="nom" required>
    <label for="pv">Points de vie </label>
    <input type="number" min="1" max="50" name="pv" required>
    <label for="type1">Types 1 </label>
    <br />
    <select name="type1" id="type1">
      <?php
      foreach($typesList as $key => $value){
        echo "<option value= \"$key\" . <br />  $value[Type]  </option>";
      }
      ?>
      
    </select>
    <label for="type2">Types 2 </label>
    <select name="type2" id="type2">
      <?php
        // echo "NULL <br />";
        $null='NULL';
        echo "<option value= \"$null\" . <br />  NULL <br />  </option>";
      foreach($typesList as $key => $value){
        // echo "<option value= \"$key\" . <br />  NULL <br />  </option>";
        echo "<option value= \"$key\" . <br />  $value[Type]  </option>";
      }
      ?>
    </select>
    <br />
    
          <!-- choix editable ou non ->
          <input type="radio" name="editable" value="1" id="edit" checked>
					<label for="edit">Editable</label>
					<input type="radio" name="editable" value="0" id="nonEdit">
					<label for="nonEdit">Non Editable</label>
          <!-- telechargement image ->
          <label for="telechargementImg">Image</label>
          <input type="file" name="uploadfile" value= <?php $img ?> id="telechargementImg">
          <!-- bouton d'envoi ->
          <br />
    <input type="submit" name="ajout" value="Ajouter Pokémon">
  </fieldset>
</form> -->

<!-- <table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Pv</th>
      <th>Image</th>
      <th>Type1</th>
      <th>Type2</th>
      <th>Editable</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($pokemonsList as $key => $value):?>
      <tr>
        <td><?php echo ($value['Name']); ?></td>
        <td><?php echo ($value['Pv']); ?></td>
        
        <td><?php echo "<img src=\"./public/assets/images/pokemons/$value[Image]\"  />"; ?></td>
        <td><?php echo displayType($typesList, $value['Type1']); ?></td>
        <td><?php echo displayType($typesList, $value['Type2']); ?></td>
        <td>
          <?php
            if ($value['Editable']) {
              { echo "<form action=\"#\" method=\"POST\">";
                echo  "<input type=\"hidden\" name=\"pokemon_id\" value=$value[Id_list]>";
                echo "<input type=\"submit\" name=\"delete\" value=\"Supprimer\">";
                echo "</form>";
                echo "<form action=\"#\" method=\"POST\">";
                  // echo  "<input type=\"submit\" name=\"pokemonModif\" value=$value[Id_list]>";
                echo "<input type=\"hidden\" name=\"useid\" value=$value[Id_list]} >";
                echo "<input type=\"number\" name=\"champ\" min=\"1\" max=\"50\" required>";
                echo "<input type=\"submit\" name=\"modif\" value=\"Modifier PV\">";
                echo "</form>";}
            }
            else { echo "Non"; }
          ?>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table> -->

<!-- test affichage  -->



<?php 
    // while($i<3){
    //   $id=0;

    // }
    if($id<3){
    $id=1;
    }
    if ($id<=2){
      $id=3;
      $idpk=$id;
    }
    // $id=3;
?>


<div>
  <?php
  // $id=$idpk;
  echo $idpk;
  ?>
  <div>
    <!-- SUIVANT/PRECEDENT -->
    <form method="GET" action="#">
   <input type="submit" name="plus" value="suivant" />
   <input type="submit" name="moins" value="precedent" />
   <!-- <?php
   if (isset($_GET['plus'])) {
    $idpk++;
    //On renvoi le nombre dans la base de donnée ou le fichier
  }else if(isset($_GET['moins'])) {
      $idpk--;
      //On renvoi le nombre dans la base de donnée ou le fichier
  }
  echo $idpk;
   ?> -->
    </form>
  </div>
  <div>
    <!-- image -->
    <?php 
    // $id=3;
    // global $id;
   
    var_dump($idpk);
      $reponse = $dsn->query('SELECT Image FROM pk_list WHERE Id_list ='. $idpk);
      $donnees = $reponse->fetch();
      echo "<img src=\"./public/assets/images/pokemons/$donnees[Image]\"  />"; 
      //echo $donnees['Image'];
    ?>
  </div>
  <div>
    <!-- PV -->
    <?php 
      $reponse = $dsn->query('SELECT Pv FROM pk_list WHERE Id_list ='. $idpk);
      $donnees = $reponse->fetch();
      echo ($donnees['Pv']); 
      //echo $donnees['Pv'];
    ?>
  </div>
  <div>
    <!-- modifier PV -->
    <?php
    $reponse = $dsn->query('SELECT Editable FROM pk_list WHERE Id_list ='. $idpk);
    $donnees = $reponse->fetch();
            if ($donnees['Editable']==1) {
              { 
                echo "<form action=\"#\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"useid\" value=$idpk >";
                echo "<input type=\"number\" name=\"champ\" min=\"1\" max=\"50\" required>";
                echo "<input type=\"submit\" name=\"modif\" value=\"Modifier PV\">";
                echo "</form>";}
            }
            else { echo "Non"; }
          ?>
  </div>
</div>
<div>
  <div>
    <!-- NOM -->
    <?php 
      $reponse = $dsn->query('SELECT Name FROM pk_list WHERE Id_list ='. $id);
      $donnees = $reponse->fetch();
      echo ($donnees['Name']);
      //echo $donnees['Image'];
    ?>
  </div>
  <div>
    <!-- AJOUT -->
    <form action="#" method="post"  enctype="multipart/form-data">
  <fieldset>
    <legend>Ajout de Pokemon</legend>
    <label for="nom">Nom : </label>
    <input type="text" name="nom" required>
    <label for="pv">Points de vie </label>
    <input type="number" min="1" max="50" name="pv" required>
    <label for="type1">Types 1 </label>
    <br />
    <select name="type1" id="type1">
      <?php
      foreach($typesList as $key => $value){
        echo "<option value= \"$key\" . <br />  $value[Type]  </option>";
      }
      ?>
      
    </select>
    <label for="type2">Types 2 </label>
    <select name="type2" id="type2">
      <?php
        // echo "NULL <br />";
        $null='NULL';
        echo "<option value= \"$null\" . <br />  NULL <br />  </option>";
      foreach($typesList as $key => $value){
        // echo "<option value= \"$key\" . <br />  NULL <br />  </option>";
        echo "<option value= \"$key\" . <br />  $value[Type]  </option>";
      }
      ?>
    </select>
    <br />
          <!-- choix editable ou non -->
          <input type="radio" name="editable" value="1" id="edit" checked>
					<label for="edit">Editable</label>
					<input type="radio" name="editable" value="0" id="nonEdit">
					<label for="nonEdit">Non Editable</label>
          <!-- telechargement image -->
          <label for="telechargementImg">Image</label>
          <input type="file" name="uploadfile" value= <?php $img ?> id="telechargementImg">
          <!-- bouton d'envoi -->
          <br />
    <input type="submit" name="ajout" value="Ajouter Pokémon">
  </fieldset>
</form>
  </div>
  <div>
    <!-- SUPRIMER -->
    <?php
    $reponse = $dsn->query('SELECT Editable FROM pk_list WHERE Id_list ='. $idpk);
    $donnees = $reponse->fetch();
            if ($donnees['Editable']==1) {
              { 
                echo "<form action=\"#\" method=\"POST\">";
                echo  "<input type=\"hidden\" name=\"pokemon_id\" value=$idpk>";
                echo "<input type=\"submit\" name=\"delete\" value=\"Supprimer\">";
                echo "</form>";;}
            }
            else { echo "Non"; }
          ?>
  </div>
  <!-- <div>
    <!-- SUIVANT/PRECEDENT ->
    <form method="GET" action="#">
   <input type="submit" name="plus" value="suivant" />
   <input type="submit" name="moins" value="precedent" />
   <?php
   if (isset($_GET['plus'])) {
    $id++;
    //On renvoi le nombre dans la base de donnée ou le fichier
  }else if(isset($_GET['moins'])) {
      $id--;
      //On renvoi le nombre dans la base de donnée ou le fichier
  }
  echo $id;
   ?>
    </form>
  </div> -->
  <div>
    <!-- TYPE1 -->
    <?php 
      $reponse = $dsn->query('SELECT Type1 FROM pk_list WHERE Id_list ='. $idpk);
      $donnees = $reponse->fetch();
      echo displayType($typesList, $donnees['Type1']); 
      //echo $donnees['Image'];
    ?>
  </div>
  <div>
    <!-- TYPE2 -->
    <?php 
      $reponse = $dsn->query('SELECT Type2 FROM pk_list WHERE Id_list ='. $idpk);
      $donnees = $reponse->fetch();
      echo displayType($typesList, $donnees['Type2']); 
      //echo $donnees['Image'];
    ?>
  </div>
</div>
