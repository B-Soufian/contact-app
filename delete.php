<?php
    try{
        include 'functions.php';
        $conn = connectDB();       
        $id = $_GET["id"];
        $req = "delete from contacts where id = :id";
        $op = $conn->prepare($req);
        $op->execute([":id"=>$id]);

        header("location:index.php");
    }
    catch(PDOException $e){
        echo "Connection ERR" . $e->getMessage() ;
    }
?>

</html>