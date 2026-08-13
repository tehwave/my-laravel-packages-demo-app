<?php

namespace App\Achievements;

use tehwave\Achievements\Achievement;

class PackageExplorer extends Achievement
{
    public $name = 'Package Explorer';

    public $description = 'Unlocked an achievement in a real Laravel application.';

    public $icon = '🏆';

    /** @return array{surface: string} */
    public function toDatabase(): array
    {
        return ['surface' => 'achievements-demo'];
    }
}
