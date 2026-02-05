<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$base = "base";

$conn = mysqli_connect($serveur, $utilisateur, $motdepasse, $base);

if (!$conn) {
    die("Connexion échouée à la base de données");
}

// Vérification et traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['mot_de_passe'])) {

        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];

        // Sécurisation du mot de passe
        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        // Insertion dans la base
        $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe)
                VALUES ('$nom', '$email', '$mot_de_passe_hash')";

        if (mysqli_query($conn, $sql)) {
            echo "Inscription réussie";
        } else {
            echo "Erreur lors de l'inscription";
        }

    } else {
        echo "Tous les champs sont obligatoires";
    }
} else {
    echo "Aucune donnée reçue";
}
?>
