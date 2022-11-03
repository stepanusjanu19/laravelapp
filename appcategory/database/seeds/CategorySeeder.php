<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('category')->insert([
        //     'name' => 'furniture',
        //     'is_publish' => true,
        // ]);
        $count = 100;
        factory(Category::class, $count)->create();
    }
}
