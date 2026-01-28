<?php

namespace Database\Seeders;

use App\Models\Galery;
use Illuminate\Database\Seeder;

class GalerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Galery::create([
            'name' => 'Modern Fade',
            'image' => 'test/gallery1.jpg',
        ]);
        Galery::create([
            'name' => 'Classic Pompadour',
            'image' => 'test/gallery1.jpg',
        ]);
        Galery::create([
            'name' => 'Undercut Style',
            'image' => 'test/gallery1.jpg',
        ]);
        Galery::create([
            'name' => 'Beard Grooming',
            'image' => 'test/gallery1.jpg',
        ]);
        Galery::create([
            'name' => 'Textured Cut',
            'image' => 'test/gallery1.jpg',
        ]);
        Galery::create([
            'name' => 'Color Treatment',
            'image' => 'test/gallery1.jpg',
        ]);
    }
}
