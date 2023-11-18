<x-layout>
    <section class="px-6 py-8">
        <x-setting heading="Create cover">
            <form method="POST" action="/admin/cover" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title" />
                <x-form.file-upload name="thumbnail" />
                <x-form.input name="slug" />
                <x-form.input name="media" />
                <x-form.input name="dimensions" />
                <x-form.input name="cover_date" />
                <x-form.submit>Submit</x-form.submit>
                <x-form.cancel>Cancel</x-form.cancel>
            </form>
        </x-setting>
    </section>
</x-layout>
