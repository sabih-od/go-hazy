<?php

namespace App\Http\Controllers\Front;

use App\{Models\Order, Models\Product, Models\Category, Models\Subcategory, Models\Childcategory, Models\Report};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class CatalogController extends FrontBaseController
{

    // CATEGORIES SECTION

    public function categories()
    {
        return view('frontend.products');
    }

    // -------------------------------- CATEGORY SECTION ----------------------------------------

    public function category(Request $request, $slug = null, $slug1 = null, $slug2 = null)
    {
        /*dump(\DB::listen(function ($q) {
            echo $q->sql;
            echo print_r($q->bindings, 1);
        }));*/
//        dd(request()->route('category'),request()->route('subcategory'));
        if ($request->view_check) {
            session::put('view', $request->view_check);
        }

        //   dd(session::get('view'));

        $cat = null;
        $subcat = null;
        $childcat = null;
        $flash = null;
        $minprice = $request->min ?? null;
        $maxprice = $request->max ?? null;
        $minPrice = $request->minPrice ?? null;
        $maxPrice = $request->maxPrice ?? null;
        $sorts = 'ASC';
        /*$sort = $request->has('highest') ? 'DESC' ?  $request->has('lowest') : 'ASC' : 'ASC';*/
        if ($request->has('highest')) {
            $sort = 'DESC';
        } elseif ($request->has('lowest')) {
            $sort = 'ASC';
        } else {
            // default sort order if neither 'highest' nor 'lowest' is present in the request
            $sort = 'ASC';
        }
        $search = $request->search;
        $pageby = $request->pageby;
        $minprice = ($minprice / $this->curr->value);
        $maxprice = ($maxprice / $this->curr->value);
        $type = $request->has('type') ?? '';
        $title = $request->get('title') ?? null;

        $data['min'] = $minprice;
        $data['max'] = $maxprice;
        $data['title'] = $title;

        $data['min'] = $minprice;
        $data['max'] = $maxprice;

        if (!empty($slug)) {
            $cat = Category::where('slug', $slug)->firstOrFail();
            $data['cat'] = $cat;
        }

        if (!empty($slug1)) {
            $subcat = Subcategory::where('slug', $slug1)->firstOrFail();
            $data['subcat'] = $subcat;
        }

        if (!empty($slug2)) {
            $childcat = Childcategory::where('slug', $slug2)->firstOrFail();
            $data['childcat'] = $childcat;
        }

        $data['latest_products'] = Product::orderBy('price', $sort)->with('user')->whereStatus(1)->whereLatest(1)
            ->home($this->language->id)
            ->get()
            ->reject(function ($item) {
                if ($item->user_id != 0) {
                    if ($item->user->is_vendor != 2) {
                        return true;
                    }
                }
                return false;
            });

        $prods = Product::when($cat, function ($query, $cat) {
            return $query->where('category_id', $cat->id);
        })
            ->when($subcat, function ($query, $subcat) {
                return $query->where('subcategory_id', $subcat->id);
            })
            ->when($type, function ($query, $type) {
                return $query->with('user')->whereStatus(1)->whereIsDiscount(1)
                    ->where('discount_date', '>=', date('Y-m-d'))
                    ->whereHas('user', function ($user) {
                        $user->where('is_vendor', 2);
                    });
            })
            ->when($childcat, function ($query, $childcat) {
                return $query->where('childcategory_id', $childcat->id);
            })
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')->orWhere('name', 'like', $search . '%');
            })
            ->when($minprice, function ($query, $minprice) {
                return $query->where('price', '>=', $minprice);
            })
            ->when($maxprice, function ($query, $maxprice) {
                return $query->where('price', '<=', $maxprice);
            })
            ->when($minPrice, function ($query, $minPrice) {
                return $query->where('price', '>=', $minPrice);
            })
            ->when($maxPrice, function ($query, $maxPrice) {
                return $query->where('price', '<=', $maxPrice);
            })
            ->when($title, function ($query) use ($title) {
                return $query->where('name', 'LIKE', '%' . $title . '%');
            })
            ->when($sorts, function ($query, $sorts) {
                if ($sorts == 'date_desc') {
                    return $query->latest('id');
                } elseif ($sorts == 'date_asc') {
                    return $query->oldest('id');
                } elseif ($sorts) {
                    return $query->latest('price');
                } elseif ($sorts == 'price_desc') {
                    return $query->oldest('price');
                }
            })
            ->when(empty($sort), function ($query, $sort) {
                return $query->latest('id');
            })
            ->when($request->has('discount') && $request->discount == 'discounted', function ($q) use ($request) {
                return $q->where('previous_price', '>', 0);
            })
            ->when($request->has('highest') && $request->highest == 'highest', function ($q) use ($request) {
                return $q->orderBy('price', 'desc');
            })
            ->when($request->has('lowest') && $request->lowest === 'lowest', function ($query) {
                return $query->orderBy('price', 'ASC');
            })
            ->when($request->has('newest'), function ($query) use ($request) {
                return $query->whereDate('created_at', '=', now()->toDateString())
//                    ->orWhereDate('updated_at', '=', now()->toDateString())
                    ->latest('created_at');
            })
