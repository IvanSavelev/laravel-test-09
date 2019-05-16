<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Category;
use App\F;
use App\Http\Controllers\Controller;
use App\Product;
use App\Setting;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	use F; //Plug-in universal functions
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
	    $settings = json_decode(Setting::where('key', 'page_index')->first()->value, true);
	    $index_categories_general =  $this->val($settings, 'index_categories_general', 'array');
	    $category = Category::whereIn('category_id', $index_categories_general)->get();
	    $settings['index_categories_general'] = $category;
	
	    $index_products_general =  $this->val($settings, 'index_products_general', 'array');
	    $product = Product::whereIn('product_id', $index_products_general)->get();
	    $settings['index_products_general'] = $product;
	
	    $index_articles_general =  $this->val($settings, 'index_articles_general', 'array');
	    $article = Article::whereIn('article_id', $index_articles_general)->get();
	    $settings['index_articles_general'] = $article;
	    
	    return view('front.index.index', compact('settings'));
    }
}
