<x-layout :pages="$pages">

    <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-1 gap-x-10 text-gray-400">
        <div class="px-2 py-20">

            <h1 class="font-semibold text-base">
                {{ $category->name }}:

                @if ($works->count() === 0)
                There are no works on this page
                @elseif ($works->count() === 1)
                {{ $works->count() }}
                work
                @elseif ($works->count() > 1)
                {{ $works->count() }}
                works
                @endif
            </h1>

            <div class="px-0 py-2">

            <x-category-works-grid :works="$works"/>

            <br/>

            <h1 class="font-semibold text-base">
                {{ $category->name }}:

                @if ($texts->count() === 0)
                There are no texts on this page
                @elseif ($texts->count() === 1)
                {{ $texts->count() }}
                text
                @elseif ($texts->count() > 1)
                {{ $texts->count() }}
                texts
                @endif

            </h1>

            <x-category-texts-grid :texts="$texts"/>

            </div>
        </div>
    </article>

</x-layout>
