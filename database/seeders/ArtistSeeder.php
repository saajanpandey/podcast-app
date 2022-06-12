<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artist::truncate();
        $artist1 = Artist::where('id', 1)->first();
        if (!isset($artist1)) {
            Artist::create([
                'id' => 1,
                'name' => 'Sanjay Silwal Gupta',
            ]);
        }
        $artist2 = Artist::where('id', 2)->first();
        if (!isset($artist2)) {
            Artist::create([
                'id' => 2,
                'name' => 'Sushant Pradhan',
            ]);
        }
        $artist3 = Artist::where('id', 3)->first();
        if (!isset($artist3)) {
            Artist::create([
                'id' => 3,
                'name' => 'Paradygm Podcasts',
            ]);
        }
        $artist4 = Artist::where('id', 4)->first();
        if (!isset($artist4)) {
            Artist::create([
                'id' => 4,
                'name' => 'ALL MIC',
            ]);
        }
    }
}
