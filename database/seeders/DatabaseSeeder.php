<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Administrator;
use App\Models\Applications;
use App\Models\Customer;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = app(Generator::class);

        for($i = 1; $i <=30; $i++){
            User::create([
                'name' => $faker->name,
                'email' =>($i ==1) ? 'user@fmds.com' :$faker->safeEmail(),
                'dob'   => $faker->randomElement(['30/10/1998','23/02/1992','10/01.1982']),
                'address' =>$faker->address,
                'phone' => $faker->numerify('+679#######'),
                'gender'  => $faker->randomElement(['Male','Female']),
                'status' => 1,
                'email_verified_at' =>now(),
                'password' =>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            ]);
        }

        Administrator::create([
            'name' => 'Jhon Doe',
            'email' => 'admin@fmds.com',
            'phone' => '0123456789',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);
        $applications = [
            'Application for registration & practice licence (INTERNSHIP)',
            'Medical and Dental Annual Registration/License Renewal Form',
            'Medical and Dental Student Annual Registration ',
            'New dental and medical practitioners',
        ];
        
        foreach($applications as $ap){
            Applications::create([
                'name' => $ap
            ]);
        }

     
        $this->call(CountrySeeder::class);
    }
}
