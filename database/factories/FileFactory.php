<?php

namespace GertjanRoke\Stronghold\Database\Factories;

use GertjanRoke\Stronghold\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FileFactory extends Factory
{
    protected $model = File::class;

    public function definition(): array
    {
        $path = $this->faker->filePath();
        $filename = basename($path) . '.jpg';

        return [
            'name' => $this->faker->realText(20),
            'filename' => $filename,
            'path' => Str::beforeLast($path, $filename),
        ];
    }
}
