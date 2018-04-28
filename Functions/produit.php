<?php

include 'connect.php';

function ajouter_produit($con, $nom, $description, $prix, $type, $qtte, $isFinit, $client, $fournisseur) {

    $sql_add = "INSERT INTO Produit(nom, description, prix, type, qtte, isFinit, client, fournisseur)
                VALUES ('".$nom."', '".$description."', ".$prix.", '".$type."', ".$qtte.", ".$isFinit.", ".$client.", ".$fournisseur.")";

    $info = mysqli_query($con, $sql_add);

    mysqli_close($con);

    return $info;

}

function modifier_produit($con, $id, $nom, $description, $prix, $type, $qtte, $isFinit, $client, $fournisseur) {

    $sql_update = "UPDATE Produit
                   SET nom = '".$nom."', description = '".$description."', prix = ".$prix.", type = '".$type."', qtte = ".$qtte.",
                       isFinit = ".$isFinit.", client = ".$client.", fournisseur = ".$fournisseur."
                   WHERE id = ".$id;

    $info = mysqli_query($con, $sql_update);

    mysqli_close($con);

    return $info;

}

function supprimer_produit($con, $id) {

    $sql_delete = "DELETE Produit WHERE id = ".$id;

    $info = mysqli_query($con, $sql_delete);

    mysqli_close($con);

    return $info;

}

?>