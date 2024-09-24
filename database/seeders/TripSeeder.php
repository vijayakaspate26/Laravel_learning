<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\Trip;
class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Retrieve destination IDs for the trips using Eloquent
        $mumbai_id = Destination::where('destination_name', 'Mumbai')->value('id');
        $pune_id = Destination::where('destination_name', 'Pune')->value('id');
        $solapur_id = Destination::where('destination_name', 'Solapur')->value('id');
        $latur_id = Destination::where('destination_name', 'Latur')->value('id');

        // Seed trip data using Eloquent
        Trip::create([
            'destination_id' => $pune_id,
            'trip_name' => 'Mumbai to Pune',
            'prize' => 500.00,
            'active' => true,
        ]);

        Trip::create([
            'destination_id' => $solapur_id,
            'trip_name' => 'Mumbai to Solapur',
            'prize' => 700.00,
            'active' => true,
        ]);

        Trip::create([
            'destination_id' => $latur_id,
            'trip_name' => 'Pune to Latur',
            'prize' => 800.00,
            'active' => true,
        ]);

        Trip::create([
            'destination_id' => $solapur_id,
            'trip_name' => 'Pune to Solapur',
            'prize' => 650.00,
            'active' => true,
        ]);
    

    }
}
