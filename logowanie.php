<?php
    // Połączenie z bazą danych
    $conn = new mysqli("localhost", "root", "", "php_db");

    // Sprawdzenie połączenia
    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }

    // Pobranie danych z formularza
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Zabezpieczenie przed atakami SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Zapytanie do bazy danych
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    // Sprawdzenie czy użytkownik istnieje
    if ($result->num_rows > 0) {
        echo "Zalogowano pomyślnie!";
    } else {
        echo "Błędna nazwa użytkownika lub hasło.";
    }

    // Zamknięcie połączenia
    $conn->close();
?>
