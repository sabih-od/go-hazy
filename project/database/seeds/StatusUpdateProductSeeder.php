<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class StatusUpdateProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('slug', 'womens-fashion')->first();
        $category2 = Category::where('slug', 'mens-fashion')->first();
        $subCategory = Subcategory::where('slug', 'womens-fashion')->first();
        $subCategory1 = Subcategory::where('slug', 'womens-underwear')->first();
        $subCategory4 = Subcategory::where('slug', 'women-fashion-accessories')->first();
        $subCategory5 = Subcategory::where('slug', 'hot-sale')->first();


        if ($subCategory) {
            Product::where('subcategory_id', $subCategory->id)->update(['status' => 1]);
            $childCategory = Childcategory::where('subcategory_id', $subCategory->id)->where('slug', 'dresses')->update(['slug' => 'women-fashion-dresses']);
        }

        if ($subCategory1) {
            Product::where('subcategory_id', $subCategory1->id)->update(['status' => 1]);
        }

        if ($category) {
            $subCategory3 = Subcategory::where('category_id', $category->id)->where('name', 'Accessories')->update(['slug' => 'women-fashion-accessories']);
            $subCategory4 = Childcategory::where('subcategory_id', $subCategory4->id)->where('name', 'Belts')->update(['slug' => 'women-fashion-belts']);

        }

        if ($subCategory5) {
            $subCategory4 = Childcategory::where('subcategory_id', $subCategory5->id)->where('name', 'Hoodies & Sweatshirts')->update(['slug' => 'hot-sale-Hoodies & Sweatshirts']);

        }

        if ($category2) {
            Subcategory::where('category_id', $category2->id)->where('name', 'Accessories')->update(['slug' => 'mens-fashion-accessories']);
            $subCategory6 = Subcategory::where('slug', 'mens-fashion-accessories')->first();
            Childcategory::where('subcategory_id', $subCategory6->id)->where('name', 'Baseball Caps')->update(['slug' => 'mens-fashion-accessories-baseball-caps']);
            Subcategory::where('category_id', $category2->id)->where('name', 'Bottoms')->update(['slug' => 'mens-fashion-bottoms']);
            $subCategory7 = Subcategory::where('slug', 'mens-fashion-bottoms')->first();
            Childcategory::where('subcategory_id', $subCategory7->id)->where('name', 'Jeans')->update(['slug' => 'mens-fashion-bottoms-Jeans']);
            Childcategory::where('subcategory_id', $subCategory7->id)->where('name', 'Shorts')->update(['slug' => 'mens-fashion-bottoms-shorts']);
            Subcategory::where('name', 'Novelty & Special Use')->where('slug', 'novelty-special-use')->update(['status' => 0]);
            $subCategory8 = Subcategory::where('category_id', $category2->id)->where('slug', 'outerwear-jackets')->first();
            Childcategory::where('subcategory_id', $subCategory8->id)->where('name', 'Jackets')->update(['slug' => 'outerwear-jackets-jackets']);
            Childcategory::where('subcategory_id', $subCategory8->id)->where('name', 'Sweaters')->update(['slug' => 'outerwear-jackets-sweaters']);
            $subCategory9 = Subcategory::where('category_id', $category2->id)->where('slug', 'underwear-loungewear')->first();
            Product::where('subcategory_id', $subCategory9->id)->update(['status' => 1]);
            Childcategory::where('subcategory_id', $subCategory9->id)->where('name', 'Pajama Sets')->update(['slug' => 'underwear-loungewear-pajama-sets']);
        }

        $category3 = Category::where('slug','consumer-electronics')->first();

        if ($category3) {
            $subcategory10 = Subcategory::where('category_id', $category3->id)->where('slug','video-games')->first();
            Childcategory::where('subcategory_id', $subcategory10->id)->where('name', 'Chargers')->update(['slug' => 'video-games-chargers']);
            $subcategory11 = Subcategory::where('category_id', $category3->id)->where('slug','portable-audio-video')->first();
            Childcategory::where('subcategory_id', $subcategory11->id)->where('name', 'MP3 Players')->update(['status' => 0]);
        }

        $category4 = Category::where('slug','jewelry-watches')->first();
        if($category4)
        {
            $subcategory12 = Subcategory::where('category_id', $category4->id)->where('slug','mens-watches')->first();
            Childcategory::where('subcategory_id', $subcategory12->id)->where('name', 'Sports Watches')->update(['status' => 0]);
        }

        $category5 = Category::where('slug','bags-shoes')->first();
        if($category5)
        {
            $subcategory13 = Subcategory::where('category_id', $category5->id)->where('slug','mens-luggage-bags')->first();
            Childcategory::where('subcategory_id', $subcategory13->id)->where('name', 'Wallets')->update(['slug' => 'mens-luggage-bags-wallets']);
            $subcategory14 = Subcategory::where('category_id', $category5->id)->where('slug','mens-shoes')->first();
            Childcategory::where('subcategory_id', $subcategory14->id)->where('name', 'Vulcanized Sneakers')->update(['slug' => 'mens-shoes-vulcanized-sneakers']);
            Childcategory::where('subcategory_id', $subcategory14->id)->where('name', 'Boots')->update(['slug' => 'mens-shoes-boots']);
        }

        $category6 = Category::where('slug','toys-kids-babies')->first();
        if($category6)
        {
            $subcategory15 = Subcategory::where('category_id', $category6->id)->where('slug','hot-categories')->first();
            Childcategory::where('subcategory_id', $subcategory15->id)->where('name', 'Hoodies & Sweatshirts')->update(['slug' => 'hot-categories-hoodies-sweatshirts']);
            $subcategory16 = Subcategory::where('category_id', $category6->id)->where('slug','for-girls')->first();
            Childcategory::where('subcategory_id', $subcategory16->id)->where('name', 'Dresses')->update(['slug' => 'for-girls-dresses']);
            Childcategory::where('subcategory_id', $subcategory16->id)->where('name', 'Sleepwear & Robes')->update(['status' => 0]);
            $subcategory17 = Subcategory::where('category_id', $category6->id)->where('slug','for-boys')->first();
            Childcategory::where('subcategory_id', $subcategory17->id)->where('name', 'T-Shirts')->update(['slug' => 'for-boys-t-shirts']);
            Childcategory::where('subcategory_id', $subcategory17->id)->where('name', 'Jeans')->update(['slug' => 'for-boys-jeans']);
            Childcategory::where('subcategory_id', $subcategory17->id)->where('name', 'Hoodies & Sweatshirts')->update(['slug' => 'for-boys-hoodies-sweatshirts']);
        }

        $category7 = Category::where('slug','outdoor-fun-sports')->first();
        if($category7)
        {
            Subcategory::where('category_id', $category7->id)->where('slug','health--beauty')->update(['status' => 0]);
            $subcategory18 = Subcategory::where('category_id', $category7->id)->where('slug','sportswear')->first();
            Childcategory::where('subcategory_id', $subcategory18->id)->where('name', 'Shorts')->update(['slug' => 'sportswear-shorts']);
        }
        $category8 = Category::where('slug','beauty-health-hair')->first();
        if($category8){
            $subcategory19 = Subcategory::where('category_id', $category8->id)->where('slug','skin-care')->first();
            Childcategory::where('subcategory_id', $subcategory19->id)->where('name', 'Eyes')->update(['slug' => 'skin-care-eyes']);
            $subcategory20 = Subcategory::where('category_id', $category8->id)->where('slug','makeup')->first();
            Childcategory::where('subcategory_id', $subcategory20->id)->where('name', 'Face')->update(['slug' => 'makeup-face']);
        }

        $category9 = Category::where('slug','automobiles-motorcycles')->first();
        if($category9){
            $subcategory21 = Subcategory::where('category_id', $category9->id)->where('slug','auto-replacement-parts')->first();
            Childcategory::where('subcategory_id', $subcategory21->id)->where('slug', 'other-replacement-parts')->update(['status' => 0]);
            $subcategory22 = Subcategory::where('category_id', $category9->id)->where('slug','interior-accessories')->first();
            Childcategory::where('subcategory_id', $subcategory22->id)->where('slug', 'car-key-cases')->update(['status' => 0]);
        }

        $category10 = Category::where('slug','tools-home-improvement')->first();
        if($category10)
        {
            $subcategory23 = Subcategory::where('category_id', $category10->id)->where('slug','tools')->first();
            Childcategory::where('subcategory_id', $subcategory23->id)->where('slug', 'power-tools')->update(['status' => 0]);

        }
    }

}
