<x-layout>
    <section class="px-6 py-8">
        <x-setting heading="Edit work">
            <form method="POST" action="/admin/work/{{ $work->id }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="flex mt-6">

                    @if ($work->thumbnail)
                        <div class="flex-1">
                            <img src="{{ asset( 'storage/thumbnails/'.$work->thumbnail) }}" alt="" class="rounded-m ml-6 w-1/2">
                        </div>
                    @else
                        <h1>No image</h1>
                    @endif

                    <div class="flex-1">
                        <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $work->thumbnail)" />
                    </div>
                </div>
                <x-form.input name="title" :value="old('title', $work->title)" required />
                <x-form.input name="slug" :value="old('slug', $work->slug)" required />
                <p class="small">The "slug" is a unique name that appears in the page URL. By default it is derived from the title of the work, but it can be any string of characters.</p>
                <x-form.input name="media" :value="old('media', $work->media)" required />
                <x-form.input name="dimensions" :value="old('dimensions', $work->dimensions)" required />
                <x-form.input name="work_date" :value="old('work_date', $work->work_date)" required />
                <x-form.submit>Update</x-form.submit>
                <x-form.cancel>Cancel</x-form.cancel>
            </form>
        </x-setting>
    </section>
</x-layout>
