<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destination;
class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Destination::create(['destination_name' => 'Mumbai']);
        Destination::create(['destination_name' => 'Pune']);
        Destination::create(['destination_name' => 'Solapur']);
        Destination::create(['destination_name' => 'Latur']);
    }
}
