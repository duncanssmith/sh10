{{--@props(['posts', 'images'])--}}
@props(['posts'])

<x-post-featured-card :post="$posts[0]"/>

<div class="lg:grid lg:grid-cols-6">
    @foreach ($posts->skip(1) as $post)
        <x-post-card :post="$post" class="col-span-2"></x-post-card>
    @endforeach
</div>
