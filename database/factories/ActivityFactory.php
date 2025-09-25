<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(4);

        return [
            'title'      => $title,
            'slug'       => Str::slug($title) . '-' . Str::random(5),
            'cover_path' => null, // nanti diisi saat upload cover
            'content'    => $this->faker->paragraphs(5, true),
            'event_date' => $this->faker->dateTimeBetween('-2 months', '+2 weeks'),
        ];
    }
}
