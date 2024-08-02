<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => $this->faker->unique()->numerify('##############'),
            'ta_id' => $this->faker->numberBetween(1, 10), // Sesuaikan rentang angka sesuai dengan jumlah data di tabel tajs
            'nama' => $this->faker->name,
            'umur' => $this->faker->numberBetween(11, 18),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'asal_sekolah' => $this->faker->company,
            'npu' => $this->faker->unique()->numerify('##############'),
            'tahun_lulus' => $this->faker->numberBetween(2010, 2022),
            'nisn' => $this->faker->unique()->numerify('##############'),
            'nama_ayah' => $this->faker->name('male'),
            'nama_ibu' => $this->faker->name('female'),
            'nik_ayah' => $this->faker->unique()->numerify('##############'),
            'nik_ibu' => $this->faker->unique()->numerify('##############'),
            'desa' => $this->faker->citySuffix,
            'kecamatan' => $this->faker->citySuffix,
            'kabupaten' => $this->faker->city,
            'provinsi' => $this->faker->state,
            'status' => $this->faker->randomElement(['baru', 'pindahan']),
            'jenjang' => $this->faker->randomElement(['mts', 'ma']),
            'kelas' => $this->faker->randomElement(['I', 'II', 'III']),
            'kontak' => $this->faker->unique()->optional()->phoneNumber, // Kontak bisa null
            'email' => $this->faker->unique()->safeEmail,
            'image' => null,
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
