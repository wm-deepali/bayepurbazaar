<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Listing;

class ListingSeeder extends Seeder
{
    public function run(): void
    {

        Listing::insert([

            [
                'location_id' => 1,
                'category_id' => 1,
                'sub_category_id' => null,
                'business_name' => 'राम किराना स्टोर',
                'address' => 'मुख्य बाजार, बयेपुर, गाजीपुर',
                'mobile' => '9876543210',
                'email' => 'ramkirana@gmail.com',
                'whatsapp' => '9876543210',
                'short_description' => 'सभी प्रकार के घरेलू सामान, अनाज, मसाले और रोज़मर्रा की चीज़ें उपलब्ध।',
                'services' => 'किराना सामान, होम डिलीवरी',
                'working_hours' => '8:00 AM - 9:00 PM',
                'closed_days' => json_encode(['Sunday']),
                'website' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'location_id' => 1,
                'category_id' => 2,
                'sub_category_id' => null,
                'business_name' => 'बयेपुर हेल्थ क्लिनिक',
                'address' => 'नया मोहल्ला, बयेपुर',
                'mobile' => '9456123789',
                'email' => 'clinic@gmail.com',
                'whatsapp' => '9456123789',
                'short_description' => 'डॉ. अजय सिंह द्वारा संचालित क्लिनिक। सामान्य चिकित्सा और टीकाकरण सेवा।',
                'services' => 'जनरल चेकअप, ब्लड टेस्ट',
                'working_hours' => '8:00 AM - 10:00 PM',
                'closed_days' => json_encode([]),
                'website' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'location_id' => 1,
                'category_id' => 3,
                'sub_category_id' => null,
                'business_name' => 'शिव कृषि उपकरण केंद्र',
                'address' => 'बयेपुर रोड, गाजीपुर',
                'mobile' => '9988776655',
                'email' => 'shivagri@gmail.com',
                'whatsapp' => '9988776655',
                'short_description' => 'ट्रैक्टर, स्प्रेयर, हार्वेस्टर और सभी कृषि मशीनरी उपलब्ध।',
                'services' => 'कृषि मशीनरी बिक्री और किराया',
                'working_hours' => '9:00 AM - 7:00 PM',
                'closed_days' => json_encode(['Tuesday']),
                'website' => 'https://shivagri.com',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'location_id' => 1,
                'category_id' => 4,
                'sub_category_id' => null,
                'business_name' => 'राज मोबाइल शॉप',
                'address' => 'मुख्य चौराहा, बयेपुर',
                'mobile' => '9123456780',
                'email' => 'rajmobile@gmail.com',
                'whatsapp' => '9123456780',
                'short_description' => 'मोबाइल रिपेयर, नए स्मार्टफोन और एक्सेसरीज़ उपलब्ध।',
                'services' => 'मोबाइल रिपेयर, स्क्रीन बदलना',
                'working_hours' => '10:00 AM - 9:00 PM',
                'closed_days' => json_encode(['Monday']),
                'website' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'location_id' => 1,
                'category_id' => 5,
                'sub_category_id' => null,
                'business_name' => 'श्री सैलून एंड ब्यूटी',
                'address' => 'बाजार रोड, बयेपुर',
                'mobile' => '9012345678',
                'email' => null,
                'whatsapp' => '9012345678',
                'short_description' => 'हेयर कट, शेविंग, फेशियल और ब्यूटी सर्विसेस।',
                'services' => 'हेयर कट, फेशियल, ब्यूटी ट्रीटमेंट',
                'working_hours' => '9:00 AM - 8:00 PM',
                'closed_days' => json_encode(['Wednesday']),
                'website' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

    }
}