<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Gemeinde;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Helpinghand>
 */
class HelpinghandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(5);

        return 
            [      
                'user_id' => User::factory(),
                'gemeinde_id' => Gemeinde::factory(),
                'title' => $title,
                'title_slug' => Str::slug($title),
                'type' => $this->faker->word(),
                'canton' => $this->faker->randomElement(['AG', 'ZH', 'BE', 'BS', 'GR', 'LU', 'OW', 'NW']),
                'description' => $this->faker->sentence(10),
                'is_active' => true
            ]
        ;
    }
}
