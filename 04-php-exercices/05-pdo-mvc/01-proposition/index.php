<?php
  include("./templates/common/header.php");
  include("./templates/common/menu.php");
  //include(".functions/models/db.func.php");
  //require("./_db_mysql/db_introprog_pokemons.sql");
  require("./functions/models/db.func.php");
  // require("./templates/all.tpl.php");
  require("./templates/template_func.php");

?>

<h1>Pokédex</h1>

<?php
try{
$dsn = connectDB();
$pokemonsList = getAllPokemons($dsn);
$typesList = getTypes($dsn);


// TEST AFFICHAGE 


// global $id; //Récupération de ton nombre via base de donnée ou fichier (cf cours m@teo21)
// if(($id==3)||($id==2)||($id==1)){
// $id=3;
// }
// if (isset($_GET['plus'])) {
//    $id++;
//    //On renvoi le nombre dans la base de donnée ou le fichier
// }else if(isset($_GET['moins'])) {
//    $id--;
//    //On renvoi le nombre dans la base de donnée ou le fichier
// }
// echo $id;



if(isset($_POST['delete']))
      {
        
        $reponse = $dsn->query('SELECT Image FROM pk_list WHERE Id_list ='. $_POST['pokemon_id']);
        $donnees = $reponse->fetch();
        //echo $donnees['Image'] . '<br />';


        // DEUXIEME THECHNIQUE ---->>>>>

        // if(isset($_POST["fileID"])){
        //   unlink("public/image/".$_POST["fileID"]);
        //   }
        // A METTRE DANS LES BOUTONS DANS ALL.TPL.PHP (BOUTON HIDEN)

        // echo "<input type='hidden' name='fileID' value=\"{$value['Image']}\">";

        // <<<<<<<<<---------

        
        unlink( "public/assets/images/pokemons/".$donnees['Image']);
        
        
        
        deletePokemon($dsn, $_POST["pokemon_id"]);
      }

      if(isset($_POST['ajout']))
      {
        $target_dir = "public/assets/images/pokemons/";
        $target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["uploadfile"]["tmp_name"]);
        if($check !== false){
          echo "File is an image - " . $check["mine"] . ".";
          $uploadOk = 1;
        }else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
        if (file_exists($target_file)){
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }
        if ($_FILES["uploadfile"]["size"] > 500000){
          echo "sorry, your file is too large.";
          $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }
        if ($uploadOk == 0){
          echo "sorry, your file was not uploaded.";
        }else{
          if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file)){
            echo "the file " . htmlspecialchars(basename($_FILES["uploadfile"]["name"])). " has been uploaded.";
          } else {
            echo "sorry, there was an error uploading your file.";
          }
        }
        if($_POST["type2"]=='NULL'){
          $value=NULL;
        }
        else if($_POST["type1"]===$_POST["type2"]){
          $value=NULL;
        }
        else{
          $value=$_POST["type2"]+1;
        }
        if($_FILES["uploadfile"]==NULL){
          $_FILES["uploadfile"]='Default.png';
        }
       
         ajoutPokemon($dsn, $_POST["nom"], $_POST["pv"], $_POST["type1"]+1,$value, $_POST["editable"], $_FILES["uploadfile"]["name"]);
      }
      
      if(isset($_POST['modif']))
      {
        if (isset($_POST['useid']) && isset($_POST['champ'])) {
          modifPokemon($dsn, $_POST["useid"], $_POST["champ"]);
      }
      }
}

catch (Exception $ex) {
  die("ERREUR FATALE : " . $ex->getMessage(). "Erreur de connexion !");
}
?>


<?php
  require("./templates/all.tpl.php");
  include("./templates/common/footer.php");
?>