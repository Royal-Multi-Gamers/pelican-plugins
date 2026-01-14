<?php

namespace ServerStatus\PlayerCounter\Policies;

use App\Policies\DefaultAdminPolicies;

class GameQueryPolicy
{
    use DefaultAdminPolicies;

    protected string $modelName = 'game_query';
}
