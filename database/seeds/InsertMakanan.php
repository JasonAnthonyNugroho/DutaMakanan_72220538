<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class InsertMakanan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i =0;$i<100;$i++){
            DB::table('makanan')->insert([
                'nama_makanan' => $faker->word(),
                'asal_daerah' => $faker->word(),
                'gizi' => $faker->word(),
                'kategori' => $faker->word(),
                'expired' => $faker->dateTime(),
                'deskripsi' => $faker->word()
            ]);
        }
    }
}
