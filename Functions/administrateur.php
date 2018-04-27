<?php

include 'connect.php';

function ajouter_administrateur($con, $nom, $prenom, $email, $username, $password) {

    $sql_add_admin = "INSERT INTO Administrateur(nom, prenom, email, username, password) 
                      VALUES ('".$nom."', '".$prenom."', '".$email."', '".$username."', '".$password."')";

    $sql_check_email = "SELECT * FROM Administrateur WHERE email = '".$email."'";
    $sql_check_username = "SELECT * FROM Administrateur WHERE username = '".$username."'";

    $results = mysqli_query($sql_check_email);
    $count = mysqli_num_rows($results);

    if ($count > 0)
        return "email existe déjà.";

    $results = mysqli_query($sql_check_username);
    $count = mysqli_num_rows($results);

    if ($count > 0)
        return "username existe déjà.";

    $info = mysqli_query($sql_add_admin);

    mysqli_close($con);

    return $info;

}

function modifier_administrateur($con, $id, $nom, $prenom, $email, $username, $password) {

    $sql_update = "UPDATE Administrateur
                   SET nom = '".$nom."', prenom = '".$prenom."', email = '".$email."', '".$username."', '".$password."'
                   WHERE id = ".$id;

    $info = mysqli_query($sql_update);

    mysqli_close($con);

    return $info;

}

function supprimer_administrateur($con, $id) {

    $sql_delete = "DELETE Administrateur WHERE id = ".$id;

    $info = mysqli_query($sql_delete);

    mysqli_close($con);

    return $info;

}

?>