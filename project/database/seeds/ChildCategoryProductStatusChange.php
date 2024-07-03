<?php

namespace Database\Seeders;

use App\Models\Childcategory;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ChildCategoryProductStatusChange extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slugs = [
            'suits-blazers',
            'tanks-camis',
            'bikini-sets',
            'leggings',
            'bras',
            'panties',
            'bra-brief-sets',
            'shapewear',
        ];
        Childcategory::whereIn('slug', $slugs)->update(['status' => 0]);
        $childCategoriesIds = Childcategory::whereIn('slug', $slugs)->pluck('id')->toArray();
        Product::whereIn('childcategory_id', $childCategoriesIds)->update(['status' => 0]);
    }

}
