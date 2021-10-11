<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Company;

class NotificationController extends Controller
{

    public function index(Request $request)
    {
        $this->checkrole();
        $product_max=Product::where('status',1)->max('price');
        $product_min=Product::where('status',1)->min('price');
        $search_product_min=$product_min;
        $search_product_max=$product_max;
        $pageTitle = "Notification";
        ///where('products.unit','<=','products.alert_quantity')->
        $products = Product::where("products.status",1);

        if ($request->search_type != '' || $request->search_text != null) {
            $products = $products->where("name", 'like', '%' . $request->search_text . '%');
            $pageTitle = "Notification Search Results";
        }
        if ($request->category_id != 0 && $request->sub_category_id == 0) {

            $products = $products->where('category_id', $request->category_id);
            $pageTitle = "Notification Search Results";
        } else if ($request->category_id != 0 && $request->sub_category_id != 0) {

            $products = $products
                ->where('category_id', $request->category_id)
                ->where('sub_category_id', $request->sub_category_id);
            $pageTitle = "Notification Search Results";

        }
        if ($request->min_price != '') {

            $products = $products ->where('price', '>=', $request->min_price);
            $pageTitle = "Notification Search Results";
            $search_product_min=$request->min_price;

        }
        if ($request->max_price != '') {

            $products = $products ->where('price', '<=', $request->max_price);
            $pageTitle = "Notification Search Results";
            $search_product_max=$request->max_price;

        }
        $companies = Company::where('type', '0')->pluck('name', 'id')->toArray();
        $products = $products->orderBy('unit', 'asc')->paginate(30);
        view()->share('pageTitle', $pageTitle);
        view()->share('companies', $companies);
        view()->share('products', $products);
        view()->share('product_max', $product_max);
        view()->share('product_min', $product_min);
        view()->share('search_product_min', $search_product_min);
        view()->share('search_product_max', $search_product_max);
        // dd($product_max);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Notification' => url(session('access').'notification')));
        return view(session('access') . 'product/index');
    }

    function checkrole(){

        $access=session('accesslist_id');

        if(in_array(1,$access)|| in_array(2,$access)){
//            return redirect(session('access').'home')->send();
        }
        else
            return redirect(session('access').'home')->send();
    }


}
