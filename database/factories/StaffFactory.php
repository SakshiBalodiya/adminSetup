<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {    
        $users = User::all()->pluck('id')->toArray();
        return [
            'userId'=>$this->faker->unique()->randomElement($users),
            'image' => $this->faker->image(null, 360, 360, 'people', true),
            'descriptor' => 'xyz',
        ];
    }
}
