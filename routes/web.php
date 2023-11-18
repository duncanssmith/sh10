<?php

use App\Http\Controllers\AdminTextController;
use App\Http\Controllers\AdminWorkController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminCoverController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\WorkController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* guest home */
Route::get('/home/{category:slug}', [CategoryController::class, 'home'])->name('works texts on page ');

/* guest categories */
Route::get('/', [CategoryController::class, 'index'])->name('list categories');
Route::get('/categories', [CategoryController::class, 'index'])->name('list categories');
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('show a category');

// Set cover
Route::get('/admin/set_cover/{id}', [AdminCoverController::class, 'set'])->name('set cover')->middleware('admin');
Route::post('/admin/save_set_cover', [AdminCoverController::class, 'save_set_cover'])->name('set save cover')->middleware('admin');

/* auth covers */
Route::get('/admin/covers/{cover:slug}', [AdminCoverController::class, 'show'])->name('show cover');
Route::post('/admin/cover', [AdminCoverController::class, 'store'])->name('save cover');
Route::get('/admin/cover/create', [AdminCoverController::class, 'create'])->name('create cover');
Route::get('/admin/covers', [AdminCoverController::class, 'index'])->name('admin covers index')->middleware('admin');
Route::get('/admin/cover/{cover}/edit', [AdminCoverController::class, 'edit'])->name('admin cover edit')->middleware('admin');
Route::patch('admin/cover/{cover}', [AdminCoverController::class, 'update'])->middleware('admin');
Route::delete('admin/cover/{cover}', [AdminCoverController::class, 'destroy'])->middleware('admin');

/* guest works */
Route::get('/works', [WorkController::class, 'index'])->name('list works');
Route::get('/works/{work:slug}', [WorkController::class, 'show'])->name('show a work');

/* guest texts */
Route::get('/texts', [TextController::class, 'index'])->name('list texts');
Route::get('/texts/{text:slug}', [TextController::class, 'show'])->name('show a text');

/* auth categories */
Route::get('/admin/categories/{category:slug}', [AdminCategoryController::class, 'show'])->name('show category');
Route::post('/admin/category', [AdminCategoryController::class, 'store'])->name('save category');
Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('create category');
Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin categories index')->middleware('admin');
Route::get('/admin/category/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin category edit')->middleware('admin');
Route::patch('admin/category/{category}', [AdminCategoryController::class, 'update'])->middleware('admin');
Route::delete('admin/category/{category}', [AdminCategoryController::class, 'destroy'])->middleware('admin');

/* auth works */
Route::post('/admin/work', [AdminWorkController::class, 'store'])->name('save work')->middleware('admin');
Route::get('/admin/work/create', [AdminWorkController::class, 'create'])->name('create work')->middleware('admin');
Route::get('/admin/works', [AdminWorkController::class, 'index'])->name('admin works index')->middleware('admin');
Route::get('/admin/work/{work}/edit', [AdminWorkController::class, 'edit'])->name('admin work edit')->middleware('admin');
Route::patch('admin/work/{work}', [AdminWorkController::class, 'update'])->middleware('admin');
Route::delete('admin/work/{work}', [AdminWorkController::class, 'destroy'])->middleware('admin');

/* auth texts */
Route::post('/admin/text', [AdminTextController::class, 'store'])->name('save text')->middleware('admin');
Route::get('/admin/text/create', [AdminTextController::class, 'create'])->name('create text')->middleware('admin');
Route::get('/admin/texts', [AdminTextController::class, 'index'])->name('admin texts index')->middleware('admin');
Route::get('/admin/text/{text}/edit', [AdminTextController::class, 'edit'])->name('admin text edit')->middleware('admin');
Route::patch('admin/text/{text}', [AdminTextController::class, 'update'])->name('admin text update')->middleware('admin')->middleware('admin');
Route::delete('admin/text/{text}', [AdminTextController::class, 'destroy'])->name('admin text delete')->middleware('admin')->middleware('admin');

// Assign works to Categories
Route::get('/admin/category/assign_work/{work}', [AdminCategoryController::class, 'assign_work'])->name('assign work')->middleware('admin');
Route::post('/admin/category/save_assigned_work', [AdminCategoryController::class, 'save_assigned_work'])->name('save_assigned_work')->middleware('admin');

// Assign texts to Categories
Route::get('/admin/category/assign_text/{text}', [AdminCategoryController::class, 'assign_text'])->name('assign text')->middleware('admin');
Route::post('/admin/category/save_assigned_text', [AdminCategoryController::class, 'save_assigned_text'])->name('save_assigned_text')->middleware('admin');

# Ordering items (works/texts) in Categories
Route::get('/admin/category/{category}/sort_page_works', [AdminCategoryController::class, 'sort_page_works'])->name('sort page works');
Route::get('/admin/category/{category}/sort_page_texts', [AdminCategoryController::class, 'sort_page_texts'])->name('sort page texts');

# Ajax routes to save orders
Route::post('/admin/category/save_page_works_order', [AdminCategoryController::class, 'save_page_works_order'])->name('save page works order');
Route::post('/admin/category/save_page_texts_order', [AdminCategoryController::class, 'save_page_texts_order'])->name('save page texts order');

/* guest register */
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

/* guest login */
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

/* auth logout */
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('/service-container-route', function (SessionsController $service) {
    die(get_class($service));
});

/*
Route::get('/works/{work}', function ($slug) {
//    $yamlFrontMatter = YamlFrontMatter::parse(file_get_contents(resource_path().'/views/post1.html'));
    $work = cache()->remember("works.{$slug}", 30, function() use ($slug) {
        return Work::where('slug', $slug)->firstOrFail();
    });

    return view('work', [
        'work' => $work,
        'title' => 'A work',
//        'title' => $yamlFrontMatter->matter('title'),
//        'author' => $yamlFrontMatter->matter('author'),
//        'content' => $yamlFrontMatter->body(),
//        'publicPath' => $publicPath,
    ]);
})->where('slug', '[A-z_\-]+');
*/

/*
Route::get('/texts', function () {
//    ddd(Text::all());

    return view('texts', [
        'texts' => Text::all(),
        'title' => 'Texts',
    ]);
});

Route::get('/texts/{text}', function ($slug) {
    $text = cache()->remember("texts.{$slug}", 30, function() use ($slug) {
        return Text::where('slug', $slug)->firstOrFail();
    });

    return view('text', [
        'text' => $text,
        'title' => 'A text',
    ]);
})->where('slug', '[A-z_\-]+');
*/