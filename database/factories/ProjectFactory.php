<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'name' => fake()->words(3, true),
      'description' => fake()->paragraph(),
      // 'main_image' => fake()->imageUrl(360, 360, 'animals', true),
      'release_date' => fake()->dateTimeInInterval('-6months', '+6months'),
      'repo_link' => fake()->url(),
    ];
  }
}