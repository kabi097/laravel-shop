<?php

use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function getImage() {
        $url = "https://loremflickr.com/1024/728/concert,crowd";
        $contents = file_get_contents($url);
        $name = 'seed-'.date('mdYHis') . uniqid() . '.jpg';
        Storage::put('public/products/'.$name, $contents);
        $image = imagecreatefromjpeg(storage_path('app/public/products/'.$name));
        $imgResized = imagescale($image , 300, 250);
        imagejpeg($imgResized, storage_path('app/public/products/'.basename($name, ".jpg").'-cropped.jpg'));
        return 'products/'.$name;
    }

    public function run()
    {
        Product::all()->each(function (Product $product) {
            $product->update([
                'images' => json_encode([
                    $this->getImage(),
                    $this->getImage(),
                    $this->getImage(),
                    $this->getImage()
                ])
            ]);
        });
    }
}
