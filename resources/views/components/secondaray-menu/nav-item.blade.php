@props([
    'url' => '',
    'svg' => null,
    'isActive' => false,
    'lvl' => 1,
    'isLeaf' => true
])

<a href="{{ !$isLeaf ? 'javascript:;' : $url }}"
   {{ $attributes->merge(['class' => 'border-transparent text-gray-600 group mt-1 border-l-4 px-1 py-2 flex items-center text-sm font-medium rounded-md '. ($isActive && $isLeaf ? 'bg-gray-100 text-teal-700 ' : 'hover:bg-gray-50 hover:text-gray-900 ') . ($lvl > 1 ? 'pl-8 ' : '') ]) }}
   aria-current="page"
>
    @if($svg)
        <x-dynamic-component :component="'icon.'.$svg" class="text-teal-500 group-hover:text-teal-500 flex-shrink-0 -ml-1 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" />
    @endif

    <span class="truncate">
      {{ $slot }}
    </span>
</a>
