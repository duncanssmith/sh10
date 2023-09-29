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
            'categories' => Category::where('display', '=', '1')->get(),
        ]);
    }

    public function index()
    {
        $category = Category::where('display', 1)->first();
        // $category = $category->filter(request()->only('search'))->paginate(3);

        // printf("%s\n<br>", 'gets here');
        // die;

        $works = $category->works->sortBy('pivot.order', SORT_DESC);
        $texts = $category->texts->sortBy('pivot.order', SORT_DESC);

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
            // 'currentCategory' => $category,
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
            'categories' => Category::where('display', '=', '1')->get(),
            'searchbox' => 1,
        ]);
    }
}
