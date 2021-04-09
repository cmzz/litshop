@props([
    'label' => null,
    'name' => null,
    'helper' => null,
    'show_asterisk' => null,
    'palceholder' => null,
    'options' => null,
    'showOnUi' => true,
])

@if($showOnUi)
    <div class="mt-4 sm:mt-4 space-y-4 sm:space-y-4">
        <div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start">
            @if($label)
                <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    {{ $label }}
                </label>
            @endif

            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-lg flex rounded-md shadow-sm">
                    <input type="text" name="{{ $name }}"
                           wire:model="creationData.{{ $name }}"
                           id="field_{{ $name }}"
                           autocomplete="{{ $name }}"
                           class="flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                </div>

                @if($helper)
                    <p class="mt-2 text-sm text-gray-500">
                        {{ $helper }}
                    </p>
                @endif
            </div>
        </div>
    </div>
@endif
