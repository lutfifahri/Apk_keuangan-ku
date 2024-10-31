<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GajiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 1000) as $index) {
            DB::table('gaji')->insert([
                'name'          => $faker->jobTitle,
                'nilai'         => $faker->numberBetween(1000000, 10000000),
                'keterangan'    => $faker->sentence,
            ]);
        }

        // DB::table('gaji')->insert([
        //     [
        //         'name' => 'Gaji Pokok',
        //         'nilai' => 1000000,
        //         'keterangan' => 'Gaji dasar karyawan',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'name' => 'Tunjangan Kesehatan',
        //         'nilai' => 750000,
        //         'keterangan' => 'Tunjangan untuk kesehatan',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'name' => 'Bonus Tahunan',
        //         'nilai' => 2000000,
        //         'keterangan' => 'Bonus akhir tahun',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        // ]);
    }
}
