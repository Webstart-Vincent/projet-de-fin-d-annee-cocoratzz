<?php
if ('localhost' == $_SERVER['HTTP_HOST']) {
    // Connection details for localhost
    $servername = "localhost";  // Database address (if remote, use appropriate IP or domain name)
    $username = "root";
    $password = "";
    $dbname = "bubbleratzz";
} else {
    // Connection details for remote server
    $servername = "localhost";  // Database address (if remote, use appropriate IP or domain name)
    $username = "u220436049_dv23colyne";
    $password = "3iUon1hF7sy28ocV";
    $dbname = "u220436049_dv23colyne";
}

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully"; // Ligne de débogage pour vérifier la connexion
}

?>
