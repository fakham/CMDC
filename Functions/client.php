<?php

include 'connect.php';

function ajouter_client($con, $nom, $telephone, $activite, $region) {

    $sql_add = "INSERT INTO Client(nom, telephone, activite, region) 
                VALUES ('".$nom."', '".$telephone."', '".$activite."', '".$region."')";

    $sql_check = "SELECT * FROM Client WHERE nom = '".$nom."'";

    $results = mysqli_query($con, $sql_check);

    $count = mysqli_num_rows($results);

    if ($count > 0)
        return "le nom de client existe déjà.";
    
    $info = mysqli_query($con, $sql_add);

    mysqli_close($con);

    return $info;

}

function modifier_client($con, $id, $nom, $telephone, $activite, $region) {

    $sql_update = "UPDATE Client
                   SET nom = '".$nom."', telephone = '".$telephone."', activite = '".$activite."', region = '".$region."'
                   WHERE id = ".$id;

    $info = mysqli_query($con, $sql_update);

    mysqli_close($con);

    return $info;

}

function supprimer_client($con, $id) {

    $sql_delete = "DELETE Client WHERE id = ".$id;

    $info = mysqli_query($con, $sql_delete);

    mysqli_close($con);

    return $info;

}

?>