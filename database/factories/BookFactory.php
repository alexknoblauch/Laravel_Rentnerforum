<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;  

    public function definition(): array
    {
        $title = $this->faker->sentence(4);
        $authorId = rand(1, 10);

        return [
            'title' => $title,
            'title_slug' => Str::slug($title),
            'seiten' => $this->faker->randomElement([100, 200, 150, 250, 300]),
            'cathegory' => $this->faker->randomElement(['Krimi', 'Roman', 'Biografie', 'Ratgeber', 'Geschichte', 'Wissenschaft', 'Natur', 'Philosofie']),
            'author_id' => $authorId,
            'description' => $this->faker->paragraph(3),
            'image' => 'uploads/default_img_buch.jpg',
        ];
    }
}
