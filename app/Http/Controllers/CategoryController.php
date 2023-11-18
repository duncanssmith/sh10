<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{

    /**
     * This is the publicly viewable page, a page of works and/or texts
     * identified by the category
     */
    public function home(Category $category)
    {
        $slug = $category->slug;
        $category = cache()->remember("category.{$slug}", 30, function() use ($slug) {
            return Category::where('slug', $slug)->firstOrFail();
        });

        // show the view and pass the group to it
        return view('home.home', [
            'category' => $category,
            'works'  => $category->works,
            'texts'  => $category->texts,
            'currentCategory' => $category,
            'categories' => Category::where('display', '=', 1)->get(),
        ]);
    }

    public function index()
    {
        $category = Category::where('display', 1)->first();
        $category_list = Category::where('display', '=', 1)->orderBy('order', 'asc')->get();
        // $category = $category->filter(request()->only('search'))->paginate(3);

        // dd($pageSelector->doSomething());
        //= DUNCAN DEBUG ========================
        // dd(app()->make('Hello'));
        //=========================

        if ($category){
        if ($category->works) {
            $works = $category->works->sortBy('pivot.order', SORT_DESC);
        }
        if ($category->texts) {
            $texts = $category->texts->sortBy('pivot.order', SORT_DESC);
        }
        }

        // print_r($category->slug);
        // $categories = Category::where('display', '=', '1')->get();
        // foreach($categories as $value) {
            // print_r($value->name);
            // printf("%d %s - %s\n<br>", $value->id, $value->name, $value->slug);
        // }
        // print_r(Category::where('display', '=', '1')->get());
        // die();

        return view('categories.show', [
            'category' => $category,
            'works' => $works,
            'texts' => $texts,
            'currentCategory' => $category,
            'categories' => Category::where('display', '=', '1')->get(),
            // 'categories' => $categories,
        ]);

        // return view('categories.index', [
        // 'categories' => Category::where('display', '=', '1')->get(),
        // 'title' => 'Categories',
        // ]);
    }

    public function show(Category $category)
    {
        $slug = $category->slug;
        $category = cache()->remember("category.{$slug}", 30, function() use ($slug) {
            return Category::where('slug', $slug)->firstOrFail();
        });

        $works = $category->works->sortBy('pivot.order', SORT_DESC);
        $texts = $category->texts->sortBy('pivot.order', SORT_DESC);

        return view('categories.show', [
            'category' => $category,
            'works' => $works,
            'texts' => $texts,
            'currentCategory' => $category,
            'categories' => Category::where('display', '=', '19')->get(),
            'searchbox' => 1,
        ]);
    }
}
