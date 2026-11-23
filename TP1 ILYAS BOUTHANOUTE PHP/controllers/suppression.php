<?php
declare(strict_types=1);

require_once __DIR__ . '/../model/JoueursJson.php';

if (isset($_GET['idx']) && ctype_digit((string) $_GET['idx'])) {
    $idx = (int) $_GET['idx'];
    $joueurs = JoueursJson::getJoueurs();

    if (array_key_exists($idx, $joueurs)) {
        unset($joueurs[$idx]);
        JoueursJson::setJoueurs(array_values($joueurs));
    }
}

header('Location: index.php');
exit;
