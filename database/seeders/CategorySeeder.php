<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $categories = ['Entertainment', 'Educational', 'Science', 'Food', 'Research Paper', 'Adventure'];
    foreach ($categories as $cat) {
        \App\Models\Category::create([
            'name' => $cat,
            'slug' => \Str::slug($cat),
        ]);
    }
}

}
