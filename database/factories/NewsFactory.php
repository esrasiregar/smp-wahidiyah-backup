<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(4);

        return [
            'title'        => $title,
            'slug'         => Str::slug($title) . '-' . Str::random(5),
            'cover_path'   => null, // bisa diisi saat upload nyata
            'content'      => $this->faker->paragraphs(5, true),
            'published_at' => $this->faker->dateTimeBetween('-1 month', '+1 week'),
        ];
    }
}