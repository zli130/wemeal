<?php

use Illuminate\Database\Seeder;

use Faker\Factory;

use App\Provider;

use App\Meal;

use App\Category;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Provider::truncate();

        Category::truncate();

        Meal::truncate();

        foreach (range(1,20) as $i) {
            $provider = Provider::create([

                'user_id' => mt_rand(1,2),

                'name' => $faker->sentence,

                'description' => $faker->paragraph(mt_rand(2,5)),

                'image' => 'test_provider.png',

                'active' => 1,
                
                'owner' => $faker->name,

                'address' => $faker->address,

                'phone' => $faker->tollFreePhoneNumber,

                'weekday' => mt_rand(0,6),

            ]);

            foreach (range(1, mt_rand(3,12)) as $j) {
                $category = Category::create([
                    'provider_id' => $provider->id,

                    'name' => $faker->word,

                    'description' => $faker->paragraph(mt_rand(2,3)),

                    'active' => 1,
                ]);

                foreach (range(1, mt_rand(5,10)) as $m) {
                    Meal::create([

                        'category_id' => $category->id,

                        'provider_id' => $provider->id,

                        'name' => $faker->word,

                        'description' => $faker->paragraph(mt_rand(2,3)),

                        'active' => 1,

                        'image' => 'test_meal.png',

                        'price' => '11.99',
                    ]);
                }
            }
        }
    }
}
