<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shipment;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Shipment::create([

            'tracking_number' => 'GRM-2026-000001',

            'product_name' => 'Laptop ASUS ROG',

            'origin_country' => 'China',

            'destination_country' => 'Indonesia',

            'origin_port' => 'Shanghai Port',

            'destination_port' => 'Belawan Port',

            'current_country' => 'Singapore',

            'current_port' => 'Port of Singapore',

            'container_number' => 'MSCU1234567',

            'status' => 'In Transit',

            'estimated_arrival' => '2026-07-20',

            'actual_arrival' => null,

        ]);

        Shipment::create([

            'tracking_number' => 'GRM-2026-000002',

            'product_name' => 'Samsung Monitor',

            'origin_country' => 'South Korea',

            'destination_country' => 'Indonesia',

            'origin_port' => 'Busan Port',

            'destination_port' => 'Tanjung Priok',

            'current_country' => 'Malaysia',

            'current_port' => 'Port Klang',

            'container_number' => 'TGHU9988776',

            'status' => 'In Transit',

            'estimated_arrival' => '2026-07-24',

            'actual_arrival' => null,

        ]);

        Shipment::create([

            'tracking_number' => 'GRM-2026-000003',

            'product_name' => 'iPhone 17 Pro',

            'origin_country' => 'Japan',

            'destination_country' => 'Indonesia',

            'origin_port' => 'Tokyo Port',

            'destination_port' => 'Belawan Port',

            'current_country' => 'Japan',

            'current_port' => 'Tokyo Port',

            'container_number' => 'OOLU7654321',

            'status' => 'Pending',

            'estimated_arrival' => '2026-07-28',

            'actual_arrival' => null,

        ]);
    }
}