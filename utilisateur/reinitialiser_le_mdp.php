<?php
session_start();
if ('localhost' == $_SERVER['HTTP_HOST']) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bubbleratzz";
} else {
    $servername = "host";
    $username = "u220436049_dv23colyne";
    $password = "3iUon1hF7sy28ocV";
    $dbname = "u220436049_dv23colyne";
}

// Crée une connexion
$connexion = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email'] ?? '');

    $query = "SELECT id FROM utilisateurs WHERE email = ?";
    $stmt = $connexion->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $token = bin2hex(random_bytes(50));
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $query = "INSERT INTO password_resets (email, token, expiry) VALUES (?, ?, ?)";
        $stmt = $connexion->prepare($query);
        $stmt->bind_param('sss', $email, $token, $expiry);
        $stmt->execute();

        $resetLink = "https://example.com/password_reset.php?token=$token";
        $subject = "Réinitialisation de votre mot de passe";
        $message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : $resetLink";
        $headers = 'From: noreply@example.com' . "\r\n" .
                   'Reply-To: noreply@example.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        mail($email, $subject, $message, $headers);

        echo "Un email de réinitialisation a été envoyé.";
    } else {
        echo "Aucun utilisateur trouvé avec cet email.";
    }
}
?>
