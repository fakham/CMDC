<?php

include 'connect.php';

function ajouter_fournisseur($con, $nom, $telephone, $activite, $region) {

    $sql_add = "INSERT INTO Fournisseur(nom, telephone, activite, region) 
                VALUES ('".$nom."', '".$telephone."', '".$activite."', '".$region."')";

    $sql_check = "SELECT * FROM Fournisseur WHERE nom = '".$nom."'";

    $results = mysqli_query($con, $sql_check);

    $count = mysqli_num_rows($results);

    if ($count > 0)
        return "le nom de fournisseur existe déjà.";
    
    $info = mysqli_query($con, $sql_add);

    mysqli_close($con);

    return $info;

}

function modifier_fournisseur($con, $id, $nom, $telephone, $activite, $region) {

    $sql_update = "UPDATE Fournisseur
                   SET nom = '".$nom."', telephone = '".$telephone."', activite = '".$activite."', region = '".$region."'
                   WHERE id = ".$id;

    $info = mysqli_query($con, $sql_update);

    mysqli_close($con);

    return $info;

}

function supprimer_fournisseur($con, $id) {

    $sql_delete = "DELETE Fournisseur WHERE id = ".$id;

    $info = mysqli_query($con, $sql_delete);

    mysqli_close($con);

    return $info;

}

?>