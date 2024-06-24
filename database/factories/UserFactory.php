<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
     
        return [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'mobileNo' => $this->faker->numerify('##########'),
            'role' => 'admin',
            'password' => '$2a$04$gakgwa1pSu7thZ1aBgxxYO2RFaApGDQViGT2YnYubUMfDlPLBvSp2', // password admin#2021
            'remember_token' => Str::random(10),
        ];
    }
}
