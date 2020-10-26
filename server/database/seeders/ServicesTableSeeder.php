<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('services')->insert(array(
            array(
                'title' => 'Deep Clean',
                'details' => 'Remove all the dirt on your shoes',
                'image' => 'https://i.ibb.co/q9q6ZRK/deep-clean.jpg'
            ),
            array(
                'title' => 'Repaint',
                'details' => 'Refresh Your Shoes with Any Color You Like',
                'image' => 'https://i.ibb.co/TLLzxqT/repaint.jpg'
            ),
            array(
                'title' => 'Unyellowing',
                'details' => 'Back It White. Make It Shine',
                'image' => 'https://i.ibb.co/LSps0tk/unyellowing.jpg'
            ),
            array(
                'title' => 'Repair',
                'details' => 'Fix the Broken.',
                'image' => 'https://i.ibb.co/4YXfpxp/repair.jpg'
            )
        ));
    }
}