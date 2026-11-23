<?php
declare(strict_types=1);

require_once __DIR__ . '/Joueur.php';

class JoueursJson
{
    private const CHEMIN = __DIR__ . '/../data/joueurs.json';

    /** @return Joueur[] */
    public static function getJoueurs(): array
    {
        if (!is_file(self::CHEMIN)) {
            return [];
        }

        $contenu = file_get_contents(self::CHEMIN);
        if ($contenu === false || trim($contenu) === '') {
            return [];
        }

        $donnees = json_decode($contenu);
        if (!is_array($donnees)) {
            return [];
        }

        $joueurs = [];
        foreach ($donnees as $joueur) {
            if (!isset($joueur->nom, $joueur->dateNaissance) || !isset($joueur->positions) || !is_array($joueur->positions)) {
                continue;
            }

            $positions = [];
            foreach ($joueur->positions as $position) {
                if (is_string($position) && Position::tryFrom($position) !== null) {
                    $positions[] = Position::from($position);
                }
            }

            $joueurs[] = new Joueur(
                (string) $joueur->nom,
                (string) $joueur->dateNaissance,
                $positions
            );
        }

        return $joueurs;
    }

    /** @param Joueur[] $joueurs */
    public static function setJoueurs(array $joueurs): void
    {
        $donnees = array_map(
            static fn(Joueur $joueur): array => $joueur->prepareForJson(),
            $joueurs
        );

        $json = json_encode($donnees, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
        file_put_contents(self::CHEMIN, $json . PHP_EOL, LOCK_EX);
    }
}
