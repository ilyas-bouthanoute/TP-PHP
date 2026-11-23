<?php
declare(strict_types=1);

require_once __DIR__ . '/Position.php';

class Joueur
{
    public function __construct(
        private string $nom,
        private string $dateNaissance,
        private array $positions
    ) {}

    public function getNom(): string { return $this->nom; }
    public function getDateNaissance(): string { return $this->dateNaissance; }
    public function getPositions(): array { return $this->positions; }

    public function setNom(string $nom): void { $this->nom = $nom; }
    public function setDateNaissance(string $dateNaissance): void { $this->dateNaissance = $dateNaissance; }
    public function setPositions(array $positions): void { $this->positions = $positions; }

    public function prepareForJson(): array
    {
        return [
            'nom' => $this->nom,
            'dateNaissance' => $this->dateNaissance,
            'positions' => array_map(
                static fn(Position $position): string => $position->value,
                $this->positions
            ),
        ];
    }
}
