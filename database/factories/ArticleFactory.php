<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user' => $this->faker->name(),
            'title'=> $this->faker->sentence(),
            'paragraph' => $this->faker->paragraph(),
            'category' => $this->faker->word(),
            // 'user_id' => rand(1,2)
            // 'photo'=>$this->faker->image("https://picsum.photos/seed/picsum/200/300"),
        ];
    }
}
