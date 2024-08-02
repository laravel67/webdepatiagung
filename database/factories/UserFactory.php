<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create();
        return [
            'name' => $faker->name,
            'username' => function () use ($faker) {
                $username = Str::of($faker->name)->explode(' ')[0] . Str::of($faker->name)->explode(' ')[1];
                // Periksa apakah username sudah ada dalam database
                while (User::where('username', $username)->exists()) {
                    // Jika sudah ada, buat ulang username baru
                    $username = Str::of($faker->name)->explode(' ')[0] . Str::of($faker->name)->explode(' ')[1];
                }
                return $username;
            },
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber,
            'email_verified_at' => now(),
            'role' => $faker->randomElement(['user', 'admin']),
            'password' => bcrypt('password'), // Gunakan bcrypt untuk mengenkripsi password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
