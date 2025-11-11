<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Gemeinde;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(4);

        return [
            'title' => $title,
            'title_slug' => Str::slug($title),
            'user_id' => User::factory(),
            'gemeinde_id' => Gemeinde::factory(),
            'canton' => $this->faker->randomElement(['AG', 'ZH', 'BE', 'BS', 'GR', 'LU', 'OW', 'NW']),
            'description' => $this->faker->sentence(10),
            'image' => 'uploads/default_img_travel.png'
        ];
    }
}
