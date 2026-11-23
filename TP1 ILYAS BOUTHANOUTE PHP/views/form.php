<?php require __DIR__ . '/partials/header.php'; ?>
<section class="page-heading">
    <div>
        <p class="eyebrow">GESTION DE L'EFFECTIF</p>
        <h1>Ajouter un joueur</h1>
        <p class="muted">Remplissez les informations ci-dessous.</p>
    </div>
    <a class="button button-secondary" href="index.php">← Retour à la liste</a>
</section>

<?php if ($erreurs): ?>
    <div class="alert alert-error">
        <strong>Veuillez corriger les éléments suivants :</strong>
        <ul><?php foreach ($erreurs as $erreur): ?><li><?= htmlspecialchars($erreur, ENT_QUOTES, 'UTF-8') ?></li><?php endforeach; ?></ul>
    </div>
<?php endif; ?>

<form class="form-card" method="post" action="ajout.php">
    <div class="form-group">
        <label for="nom">Nom complet</label>
        <input id="nom" type="text" name="nom" maxlength="100" placeholder="Ex. : Achraf Hakimi" value="<?= htmlspecialchars($_POST['nom'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
    </div>
    <div class="form-group">
        <label for="ddn">Date de naissance</label>
        <input id="ddn" type="date" name="ddn" value="<?= htmlspecialchars($_POST['ddn'] ?? '', ENT_QUOTES, 'UTF-8') ?>" max="<?= date('Y-m-d') ?>" required>
    </div>
    <fieldset class="form-group">
        <legend>Position(s) sur le terrain</legend>
        <p class="field-help">Vous pouvez sélectionner plusieurs positions.</p>
        <div class="checkbox-grid">
        <?php foreach ($positions as $position): ?>
            <label class="checkbox-option">
                <input type="checkbox" name="positions[]" value="<?= $position->value ?>" <?= in_array($position->value, $_POST['positions'] ?? [], true) ? 'checked' : '' ?>>
                <span><strong><?= $position->value ?></strong><?= $position->libelle() ?></span>
            </label>
        <?php endforeach; ?>
        </div>
    </fieldset>
    <div class="form-actions">
        <a class="button button-secondary" href="index.php">Annuler</a>
        <button class="button button-primary" type="submit">Enregistrer le joueur</button>
    </div>
</form>
<?php require __DIR__ . '/partials/footer.php'; ?>
