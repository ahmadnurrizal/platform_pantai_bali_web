<?php

namespace Database\Seeders;

use App\Models\Beach;
use App\Models\Image;
use Illuminate\Database\Seeder;

class BeachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Beach::create([
                'beach_name' => "Pantai Pandawa",
                'beach_location' => "Jalan Pantai Pandawa, Desa Kutuh, Kecamatan Kuta Selatan, Kabupaten Badung, Provinsi Bali 80361.",
                'beach_description' => "Kebersihan pantai lumayan terjaga, serta ombak laut yang tenang. Saat anda menginjakan kaki di pasir pantai menghadap ke samudra Hindia. Anda akan melihat perpaduan warna yang sangat indah. Mulai dari warna pasir putih, warna air laut dipinggir pantai kehijauan dan semakin kedalam air laut berwarna biru."
            ]);
        }
    }
}
