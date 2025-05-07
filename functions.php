<?php
function connectDB() {
    return new PDO("mysql:host=....;port=...;dbname=contact", "...", "");
}
function readID($coon){
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }
    else{
        $id = 0;
    }
    $req = "select * from contacts where id = :id" ;
    $op = $coon->prepare($req);
    $op->execute([":id"=>$id]);
    return $op->fetch(PDO::FETCH_OBJ) ;
}
?>