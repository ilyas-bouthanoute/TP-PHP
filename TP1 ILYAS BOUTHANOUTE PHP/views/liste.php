<?php require __DIR__ . '/partials/header.php'; ?>
<section class="page-heading">
    <div>
        <p class="eyebrow">TABLEAU DE BORD</p>
        <h1>Liste des joueurs</h1>
        <p class="muted">Consultez les joueurs enregistrés et gérez votre effectif.</p>
    </div>
    <a class="button button-primary" href="ajout.php">＋ Ajouter un joueur</a>
</section>

<?php if (isset($_GET['ajout']) && $_GET['ajout'] === 'ok'): ?>
    <div class="alert alert-success">Le joueur a été ajouté avec succès.</div>
<?php endif; ?>

<section class="stat-card">
    <span class="stat-number"><?= count($joueurs) ?></span>
    <span class="stat-label">Joueur(s) enregistré(s)</span>
</section>

<div class="table-card">
    <?php if (!$joueurs): ?>
        <div class="empty-state">
            <h2>Aucun joueur pour le moment</h2>
            <p class="muted">Commencez par ajouter votre premier joueur.</p>
            <a class="button button-primary" href="ajout.php">Ajouter un joueur</a>
        </div>
    <?php else: ?>
    <div class="table-wrap">
        <table>
            <thead><tr><th>#</th><th>Nom</th><th>Date de naissance</th><th>Positions</th><th>Action</th></tr></thead>
            <tbody>
            <?php foreach ($joueurs as $idx => $joueur): ?>
                <tr>
                    <td class="row-number"><?= $idx + 1 ?></td>
                    <td class="player-name"><?= htmlspecialchars($joueur->getNom(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($joueur->getDateNaissance(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td class="positions">
                        <?php foreach ($joueur->getPositions() as $position): ?>
                            <span class="position-tag" title="<?= htmlspecialchars($position->libelle(), ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($position->value, ENT_QUOTES, 'UTF-8') ?></span>
                        <?php endforeach; ?>
                    </td>
                    <td><a class="delete-link" href="suppression.php?idx=<?= $idx ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce joueur ?')">Supprimer</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</div>
<?php require __DIR__ . '/partials/footer.php'; ?>
