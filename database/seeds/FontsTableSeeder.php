<?php

use Illuminate\Database\Seeder;
use App\Models\Font;

class FontsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Font::class)->create(['name' => '英椎行書', 'slug' => 'acgyosyo']);
        factory(Font::class)->create(['name' => '英椎楷書', 'slug' => 'ackaisyo']);
    }
}
