<?php

namespace GertjanRoke\Stronghold\Actions;

use Illuminate\Support\Collection;
use GertjanRoke\Stronghold\Models\File;
use GertjanRoke\Stronghold\Interfaces\ActionInterface;

class GetFilesAction implements ActionInterface
{
    public function handle(): Collection
    {
        return File::all();
    }
}
