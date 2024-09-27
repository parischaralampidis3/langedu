<?php

namespace Database\Factories;
use App\Models\Students;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentsFactory extends Factory

{
    protected $model = Students::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'username' =>$this->faker->username(),
            'firstname'=>$this->faker->firstname(),
            'lastname'=>$this->faker->lastname(),
            'email'=>$this->faker->email(),
            'is_active'=>$this->faker->boolean(),
            'dob'=>$this->faker->date(),
           

            //
        ];
    }
}
