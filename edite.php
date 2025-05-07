<?php
    try{
        include 'functions.php';
        $conn = connectDB();
        if ( isset($_GET["id"]) && isset($_GET["nom"]) && isset($_GET["email"]) && isset($_GET["tele"]) && isset($_GET["titre"])){
            
            $id = $_GET["id"];
            $nom = $_GET["nom"];
            $email = $_GET["email"];
            $tele = $_GET["tele"];
            $titre = $_GET["titre"];

            $req = 'UPDATE contacts SET nom = :nom, email = :email, tel = :tel, titre = :titre WHERE id = :id';
            $op = $conn->prepare($req) ;
            $op->execute([
                ":nom" => $nom,
                ":email" => $email,
                ":tel" => $tele,
                ":titre" => $titre,
                ":id" => $id
            ]);    
        }

        
        $cont = readID($conn);


    }
    catch(PDOException $e){
        echo "Connection Err". $e->getMessage() ;
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
                <i class="fa-solid fa-user-pen"></i>
                <h1>Modifier un Contacts</h1> 
            </div>
            <p>mettre ajoure les info du contact</p>
        </div>
        <div class="p-3 shadow-sm border rounded-1 w-75 m-auto">
            <form action="" method="get">
                <label for="" class="form-label ">Nom</label>
                <input type="text" name="nom" class="form-control" value="<?php echo $cont->nom;?>">

                <label for="" class="form-label mt-3">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $cont->email;?>">

                <label for="" class="form-label mt-3">Telephone</label>
                <input type="text" name="tele" class="form-control" value="<?php echo $cont->tel;?>">

                <label for="" class="form-label mt-3">Titre</label>
                <input type="text" name="titre" class="form-control" value="<?php echo $cont->titre;?>">

                <input type="hidden" name="id" value="<?php echo $cont->id;?>">

                <a href="index.php" class="btn btn-outline-secondary mt-3"><i class="fa-solid fa-arrow-left"></i> Retour</a>
                <button type="submit" class="btn btn-primary mt-3"><i class="fa-solid fa-floppy-disk"></i> Enregistrer</button>
            </form>
        </div>

    </div>
</body>
</html>