<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Taj;
use App\Models\Guru;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Bidang;
use App\Models\Daftar;
use App\Models\Jabatan;
use App\Models\Student;
use App\Models\Category;
use App\Models\Identity;
use App\Models\Register;
use App\Models\Sambutan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder in smaller batches
        // DB::transaction(function () {
        //     Taj::factory()->create(['name' => '2024-2025', 'chief' => 'Murtaki Shihab']);
        // });

        // DB::transaction(function () {
        //     User::factory(5)->create();
        // });

        // DB::transaction(function () {
        //     Post::factory(10)->create();
        // });

        // DB::transaction(function () {
        //     Category::factory(5)->create();
        // });

        // DB::transaction(function () {
        //     Guru::factory(20)->create();
        // });

        // DB::transaction(function () {
        //     Mapel::factory(10)->create();
        // });

        // DB::transaction(function () {
        //     Student::factory(20)->create();
        // });

        // DB::transaction(function () {
        //     Sambutan::factory(1)->create();
        // });

        DB::transaction(function () {
            User::factory()->create([
                'name' => 'Murtaki',
                'username' => 'murtaki99',
                'email' => 'admin@gmail.com',
                'phone' => '082279761815',
                'password' => bcrypt('123'),
                'role' => 'admin',
            ]);
        });

        // $names = [
        //     'YAYASAN', 'PIMPINAN', 'KABAG TU', 'BENDAHARA', 'PENGASUH PUTRA',
        //     'PENGASUH PUTRI', 'KAMAD MAS', 'KAMAD MTS', 'BID PENDIDIKAN',
        //     'BID PRASARANA', 'BID KESISWAAN', 'BID KESEHATAN'
        // ];

        // foreach ($names as $name) {
        //     DB::transaction(function () use ($name) {
        //         Jabatan::factory()->create(['name' => $name]);
        //     });
        // }
    }

}
