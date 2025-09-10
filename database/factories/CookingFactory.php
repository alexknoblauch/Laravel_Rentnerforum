<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cooking>
 */
class CookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

            $title = $this->faker->words(4, true);

        return [
            'title' => $title,
            'title_slug' => Str::slug($title),
            'duration' => $this->faker->randomElement([15, 20, 25, 30, 35, 40, 45, 50, 55, 60]),
            'description' => $this->faker->paragraph(4),
            'user_id' => User::factory(),
            'image' => 'uploads/kochen.png'
        ];
    }
}
