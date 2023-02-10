<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(7)->create();
        $photos = [
            "https://picsum.photos/seed/picsum/200/300",
        ];
        $profiles = [
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMIee3IzbiO_J9HxIWdzUTff0B2dn3noYOj3g6pIZsuw&s"
        ];
        foreach($photos as $photo){
            \App\Models\Article::factory(7)->create([
                "photo" => $photo,
            ]);
        }
     
            \App\Models\Photo::factory(1)->create([
                'photo' => "https://picsum.photos/seed/picsum/200/300",
            ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
