<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VolunteerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'national_id' => rand(1254525215,1265452545),
            'correct' => rand(1,7),
            'week_number' => rand(1,4),
            'is_win' => rand(0,1),
            'answer' => '[{"السؤال 2 | الإسبوع 3":"السؤال 2 | الإسبوع 3 | الاجابة 1"},{"السؤال 7 | الإسبوع 3":"السؤال 7 | الإسبوع 3 | الاجابة 4"},{"السؤال 3 | الإسبوع 3":"السؤال 3 | الإسبوع 3 | الاجابة 2"},{"السؤال 6 | الإسبوع 3":"السؤال 6 | الإسبوع 3 | الاجابة 4"},{"السؤال 4 | الإسبوع 3":"السؤال 4 | الإسبوع 3 | الاجابة 3"},{"السؤال 5 | الإسبوع 3":"السؤال 5 | الإسبوع 3 | الاجابة 2"},{"السؤال 1 | الإسبوع 3":"السؤال 1 | الإسبوع 3 | الاجابة 4"}]',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => $this->faker->name,
                'national_id' => rand(1254525215,1265452545),
                'correct' => rand(1,7),
                'week_number' => rand(1,4),
                'is_win' => rand(0,1),
                'answer' => '[{"السؤال 2 | الإسبوع 3":"السؤال 2 | الإسبوع 3 | الاجابة 1"},{"السؤال 7 | الإسبوع 3":"السؤال 7 | الإسبوع 3 | الاجابة 4"},{"السؤال 3 | الإسبوع 3":"السؤال 3 | الإسبوع 3 | الاجابة 2"},{"السؤال 6 | الإسبوع 3":"السؤال 6 | الإسبوع 3 | الاجابة 4"},{"السؤال 4 | الإسبوع 3":"السؤال 4 | الإسبوع 3 | الاجابة 3"},{"السؤال 5 | الإسبوع 3":"السؤال 5 | الإسبوع 3 | الاجابة 2"},{"السؤال 1 | الإسبوع 3":"السؤال 1 | الإسبوع 3 | الاجابة 4"}]',
            ];
        });
    }
}
