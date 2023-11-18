<x-layout :uuid=$uuid :path="$path">

    <h1 class="pt-8 py-4 text-gray-500 font-semibold">Sort {{ $category->name }} covers</h1>
    <p class="text-sm text-gray-500 font-normal">The covers listed below are currently on the {{$category->name}} page</p>
    <p class="text-sm text-gray-500 font-normal">Click and drag to arrange in the desired order</p>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="py-4 px2">
        <table class="category py-4 px-2" data-categoryid="{{ $category->id}}">
            <thead>
            <tr class="text-gray-500 text-sm">

                <th class="px-4 py-4 border border-solid"><i class="fa fa-sort text-blue-500" title="Drag and drop rows to sort"></i></th>
{{--                <th class="border border-solid ">Sort-order</th>--}}
{{--                <th class="border border-solid ">Id</th>--}}
                <th class="border border-solid px-4">Image</th>
                <th class="border border-solid px-4">Title</th>
                <th class="border border-solid px-4">Slug</th>
                <th class="border border-solid px-4">Media</th>
                <th class="border border-solid px-4">Dimensions</th>
                <th class="border border-solid px-4">Cover date</th>

            </tr>
            </thead>
            <tbody id="sortable" class="sortable ui-sortable">
            @foreach($covers as $key => $cover)
                <tr class="ui-state-default ui-sortable-handle text-gray-500 text-sm" data-id="{{ $cover->id }}">

                    <td class="px-4 py-4 text-blue-500 "><i class="fa fa-random" title="s:[{{$cover->pivot->order}}]"></i></td>
{{--                    <td class="border border-solid ">{{ $cover->pivot->order }}</td>--}}
{{--                    <td class="border border-solid ">{{ $cover->id }}</td>--}}
                    <td class="border border-solid px-4 py-2"><img src="{{ asset('storage/thumbnails/'.$cover->thumbnail )}}" width="15%" title="{{ $cover->id }}"/></td>
                    <td class="border border-solid px-4">{{ $cover->title }}</td>
                    <td class="border border-solid px-4">{{ $cover->slug }}</td>
                    <td class="border border-solid px-4">{{ $cover->media }}</td>
                    <td class="border border-solid px-4">{{ $cover->dimensions }}</td>
                    <td class="border border-solid px-4">{{ $cover->cover_date }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <x-form.cancel>Back</x-form.cancel>

    </div>

</x-layout>

