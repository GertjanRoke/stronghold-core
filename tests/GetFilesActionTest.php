<?php

use GertjanRoke\Stronghold\Actions\GetFilesAction;
use GertjanRoke\Stronghold\Models\File;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;

uses(RefreshDatabase::class);

beforeEach(fn () => $this->action = new GetFilesAction());

it('will return a list of files', function () {
    File::factory(2)->create();

    $files = $this->action->handle();

    expect($files)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(2)
        ->each(fn ($file) => $file->toBeInstanceOf(File::class));
});

it('fetches the data from the database', function () {
    $dbFiles = File::factory(2)->create()->fresh();

    $files = $this->action->handle();

    expect($files)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(2)
        ->each(
            fn ($file) => $file
                ->toBeInstanceOf(File::class)
                ->when($file->id === 1, fn () => $file->toEqual($dbFiles->first()))
                ->when($file->id === 2, fn () => $file->toEqual($dbFiles->last()))
        );
});
