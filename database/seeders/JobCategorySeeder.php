<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Development',
            'Design',
            'Marketing',
            'Sales',
            'Ai',
            'Data Science',
            'Customer Support',
        ];

        foreach($categories as $category){
            JobCategory::create([
                'title' => $category,
                'slug' => Str::slug( $category ),
            ]);
        }

    }
}
