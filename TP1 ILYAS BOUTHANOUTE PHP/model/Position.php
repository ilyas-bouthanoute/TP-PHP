<?php
declare(strict_types=1);

enum Position: string
{
    case GK = 'GK';
    case DF = 'DF';
    case MF = 'MF';
    case FW = 'FW';

    public function libelle(): string
    {
        return match ($this) {
            self::GK => 'Gardien',
            self::DF => 'Défenseur',
            self::MF => 'Milieu',
            self::FW => 'Attaquant',
        };
    }
}
