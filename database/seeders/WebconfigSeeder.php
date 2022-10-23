<?php

namespace Database\Seeders;

use App\Models\Config\WebConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebconfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebConfig::create([
            'name'  => 'app_name',
            'label' => 'Application Name',
            'value' => 'LARACOURSE',
            'type'  => 0
        ]);

        WebConfig::create([
            'name'  => 'app_logo',
            'label' => 'Logo',
            'type'  => 2
        ]);
    }
}
