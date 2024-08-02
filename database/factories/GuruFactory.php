<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'slug' => Str::slug($this->faker->name), // Menambahkan pembuatan slug dari nama
            'pendidikan' => $this->faker->sentence, // Menambahkan data pendidikan
            'mulai_mengajar' => $this->faker->date(), // Menambahkan data mulai mengajar
            'deskripsi' => $this->faker->paragraph,
        ];
    }
}
