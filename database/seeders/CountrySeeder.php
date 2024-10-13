<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $countries = json_decode(File::get(base_path('database/data/countries.json')), true);
            $locations = json_decode(File::get(base_path('database/data/locations.json')), true);

            $associativeLocationsArray = [];

            foreach ($locations as $location) {
                $associativeLocationsArray[$location['code']] = $location;
            }
            

            foreach ($countries as $key => $country) {
                Country::insertGetId([
                    'name'=>$country['Name'],
                    'lat'=>isset($associativeLocationsArray[$country['ISO2']])?$associativeLocationsArray[$country['ISO2']]['lat']:"",
                    'lng'=>isset($associativeLocationsArray[$country['ISO2']])?$associativeLocationsArray[$country['ISO2']]['lng']:"",
                    'iso2'=>$country['ISO2'],
                    'iso3'=>$country['ISO3'],
                    'phone_code'=>$country['Phone Code'],
                    'timezone'=>$country['Time'],
                    'languages'=>$country['Languages']
                ]);
            }
    }
}
