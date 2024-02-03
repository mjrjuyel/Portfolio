<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Service;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ser_title'=>fake()->userName(),
            'ser_detail'=>fake()->paragraph(),
            'ser_icon'=>'fas fa-laptop-code',
            'ser_creator'=>1,
            'ser_slug'=>'ser-'.uniqId(),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ];
    }
}
