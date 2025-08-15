<?php

namespace Database\Seeders;

use App\Models\BoardOfTrustee;
use App\Models\OfficerYear;
use Illuminate\Database\Seeder;

class BoardOfTrusteesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bot = [
            [
                "name" => 'Godwin N. Hernaez, MD, FPSP',
                "order" => '1',
                'year' => '2025',
                'display_photo' => 'https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs'
            ],
            [
                "name" => 'Paulo Enrico P. Belen, MD, DPSP',
                "order" => '2',
                'year' => '2025',
                'display_photo' => 'https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs'
            ],
            [
                "name" => 'Rodelio D. Lim, MD, FPSP',
                "order" => '3',
                'year' => '2025',
                'display_photo' => 'https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs'
            ],
            [
                "name" => 'Monserrat S. Chichioco, MD, FPSP',
                "order" => '4',
                'year' => '2025',
                'display_photo' => 'https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs'
                
            ],
            [
                "name" => 'Jonathan Z. Oblefias, MD, FPSP',
                "order" => '5',
                'year' => '2025',
                'display_photo' => 'https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs'
            ],
            [
                "name" => 'Rudolp D. Abiba, MD, DPSP',
                "order" => '6',
                'year' => '2025',
                'display_photo' => 'https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs'
            ],
            [
                "name" => 'Benzon C. Pisico',
                "order" => '7',
                'year' => '2025',
                'display_photo' => 'https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs'
            ],
        ];

        foreach ($bot as $board) {
            BoardOfTrustee::create([
                'year_id' => OfficerYear::select('id')->where('year', '=', $board['year'])->first()['id'],
                'name' => $board['name'],
                'order' => $board['order'],
                'display_photo' => $board['display_photo'],
            ]);
        }
    }
}
