<?php
    try{
        include 'functions.php';
        $conn = connectDB();
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            if (!empty($_GET["nom"]) && !empty($_GET["email"]) && !empty($_GET["tele"]) && !empty($_GET["titre"])){
                $nom = $_GET["nom"];
                $email = $_GET["email"];
                $tele = $_GET["tele"];
                $titre = $_GET["titre"];
                
                $req = 'INSERT INTO contacts(nom,email,tel,titre) VALUES(:nom,:email,:tel,:titre)';
                $op = $conn->prepare($req) ;
                if($op->execute([":nom"=>$nom,":email"=>$email,":tel"=>$tele,":titre"=>$titre])){
                    header("Location: index.php");
                }
                else{
                    echo "ERR";
                }
            }
            else{
                echo "all champ req";
            }
        }
        else{
            echo "non";
        }
    }
    catch(PDOException $e){
        echo "Problème de connexion ".$e->getMessage();
    }
?>






<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    <div class="container">
        <div class="titel">
            <div class="titl text-primary">
                <i class="fa-solid fa-user-plus"></i>                
                <h1>Ajouter un Contacts</h1> 
            </div>
            <p>Creer un nouveau contact</p>
        </div>
        <div class="p-3 shadow-sm border rounded-1 w-75 m-auto">
            <form action="" method="get">
                <label for="" class="form-label ">Nom</label>
                <input type="text" name="nom" class="form-control">

                <label for="" class="form-label mt-3">Email</label>
                <input type="email" name="email" class="form-control">

                <label for="" class="form-label mt-3">Telephone</label>
                <input type="text" name="tele" class="form-control">

                <label for="" class="form-label mt-3">Titre</label>
                <input type="text" name="titre" class="form-control">

                <a href="index.php" class="btn btn-outline-secondary mt-3"><i class="fa-solid fa-arrow-left"></i> Retour</a>
                <button type="submit" class="btn btn-primary mt-3"><i class="fa-solid fa-floppy-disk"></i> Enregistrer</button>
            </form>
        </div>

    </div>
</body>
</html>