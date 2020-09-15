<?php

use Faker\Factory;
use App\User;
use Illuminate\Database\Seeder;

class DummyUsers extends DatabaseSeeder
{

    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 50; $i++) {
            $user = Sentinel::registerAndActivate([
                'email'     => $faker->unique()->email,
                'password'    => "password",
                'first_name' => $faker->unique()->firstName,
                'last_name' => $faker->unique()->lastName,
                'country'     => $faker->countryCode,
                'created_at' => $faker->dateTimeThisYear(),
            ]);

            $user->roles()->attach(Sentinel::findRoleById(rand(1, 2)));
        }
    }
}
