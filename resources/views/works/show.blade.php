<x-layout>

    <div class="text-gray-700 max-w-4xl mx-auto">

        <img src="{{ url('storage/thumbnails/'.$work->thumbnail) }}" width="20%" alt="{{ $work->title }}"/>

        <a href="{{ url('storage/'. $work->slug .'.html') }}" alt=""><strong> {{ $work->slug }} </strong> </a>

        <h2 class="font-bold space-y-4 lg:text-lg leading-loose mt-6">
            {{ $work->title }}
        </h2>
        <p class="py-1">
            {{ $work->media ?? ''}}
        </p>
        <p class="py-1">
            {{ $work->dimensions ?? '' }}
        </p>
        <p class="py-1">
            {{ $work->work_date ?? ''}}
        </p>
    </div>

</x-layout>
