<?php

namespace App\Http\Controllers;

use App\Models\Cover;
use App\Models\Category;
use App\Models\CategoryWork;
use App\Models\CategoryText;
use App\Models\Text;
use App\Models\Work;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminCoverController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('admin.covers.index', [
            'covers' => Cover::paginate(5),
            'title' => 'Covers index',
            'index' => '/admin/covers',
            'create' => '/admin/covers/create',
        ]);
    }

    /**
     * @param Category $category
     * @return Factory|View
     * @throws \Exception
     */
    public function show(Cover $post)
    {
        $slug = $post->slug;
        $post = cache()->remember("covers.{$slug}", 30, function() use ($slug) {
            return Cover::where('slug', $slug)->firstOrFail();
        });

        return view('covers.show', [
            'post' => $post,
            'title' => 'A post',
        ]);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.covers.create');
    }

    /**
     * @return RedirectResponse|Redirector
     */
    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('covers', 'slug')],
            'media' => 'required',
            'dimensions' => 'required',
            'cover_date' => 'required',
        ]);

        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Cover::create($attributes);

        return redirect('/');
    }

    /**
     * @param Cover $cover
     * @return Factory|View
     */
    public function edit(Cover $cover)
    {
        return view('admin.covers.edit', ['cover' => $cover]);
    }


    /**
     * @param Cover $cover
     * @return RedirectResponse
     */
    public function update(Cover $cover)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('covers', 'slug')->ignore($cover->id)],
            'media' => 'required',
            'dimensions' => 'required',
            'cover_date' => 'required',
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $cover->update($attributes);

        return back()->with('success', 'Cover updated');
    }


    /**
     * @param Cover $cover
     * @return RedirectResponse
     */
    public function destroy(Cover $cover)
    {
        $cover->delete();

        return back()->with('success', 'Cover deleted');
    } 
}
