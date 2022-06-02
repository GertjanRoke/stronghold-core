<?php

namespace GertjanRoke\Stronghold\Commands;

use Illuminate\Console\Command;

class StrongholdCommand extends Command
{
    public $signature = 'stronghold-core';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
