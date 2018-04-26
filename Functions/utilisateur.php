<?php

include 'connect.php';

function ajouter_utilisateur($con, $nom, $prenom, $email, $telephone, $username, $password) {

    // check if user already exists
    $sql_check_username = "SELECT * FROM Utilisateur WHERE username = '".$username."'";
    $sql_check_email = "SELECT * FROM Utilisateur WHERE username = '".$email."'";

    $results = mysqli_query($con, $sql_check_username);
    $count = mysqli_num_rows($results);

    if ($count > 0)
        return "Username existe déjà.";
    
    $results = mysqli_query($con, $sql_check_email);
    $count = mysqli_num_rows($results);

    if ($count > 0)
        return "Email existe déjà.";

    // adding user
    $sql_ajouter = "INSERT INTO Utilisateur(`nom`, `prenom`, `email`, `telephone`, `username`, `password`) 
                    VALUES ('".$nom."', '".$prenom."', '".$email."', '".$telephone."', '".$username."', '".$password."')";

    if (mysqli_query($con, $sql_ajouter))
        return "Added.";
    else
        return "Can't add user.";


    mysqli_close($con);
}

function modifier_utilisateur($con, $nom, $prenom, $email, $telephone, $username, $password) {
    
    $sql_update = "UPDATE Utilisateur
                   SET nom = '".$nom."' , prenom = '".$prenom."' , telephone = '".$telephone."' 
                   , username = '".$username."' , password = '".$password."'
                   WHERE email = '".$email."'";

    if (mysqli_query($con, $sql_update))
        return "Votre modification a été enregistrée avec succès.";
    else
        return "Nous ne pouvons pas enregistrer votre modification.";

}

function supprimer_utilisateur($con, $email) {

    $sql_delete = "DELETE Utilisateur 
                   WHERE email = '".$email."'";

    if (mysqli_query($con, $email))
        return "Le compte a été supprimé avec succès";
    else
        return "Impossible de supprimer ce compte";

}

if (count($_POST) == 6) {
    $nom = mysqli_real_escape_string($con, $_POST["nom"]);
    $prenom = mysqli_real_escape_string($con, $_POST["prenom"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $telephone = mysqli_real_escape_string($con, $_POST["telephone"]);
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    $info = ajouter_utilisateur($con, $nom, $prenom, $email, $telephone, $username, $password);

    if ($info != "Added." && $info != "Can't add user.")
        echo $info;
}

?>