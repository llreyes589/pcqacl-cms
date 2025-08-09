<?php

namespace Database\Seeders;

use App\Models\Bulletin;
use Illuminate\Database\Seeder;

class BulletinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bulletinItems = [
            [
                'title' => "2023-2025 Strategic Planning – Start the Year Right!",
                "featured_photo" => "https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs",
                "content" => "The Council's Officers and members of the Board of Trustees conducted their strategic planning for fiscal years 2024 and 2025. The first part was held in June 12-13, 2023 at the West Grove Resort Tanauan, Batangas and the final part was at the Espiritu's Farmhouse in Pulilan, Bulacan last February 11, 2024.",
                "category_id" => "Strategic Planning"
            ],
            [
                "title" => "Philippine Council for Quality Assurance in Clinical Laboratories (PCQACL) National Report for 2022",
                "featured_photo" => "https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs",
                "content" => "Educational activities: Back in 2021, we launched the free online webinars dubbed as 'P.O.W.E.R.' which stands for 'PCQACL Online Webinar Educational seRies', aimed to adapt to the challenges of the pandemic and support laboratory professionals by providing free continuing medical education and updates.",
                "category_id" => "Annual Report"
            ],
            [
                "title" => "Powerful free webinars from PCQACL's POWER series",
                "featured_photo" => "https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs",
                "content" => "Last year, one of the successful projects of PCQACL was the launch of PCQACL Academy Online Webinar Series or P.O.W.E.R. which aimed to provide free continuing medical education in the field of laboratory medicine. This year, POWER continued to do this through the help of industry partners.",
                "category_id" => "Education"
            ],
            [
                "title" => "Catching Up with the Race: New Recommendations on Estimating Glomerular Filtration Rate",
                "featured_photo" => "https://fastly.picsum.photos/id/62/200/200.jpg?hmac=IdjAu94sGce82DBYTMbOYzXr7kup1tYqdr0bHkRDWUs",
                "content" => "A Task Force formed by the National Kidney Foundation (NKF) and the American Society for Nephrology (ASN) recommends use of the CKD-EPI creatinine equation refit without the race variable across all laboratories in the United States in estimating glomerular filtration rate (eGFR).",
                "category_id" => "Clinical Updates",
            ]
        ];

        foreach ($bulletinItems as $item) {
            Bulletin::create($item);
        }
    }
}
