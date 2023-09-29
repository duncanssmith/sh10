<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('works.index', [
            'works' => Work::latest()->filter(request()->only('search'))->paginate(7),
            'title' => 'Works',
        ]);
    }

    /**
     * @param Work $work
     *
     * @return Factory|View
     * @throws \Exception
     */
    public function show(Work $work)
    {
        $slug = ($work->slug);
        $work = cache()->remember("works.{$slug}", 30, function() use ($slug) {
            return Work::where('slug', $slug)->firstOrFail();
        });

        // $visibility = Storage::getVisibility($work->thumbnail);

        // print_r('Before: '.$visibility);

        // Storage::setVisibility($work->thumbnail, 'public');

        // print_r('After : '.$visibility);

        // $path = storage_path( $work->thumbnail );

        // dd($path);

        // Storage::disk('public')->put($work->slug.'.html', '<h1>'.$work->slug.'</h1><img src="'. $work->thumbnail . '"/>');

        // $image = Storage::disk('local')->get($work->thumbnail);

        // dd($image1);

        return view('works.show', [
            'work' => $work,
            'title' => 'A work',
        ]);
    }
}
