<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition()
    {
        Storage::deleteDirectory('public/images/posts');
        Storage::makeDirectory('public/images/posts');

        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->text(),
            'url_image' => $this->faker->imageUrl(640, 480, null, true)
        ];
    }
}
