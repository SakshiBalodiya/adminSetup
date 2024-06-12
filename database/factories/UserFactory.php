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
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'username' => $this->faker->unique()->userName(),
            'role' => $this->faker->randomElement(['admin', 'subadmin', 'staff']),
            'password' => '$2a$04$gakgwa1pSu7thZ1aBgxxYO2RFaApGDQViGT2YnYubUMfDlPLBvSp2', // password admin#2024
            'remember_token' => Str::random(10),
        ];
    }
}
