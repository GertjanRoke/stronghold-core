<?php

namespace GertjanRoke\Stronghold\Actions;

use GertjanRoke\Stronghold\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CreateFileAction
{
    /** @throws ValidationException */
    public function handle(UploadedFile $file, ?string $directory = '/', array $attributes = []): File
    {
        if (! $file->isValid()) {
            throw ValidationException::withMessages([
                'file' => 'File was not uploaded correctly',
            ]);
        }

        $attributes = Validator::validate($attributes, [
            'name' => ['nullable', 'string', 'max:190'],
            'filename' => ['nullable', 'string', 'max:190', 'regex:/\.[a-zA-Z+]/'],
        ]);

        if (isset($attributes['filename'])) {
            $path = $file->storeAs($directory, $attributes['filename']);
        } else {
            $path = $file->store($directory);
        }

        if ($path === false) {
            throw ValidationException::withMessages([
                'file' => 'Unable to store the file',
            ]);
        }

        $attributes['filename'] = basename($path);
        $attributes['path'] = '/' . Str::beforeLast($path, $attributes['filename']);

        return File::create($attributes);
    }
}
