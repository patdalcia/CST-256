<?php

namespace Database\Factories;

use App\Models\UserDemographic;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserDemographicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserDemographic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'gender'=> 'Male',
            'age' => '28',
            'education' => 'Highschool',
            'interests' => 'hard work',
            'country' => 'USA',
            'user_id'
        ];
    }
}
