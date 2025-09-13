<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $features = [
            ['name' => '60+ hours of video content', 'icon' => 'fas fa-video text-brand-orange', 'order_no' => 1],
            ['name' => '25 downloadable resources', 'icon' => 'fas fa-file-alt text-brand-blue', 'order_no' => 2],
            ['name' => 'Lifetime access', 'icon' => 'fas fa-infinity text-purple-600', 'order_no' => 3],
            ['name' => 'Access on mobile and TV', 'icon' => 'fas fa-mobile-alt text-red-600', 'order_no' => 4],
            ['name' => 'Certificate of completion', 'icon' => 'fas fa-certificate text-yellow-500', 'order_no' => 5],
            ['name' => 'Live Q&A sessions', 'icon' => 'fas fa-users text-green-500', 'order_no' => 6],
            ['name' => '1-on-1 mentorship', 'icon' => 'fas fa-comments text-brand-blue', 'order_no' => 7],
        ];

        foreach ($features as $feature) {
            \App\Models\FeatureMaster::create($feature);
        }
    }
}
