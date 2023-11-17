<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        //if user is logged in
        header("location: users.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="domaine.css">
    <title>Choix domaine</title>
</head>
<body>
<form action="#">
            
            <div class="container">
                <h2>Bienvenue cher contribuable</h2>
                <label >Veuillez choisir le domaine que vous voulez savoir</label>
                <label>
                    <input type="radio" name="domaine" value="IS" checked>
                    <span>Impôt Synthétique</span>
                </label>
                <label>
                    <input type="radio" name="domaine" value="IMP">
                    <span>Impôt sur les Marchés Publiques</span>
                </label>
                <label>
                    <input type="radio" name="domaine" value="IRSA">
                    <span>Impôt sur les Revenus Salariaux Assimilées</span>
                </label>
                <label>
                    <input type="radio" name="domaine" value="IPVI">
                    <span>Impôt sur les Plus Values Immobilière</span>
                </label>
                <label>
                    <input type="radio" name="domaine" value="IR">
                    <span>Impôt sur le Revenu</span>
                </label>
                <label>
                    <input type="radio" name="domaine" value="IDH">
                    <span>Impôt Direct sur les Hydrocarbures</span>
                </label>
                <label>
                    <input type="radio" name="domaine" value="IFT">
                    <span>Impôt Foncier sur le Terrain</span>
                </label>
                <label>
                    <input type="radio" name="domaine" value="IFPB">
                    <span>Impôt Foncier sur les Propriétés Bâtis</span>
                </label>
            </div>
        
        <div class="field button">
            <input type="submit" value="Commencer la discussion">
        </div>   
</form>
</body>
</html>