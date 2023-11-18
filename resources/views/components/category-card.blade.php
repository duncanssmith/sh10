@props(['category'])

<article>
    <p>
    {{ $attributes->merge(['class' => 'text-gray-700 bg-gray-100 transition-colors duration-300
       hover:bg-gray-300 border border-black border-opacity-0
       hover:border-opacity-5 rounded-xl']) }}
    </p>
</article>
