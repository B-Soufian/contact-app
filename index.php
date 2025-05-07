<?php
    try{
        include 'functions.php';
        $conn = connectDB();
        $req = "select * from contacts";
        $op = $conn->prepare($req);
        $op->execute();
        $cont=$op->fetchAll(PDO::FETCH_OBJ);
        
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
                <i class="fa-solid fa-address-book"></i>
                <h1>Gestion des Contacts</h1> 
            </div>
            <p>Systeme de gestion des contacts profossionels</p>
        </div>
        <div class="p-2 shadow-sm border rounded-1 m-auto" style="width: 90%;" >
            <div class="d-flex align-items-start  gap-5">
                <form action="create.php" method="get" class="flex-grow-1">
                    <button class="btn btn-primary  w-100"  type="submit">+ Nouveau Contact</button>
                </form>
            </div>

            <div>
                <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th >Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Date de Creation</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($cont as $C){?>
                      <tr>
                        <td><?php echo $C->nom;?></td>
                        <td><?php echo $C->email;?></td>
                        <td><?php echo $C->tel;?></td>
                        <td><?php echo $C->titre;?></td>
                        <td><?php $date = $C->DateCreation; echo date("d/m/Y", strtotime($date)); ?></td>
                        <td class="d-flex gap-1">
                            <form action="read.php" method="get">
                                <input type="hidden" name="id" value="<?php echo $C->id;?>">
                                <button type="submit"class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></button>
                            </form>
                            <form action="edite.php" method="get">
                                <input type="hidden" name="id" value="<?php echo $C->id;?>">
                                <button type="submit" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                            </form>
                            <form action="delete.php" method="get" onsubmit="return confirm('Supprimer cet élément ?');">
                                <input type="hidden" name="id" value="<?php echo $C->id;?>">
                                <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                      </tr>
                      <?php }?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>