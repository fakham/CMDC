<?php

include 'connect.php';

function ajouter_charge($con, $date, $type, $utilisateur, $produit) {

    $date_f = STR_TO_DATE($date, '%c/%e/%Y %r');

    $sql_add = "INSERT INTO Charge (date, type, utlisateur, produit) 
                VALUES ('".$date_f."', '".$type."', ".$utilisateur.", ".$produit.")";

    $info = mysqli_query($con, $sql_add);

    mysqli_close($con);

    return $info;

}

function modifier_charge($con, $id, $date, $type, $utilisateur, $produit) {
    
    $date_f = STR_TO_DATE($date, '%c/%e/%Y %r');

    $sql_update = "UPDATE Charge
                   SET date = '".$date_f."', type = '".$type."', utlilisateur = ".$utilisateur.", produit = ".$produit."
                   WHERE id = ".$id;

    $info = mysqli_query($con, $sql_update);

    mysqli_close($con);

    return $info;

}

function supprimer_charge($con, $id) {

    $sql_delete = "DELETE Charge WHERE id = ".$id;

    $info = mysqli_query($con, $sql_delete);

    mysqli_close($con);

    return $info;

}


?>