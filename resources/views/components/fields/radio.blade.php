@props([
'label' => null,
'name' => null,
'helper' => null,
'show_asterisk' => null,
'palceholder' => null,
'options' => null,
'value' => null,
'showOnUi' => true,
])

@php
    if(isset($options) && $options) {
        try {
        $options = json_decode(htmlspecialchars_decode($options), true);
        } catch (\Exception $e) {
            throw new \Foundation\Exceptions\InvalidArgumentException('参数错误');
        }
    }

@endphp

@if($showOnUi)
    <div class="mt-4 sm:mt-4 space-y-4 sm:space-y-4">
    <div class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-baseline">
        @if($label)
            <div>
                <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-notifications">
                    {{ $label }}
                </div>
            </div>
        @endif

        @if(is_array($options) && $options)
            <div class="sm:col-span-2">
                <div class="max-w-lg">
                    <div class="mt-4 space-y-4">
                        @foreach($options as $k => $option)
                            <div class="flex items-center">
                                <input id="field_{{ $name }}" {{ $k == $value ? 'checked' : '' }} name="{{ $name }}" type="radio" value="{{ $k }}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                @if($option && is_array($option))
                                    <label for="push_everything" class="ml-3 block text-sm font-medium text-gray-700">{{ array_shift($option) }}</label>
                                    @if($option && is_array($option) && count($option) > 0)
                                        @foreach($option as $v)
                                            <p class="text-gray-500 text-sm">{{ $v }}</p>
                                        @endforeach
                                    @endif
                                @else
                                    <label for="push_everything" class="ml-3 block text-sm font-medium text-gray-700">{{ $option }}</label>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
    </div>
@endif
