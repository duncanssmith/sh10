
<x-dropdown :pages="$pages">
    <x-slot name="trigger">
        <button class="
        text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-500
        active:bg-gray-600 text-base px-9 py-2 outline-none
        focus:outline-none mb-1 ease-linear transition-all duration-150 px-10
        ">
            {{-- isset($currentCategory) ? ucwords($currentCategory->name) : 'Pages' --}}
            Pages
            {{-- <x-icon name="down-arrow" class="absolute pointer-events-none" style=""/> --}}

        </button>
    </x-slot>

    @foreach($pages as $page)
        <x-dropdown-item
            href="/category/{{ $page->slug }}"
           :active='request()->is("category/.{{$page->slug}}")'>
        {{ ucwords($page->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
