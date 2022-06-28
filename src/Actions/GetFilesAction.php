<?php

namespace GertjanRoke\Stronghold\Actions;

use GertjanRoke\Stronghold\Interfaces\ActionInterface;
use GertjanRoke\Stronghold\Models\File;
use Illuminate\Support\Collection;

class GetFilesAction implements ActionInterface
{
    public function handle(): Collection
    {
        return File::all();
    }
}
