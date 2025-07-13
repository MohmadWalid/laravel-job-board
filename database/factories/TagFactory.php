<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    protected $model = \App\Models\Tag::class;
    public function definition(): array
    {
        return [
            'id' => Str::uuid()->toString(),
            'title' => $this->faker->word(),
        ];
    }
}
