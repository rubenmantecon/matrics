<?php

namespace Database\Factories;

use App\Models\Term;
use App\Models\Career;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CareerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Career::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'term_id' => Term::inRandomOrder()->value('id') ?: Term::factory(),
            'code' => $this->faker->postcode,
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'hours' => $this->faker->numberBetween($min = 1000, $max = 3000),
            'start' => now(),
            'end' =>  date('Y-m-d', $this->faker->date('now', '+1 years'))
        ];
    }
}
