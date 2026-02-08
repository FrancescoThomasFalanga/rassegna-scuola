<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "rassegna_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
  die("Connessione fallita: " . $conn->connect_error);
}

$data = $_POST["data"];
$file = $_FILES["pdf"];

$nomeFile = time() . "_" . basename($file["name"]);
$destinazione = "pdf/" . $nomeFile;

if (move_uploaded_file($file["tmp_name"], $destinazione)) {
  $sql = "INSERT INTO rassegne (data, file) VALUES ('$data', '$nomeFile')";
  if ($conn->query($sql) === TRUE) {
    header("Location: /rassegna-scuola/index.html");
    exit();
  } else {
    echo "Errore database";
  }
} else {
  echo "Errore upload file";
}
?>
