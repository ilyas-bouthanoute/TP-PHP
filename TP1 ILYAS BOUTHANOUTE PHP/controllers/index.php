<?php
declare(strict_types=1);

require_once __DIR__ . '/../model/JoueursJson.php';

$joueurs = JoueursJson::getJoueurs();
$pageTitle = 'Liste des joueurs';
require __DIR__ . '/../views/liste.php';
