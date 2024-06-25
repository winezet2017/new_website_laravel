<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private $categories = [
        'Technology', 'Health', 'Travel', 'Food', 'Lifestyle', 'Education', 'Finance', 'Entertainment', 'Sports', 'Science',
        'Art', 'Culture', 'Politics', 'History', 'Nature', 'Photography', 'Business', 'Books', 'Music', 'Movies'
    ];
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement($this->categories),
        ];
    }
}
