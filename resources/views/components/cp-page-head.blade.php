@props([
    'class' => '',
    'px' => 4,
    'lgpx' => 4,
    'smpx' => 4,
])


<div class="bg-white border-gray-200 border-b border-solid w-full py-3 sm:px-{{ $smpx }} px-{{ $px }} lg:px-{{ $lgpx }} {{ $class }}">
    <h3 class="leading-6 text-gray-600">
        {{ $slot }}
    </h3>
</div>
