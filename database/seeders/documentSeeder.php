<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Dom\Document;
use Illuminate\Database\Seeder;

class documentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Document::create([
            'name' => 'Barangay Clearance',
            'description' => 'Official certification of residency',
            'requirements' => "1. Valid ID\n2. Proof of Residency",
            'fee' => 50.00,
            'processing_days' => 3
        ]);
    
        Document::create([
            'name' => 'Business Permit',
            'description' => 'Permission to operate business in the barangay',
            'requirements' => "1. Business Plan\n2. Valid ID\n3. Lease Agreement",
            'fee' => 300.00,
            'processing_days' => 5
        ]);
    }
}
