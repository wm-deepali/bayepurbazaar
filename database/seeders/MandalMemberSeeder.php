<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MandalMember;

class MandalMemberSeeder extends Seeder
{
    public function run(): void
    {

        MandalMember::insert([

            [
                'mandal_id' => 1,
                'name' => 'राहुल सिंह',
                'designation' => 'अध्यक्ष',
                'mobile' => '9876543210',
                'whatsapp' => '9876543210',
                'email' => 'rahul@example.com',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'mandal_id' => 1,
                'name' => 'अमित कुमार',
                'designation' => 'उपाध्यक्ष',
                'mobile' => '9123456789',
                'whatsapp' => '9123456789',
                'email' => 'amit@example.com',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'mandal_id' => 1,
                'name' => 'सौरभ यादव',
                'designation' => 'सचिव',
                'mobile' => '9988776655',
                'whatsapp' => '9988776655',
                'email' => 'saurabh@example.com',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'mandal_id' => 2,
                'name' => 'सुनीता देवी',
                'designation' => 'अध्यक्ष',
                'mobile' => '9456123789',
                'whatsapp' => '9456123789',
                'email' => 'sunita@example.com',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'mandal_id' => 2,
                'name' => 'रेखा यादव',
                'designation' => 'सचिव',
                'mobile' => '9871234567',
                'whatsapp' => '9871234567',
                'email' => 'rekha@example.com',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'mandal_id' => 3,
                'name' => 'रामप्रसाद यादव',
                'designation' => 'अध्यक्ष',
                'mobile' => '9765432109',
                'whatsapp' => '9765432109',
                'email' => 'ramprasad@example.com',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'mandal_id' => 4,
                'name' => 'अनिल गुप्ता',
                'designation' => 'अध्यक्ष',
                'mobile' => '9988771122',
                'whatsapp' => '9988771122',
                'email' => 'anil@example.com',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

    }
}
