<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dan";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['publish'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $pseudo = $_POST['pseudo'];
    $url = $_POST['url'];
    $image = $_POST['image']; 

    $sql = "INSERT INTO publications (title, description, pseudo, url, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $title, $description, $pseudo, $url, $image);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Publication créée avec succès.";
    } else {
        echo "Erreur lors de la création de la publication.";
    }
}
?>