//            ->when($request->has('newest') && $request->newest == 'newest', function ($query) {
//                return $query->orderBy('created_at', 'desc');
//            })
            ->when($request->has('reviewStars'), function ($query) use ($request) {
                $reviewStars = $request->input('reviewStars');
                return $query->whereHas('ratings', function ($q) use ($reviewStars) {
                    return $q->where('rating', '=', $reviewStars);
//                ->when($request->has('bestSeller'), function ($query) use ($request) {
//                    $reviewStars = $request->input('bestSeller');
//                    $orders = Order::all();
//                    $product_occurence_array = [];
//                    foreach ($orders as $order) {
//                        foreach (json_decode($order->cart)->items as $item) {
//                            if (array_key_exists($item->item->id, $product_occurence_array)) {
//                                $product_occurence_array[$item->item->id] += $item->qty;
//                            } else {
//                                $product_occurence_array[$item->item->id] = $item->qty;
//                            }
//                        }
//                    }
//                });
                });

            })->when($request->has('bestSeller'), function ($query) use ($request) {
                $orders = Order::all();
                $product_occurrence_array = [];
                foreach ($orders as $order) {
                    foreach (json_decode($order->cart)->items as $item) {
                        if (array_key_exists($item->item->id, $product_occurrence_array)) {
                            $product_occurrence_array[$item->item->id] += $item->qty;
                        } else {
                            $product_occurrence_array[$item->item->id] = $item->qty;
                        }
                    }
                }
                arsort($product_occurrence_array);
                $product_occurrence_array = array_flip($product_occurrence_array);
                $product_occurrence_array = array_values($product_occurrence_array);
//                        $bestSeller = array_keys($product_occurrence_array);
//                dd($product_occurrence_array);
                return $query->whereIn('id', $product_occurrence_array);
            });

        $prods = $prods->where(function ($query) use ($cat, $subcat, $childcat, $type, $request) {
            $flag = 0;
            if (!empty($cat)) {
                foreach ($cat->attributes as $key => $attribute) {
                    $inname = $attribute->input_name;
                    $chFilters = $request["$inname"];

                    if (!empty($chFilters)) {
                        $flag = 1;
                        foreach ($chFilters as $key => $chFilter) {
                            if ($key == 0) {
                                $query->where('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                            } else {
                                $query->orWhere('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                            }
                        }
                    }
                }
            }


            if (!empty($subcat)) {
                foreach ($subcat->attributes as $attribute) {
                    $inname = $attribute->input_name;
                    $chFilters = $request["$inname"];

                    if (!empty($chFilters)) {
                        $flag = 1;
                        foreach ($chFilters as $key => $chFilter) {
                            if ($key == 0 && $flag == 0) {
                                $query->where('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                            } else {
                                $query->orWhere('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                            }

                        }
                    }

                }
            }

            if (!empty($childcat)) {
                foreach ($childcat->attributes as $attribute) {
                    $inname = $attribute->input_name;
                    $chFilters = $request["$inname"];

                    if (!empty($chFilters)) {
                        $flag = 1;
                        foreach ($chFilters as $key => $chFilter) {
                            if ($key == 0 && $flag == 0) {
                                $query->where('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                            } else {
                                $query->orWhere('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                            }

                        }
                    }

                }
            }
        });

        // Pagination Work Start
        $prodss = $prods->where('language_id', $this->language->id)->where('status', 1)
            ->get();
        // Pagination Work End

        $prods = $prods->where('language_id', $this->language->id)->where('status', 1)->get()
            ->reject(function ($item) {
                if ($item->user_id != 0) {
                    if ($item->user->is_vendor != 2) {
                        return true;
                    }
                }

                if (isset($_GET['max'])) {
                    if ($item->vendorSizePrice() >= $_GET['max']) {
                        return true;
                    }
                }
                return false;
            })->map(function ($item) {
                $item->price = $item->vendorSizePrice();
                return $item;

            })->paginate(isset($pageby) ? $pageby : $this->gs->page_count);

        $data['prod'] = $prodss->paginate(12);
        if ($sort == 'DESC') {
            $data['prods'] = $prods->sortByDesc('price');
        } elseif ($sort == 'ASC') {
            $data['prods'] = $prods->sortBy('price');
        }
//        dd($data['prods']->count()->paginate(10));

//        if ($prods instanceof Builder || $prods instanceof Collection) {
//            $perPage = 10;
//            $page = Paginator::resolveCurrentPage('10');
//
//            $data['results'] = $prods->paginate($perPage,  $page);
//        }

//        $data['prod'] = $data['prods']->paginate(10);

        if ($request->ajax()) {
//            if ($request->has('min')) {
            $data['ajax_check'] = 1;
//            $rendorview = view('frontend.product')->with('data', $data)->render();
//            return response($data);
            $rendorview = view('frontend.ajax.filter-price')->with('data', $data)->render();
            return response($rendorview);
//            } else if ($request->has('discount')) {
////                $data['ajax_check'] = 2;
////            $rendorview = view('frontend.product')->with('data', $data)->render();
////            return response($data);
//                $rendorview = view('frontend.ajax.filter-price')->with('discount', $discount)->render();
//                return response($rendorview);
//            }
        }
//        $data['paginate'] = \DB::table('products')
//            ->where('price', '>', 100)
//            ->orderBy('name')
//            ->paginate(10);

//        if ($request->ajax()) {
//        }

        return view('frontend.product')->with([
            'data' => $data,
        ]);
    }

    public function getsubs(Request $request)
    {
        $category = Category::where('slug', $request->category)->firstOrFail();
        $subcategories = Subcategory::where('category_id', $category->id)->get();
        return $subcategories;
    }

    public function report(Request $request)
    {

        //--- Validation Section
        $rules = [
            'note' => 'max:400',
        ];
        $customs = [
            'note.max' => 'Note Must Be Less Than 400 Characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $customs);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Report;
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends

    }

}
