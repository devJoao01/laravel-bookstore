<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 6; $i++) {
            DB::table('bookstore')->insert([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'isbn' => $faker->unique()->numerify('###-#-####-###-#'),
                'publisher' => $faker->company,
                'publication_year' => $faker->year,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
