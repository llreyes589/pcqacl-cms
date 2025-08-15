<?php

namespace Database\Seeders;

use App\Models\Officer;
use App\Models\OfficerYear;
use Illuminate\Database\Seeder;

class OfficersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $officers = [
            [
                "name" => 'Bernadette R. Espiritu, MD, FPSP',
                "position" => 'President',
                'year' => '2025',
                'display_photo' => 'https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs'
            ],
            [
                "name" => 'Rommel F. Saceda, RMT, MBA',
                "position" => 'Vice President',
                'year' => '2025',
                'display_photo' => 'https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs'
            ],
            [
                "name" => 'Estela Marie C. Tanchoco, MD, FPSP',
                "position" => 'Secretary',
                'year' => '2025',
                'display_photo' => 'https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs'
            ],
            [
                "name" => 'Josefina S. Soriano, RMT',
                "position" => 'Treasurer',
                'year' => '2025',
                'display_photo' => 'https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs'
            ],
            [
                "name" => 'James Peter S. Aznar, MD, FPSP',
                "position" => 'P.R.O',
                'year' => '2025',
                'display_photo' => 'https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs'
            ],
            [
                "name" => 'Lauri Anne M. Reyes, RMT',
                "position" => 'Assistant Secretary',
                'year' => '2025',
                'display_photo' => 'https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs'
            ],
            [
                "name" => 'Millicent C. Lumabao, RMT',
                "position" => 'Assistant Treasurer',
                'year' => '2025',
                'display_photo' => 'https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs'
            ],
        ];

        foreach ($officers as $officer) {
            Officer::create([
                'year_id' => OfficerYear::select('id')->where('year', '=', $officer['year'])->first()['id'],
                'name' => $officer['name'],
                'position' => $officer['position'],
                'display_photo' => $officer['display_photo'],
            ]);
        }
    }
}
