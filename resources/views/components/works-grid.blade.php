@props(['works'])

<div class="lg:grid lg:grid-cols-6">
    @foreach ($works as $work)
        <x-work-card :work="$work" class="col-span-6"></x-work-card>
    @endforeach
</div>
