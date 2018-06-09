<?php

use App\Product;

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 product
        $product = new Product([
          'imagePath' => '/images/dring.png',
          'title' => 'Coffee Chocalate',
          'description' => 'Some quick example text to build on the card title and make up the bulk of the card content.',
          'price' => 10
        ]);

        $product->save();

        // 2 product
        $product = new Product([
          'imagePath' => '/images/text.png',
          'title' => 'Chocalate drink',
          'description' => 'Some quick example text to build on the card title and make up the bulk of the card content.',
          'price' => 30
        ]);

        $product->save();

        // 3 product
        $product = new Product([
          'imagePath' => '/images/newchoco.png',
          'title' => 'Chocalate',
          'description' => 'Some quick example text to build on the card title and make up the bulk of the card content.',
          'price' => 20
        ]);

        $product->save();

        // 4 product
        $product = new Product([
          'imagePath' => '/images/text.png',
          'title' => 'Chocalate drink',
          'description' => 'Some quick example text to build on the card title and make up the bulk of the card content.',
          'price' => 30
        ]);

        $product->save();

        // 5 product
        $product = new Product([
          'imagePath' => '/images/dring.png',
          'title' => 'Coffee Chocalate',
          'description' => 'Some quick example text to build on the card title and make up the bulk of the card content.',
          'price' => 10
        ]);

        $product->save();

        // 6 product
        $product = new Product([
          'imagePath' => '/images/newchoco.png',
          'title' => 'Chocalate',
          'description' => 'Some quick example text to build on the card title and make up the bulk of the card content.',
          'price' => 20
        ]);

        $product->save();
    }
}
