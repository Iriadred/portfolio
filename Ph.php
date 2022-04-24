

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UFT-8" />
    <title>PortFolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link href="css/main.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php 
      	$servername='mysql-frize.alwaysdata.net';
          $dbname='frize_bdd_iriad';
          $username='frize_iriad';
          $password='K?50GD#EPNIJI3x1
';
        $email= strip_tags($_POST["email"]);
        $nom= strip_tags($_POST["Nom"]);
        $descr= strip_tags($_POST["descr"]);
      
          try{
              $conn= new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

              $requete = $conn->prepare("INSERT INTO `contact`(`email`, `Nom`, `description`) VALUES (:email,:nom,:descr);");
        
		    $requete->bindValue(':email',$email , PDO::PARAM_STR);
		    $requete->bindValue(':nom',$nom , PDO::PARAM_STR);
        $requete->bindValue(':descr',$descr , PDO::PARAM_STR);

		    $requete->execute();
          }
        catch(PDOException $e){
            echo "erreur :".$e->getMessage();
            echo " Le numéro de l'erreur est : ".$e->getCode();
            die;
        }
        header('Location:index.php ');
      ?>


</body>
</html>  
