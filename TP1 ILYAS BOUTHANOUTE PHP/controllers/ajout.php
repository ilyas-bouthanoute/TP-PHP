<?php
declare(strict_types=1);

require_once __DIR__ . '/../model/JoueursJson.php';

$positions = Position::cases();
$erreurs = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $dateNaissance = $_POST['ddn'] ?? '';
    $positionsPost = $_POST['positions'] ?? [];

    if ($nom === '') {
        $erreurs[] = 'Le nom du joueur est obligatoire.';
    } elseif (mb_strlen($nom) > 100) {
        $erreurs[] = 'Le nom ne doit pas dépasser 100 caractères.';
    }

    $date = DateTime::createFromFormat('Y-m-d', $dateNaissance);
    if (!$date || $date->format('Y-m-d') !== $dateNaissance) {
        $erreurs[] = 'Veuillez saisir une date de naissance valide.';
    } elseif ($date > new DateTime('today')) {
        $erreurs[] = 'La date de naissance ne peut pas être dans le futur.';
    }

    if (!is_array($positionsPost) || count($positionsPost) === 0) {
        $erreurs[] = 'Veuillez sélectionner au moins une position.';
    } else {
        foreach ($positionsPost as $position) {
            if (!is_string($position) || Position::tryFrom($position) === null) {
                $erreurs[] = 'Une position sélectionnée est invalide.';
                break;
            }
        }
    }

    if (!$erreurs) {
        $positionsValides = array_map(
            static fn(string $p): Position => Position::from($p),
            array_values(array_unique($positionsPost))
        );
        $joueurs = JoueursJson::getJoueurs();
        $joueurs[] = new Joueur($nom, $dateNaissance, $positionsValides);
        JoueursJson::setJoueurs($joueurs);

        header('Location: index.php?ajout=ok');
        exit;
    }
}

$pageTitle = 'Ajouter un joueur';
require __DIR__ . '/../views/form.php';
