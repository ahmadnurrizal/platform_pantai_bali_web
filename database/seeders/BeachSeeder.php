<?php

namespace Database\Seeders;

use App\Models\Beach;
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
                'beach_location' => "Balilahh cok",
                'beach_description' => "ini ceritanya adalah descripsi tapi karena cuman dummy jadi isinya gini aja. gak papa kan. iya iyain aja"
            ]);
        }
    }
}
