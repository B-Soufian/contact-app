<?php 
    try{
        include 'functions.php';
        $conn = connectDB();
        $cont = readID($conn);
    }
    catch(PDOException $e){
        echo "Conection Err" . $r->getMessage() ;
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
        <div class="titel" >
            <div class="titl text-primary">
                <i class="fa-solid fa-user-pen"></i>
                <h1>Details du Contacts</h1> 
            </div>
            <p>information completes sur le contact</p>
        </div>
        <div class="p-3 shadow-sm border rounded-1 w-75 m-auto">
            <div class="hed">
                <i class="fa-solid fa-circle-user text-primary m-2"></i>
                <h4><?php echo $cont->nom;?></h4>
                <p><?php echo $cont->titre;?></p>
            </div>
            <hr>
            <div class="row">
                <div class="col-6 d-flex gap-3 align-items-center">
                    <i class="fa-solid fa-envelope text-primary"></i>
                    <div>
                        <p class="m-0">Email</p>
                        <p class="text-primary m-0"><?php echo $cont->email;?></p> 
                    </div>
                </div>
                <div class="col-6 d-flex gap-3 align-items-center">
                    <i class="fa-solid fa-phone text-primary"></i>
                    <div>
                        <p class="m-0">Telephone</p>
                        <p class="text-primary m-0"><?php echo $cont->tel;?></p> 
                    </div>
                </div>

                <div class="col-12 d-flex gap-3 mt-3 align-items-center">
                    <i class="fa-solid fa-calendar-days text-primary"></i>
                    <div>
                        <p class="m-0">Date de Creation</p>
                        <p class="text-primary m-0"><?php $date = $cont->DateCreation; echo date("d/m/Y", strtotime($date));?></p> 
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex align-items-center gap-2">
                <a href="index.php" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i> Retour</a>
                
                <form action="edite.php" method="get" class="m-0">
                    <input type="hidden" name="id" value="<?php echo $cont->id;?>">
                    <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Modifier</button>
                
                </form>
                <form action="delete.php" method="get" class="m-0" onsubmit="return confirm('Supprimer cet élément ?');">
                    <input type="hidden" name="id" value="<?php echo $cont->id;?>">
                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Supprimer</button>
                </form>
            </div>
        </div>

    </div>
</body>
</html>