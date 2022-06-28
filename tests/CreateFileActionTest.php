<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use GertjanRoke\Stronghold\Actions\CreateFileAction;

uses(RefreshDatabase::class);

beforeEach(function () {
    Storage::fake();

    $this->action = new CreateFileAction();
});

it('validates the give name', function ($name) {
    $attributes = ['name' => $name];

    $file = UploadedFile::fake()->image('avatar.jpg');

    $this->action->handle($file, '/', $attributes);
})
    ->throws(ValidationException::class)
    ->with([
        123456,
        str_repeat('a', 191),
    ]);

it('validates the give filename', function ($filename) {
    $attributes = ['filename' => $filename];

    $file = UploadedFile::fake()->image('avatar.jpg');

    $this->action->handle($file, '/', $attributes);
})
    ->throws(ValidationException::class)
    ->with([
        123456,
        str_repeat('a', 191),
        'basename.',
    ]);
