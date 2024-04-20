<?php

namespace Database\Factories;
use app\Models\Project;

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
    
     protected $model = Project::class;

     public function definition()
     {
         return [
             'description' => $this->faker->paragraph,
             'feasibility_study' => $this->faker->paragraph,
             'amount' => $this->faker->numberBetween(1000, 10000),
             'location' => $this->faker->address,
             'investor_id' => random_int(1, 10), // استخدام قيمة عشوائية مباشرة
             'user_id' => random_int(1, 10), // استخدام قيمة عشوائية مباشرة
             'type_id' => random_int(1, 5), // استخدام قيمة عشوائية مباشرة
             // يمكنك استخدام القيم العشوائية الخاصة بك للحقول الأخرى
         ];
     }
// $factory->define(Project::class, function (Faker $faker) {
//     return [
//         'description' => $faker->paragraph,
//         'feasibility_study' => $faker->paragraph,
//         'amount' => $faker->numberBetween(1000, 10000),
//         'location' => $faker->address,
//         'investor_id' => function () {
//             return factory(App\Models\Investor::class)->create()->id;
//         },
//         'user_id' => function () {
//             return factory(App\Models\User::class)->create()->id;
//         },
//         'type_id' => function () {
//             return factory(App\Models\Type::class)->create()->id;
//         },
//     ];
// });
}
