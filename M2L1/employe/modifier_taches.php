<?php
require('../config.php');
// Définir les variables avec des valeurs empty
$Etat = $Raison = "";
$Etat_err = $Raison_err = "";
 
// ENvoi des données lorsque le formulaire est rempli
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Valeur input cache
    $id = $_POST["id"];
    

    
    // etat valide
    $input_Etat = trim($_POST["Etat"]);
    if(empty($input_Etat)){
        $Etat_err = "Entrez l'état de la tâche";     
    }  else{
        $Etat = $input_Etat;
    }
    


    // check d'erreurs d'input
    if(empty($Etat_err)){
        // prepare la requete update
        $sql = "UPDATE tache SET Etat=?, Raison=? WHERE id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // mettre les variables comme parametres
            mysqli_stmt_bind_param($stmt, "ssi", $param_Etat, $param_Raison, $param_id);
            
            // definir les parameters
            $param_Etat = $Etat;
            $param_Raison = $Raison;
            $param_id = $id;
            

            if(mysqli_stmt_execute($stmt)){

                header("location: home.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }        
        mysqli_stmt_close($stmt);
        }
    }
    

    mysqli_close($conn);
} else{

    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $id =  trim($_GET["id"]);
    error_reporting(E_ALL);
ini_set("display_errors", 1);

        $sql = "SELECT * FROM tache WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
           
            $param_id = $id;
            
           
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                  
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    

                    $Etat = $row["Etat"];
                    $Raison = $row["Raison"];
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }        
        mysqli_stmt_close($stmt);
        
        


    } else{
 
        header("location: error.php");
        exit();
    }
     mysqli_close($conn);
}
}
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Modification d'une tâche</h2>
                    <p>Modifiez la tâche que vous avez sélectionné</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <div class="form-group">
                            
                        <div class="form-group">
                            <label>Etat de la tâche</label>
                            <SELECT name="Etat" class="form-control"  size="1" value="<?php echo $Etat; ?>" >
                                <optgroup label="-- Etat actuel: <?php echo $Etat; ?> --">
        <OPTION>Non assignée
        <OPTION>En cours de réalisation
        <OPTION>En attente
        <OPTION>Terminée
        </SELECT>
                            <span class="invalid-feedback"><?php echo $Etat_err;?></span>
                        </div>
                        <label>Si la tâche est en attente, indiquez pourquoi:</label>
                            <input type="text" name="Raison" class="form-control <?php echo (!empty($Raison_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $Raison; ?>">
                            <span class="invalid-feedback"><?php echo $Raison_err;?></span>
                        </div>
                        <div style="height: 20px; width: 100%;"></div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Confirmer">
                        <a href="home.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>