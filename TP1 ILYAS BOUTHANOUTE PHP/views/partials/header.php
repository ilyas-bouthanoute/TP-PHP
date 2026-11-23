<?php
$pageTitle = $pageTitle ?? 'Gestion des joueurs';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ilyas Bouthanoute">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?> | TP1</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<header class="topbar">
    <div class="container topbar-inner">
        <a class="brand" href="index.php"><span class="brand-mark">TP</span><span>Gestion des joueurs<small>TP1 · PHP & JSON</small></span></a>
        <span class="author">Réalisé par <strong>Ilyas Bouthanoute</strong></span>
    </div>
</header>
<main class="container main-content">
