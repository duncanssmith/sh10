<?php 

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class NavigationComposer
{

    /**
     * Create a new navigation composer.
     */
    public function __construct(
        protected Category $categories,
    ) {}
	
    public function compose($view)
    {
        // dd( $this->categories->where('display', '=', 1)->orderBy('order', 'asc')->get());
        $view->with("pages", $this->categories->where('display', '=', 1)->orderBy('order', 'asc')->get());
    }

}

