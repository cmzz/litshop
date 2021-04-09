@if($field->showOnUI())
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
        @if($field->label())
            <div>
                <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-notifications">
                    {{ $field->label() }}
                </div>
            </div>
        @endif

        @if(is_array($field->options()) && $field->options())
            <div class="sm:col-span-2">
                <div class="max-w-lg">
                    <div class="mt-4 space-y-4">
                        @foreach($field->options as $k => $option)
                            <div class="flex items-center">
                                <input id="field_{{ $field->name() }}" {{ $k == $field->value() ? 'checked' : '' }} name="{{ $field->name() }}" type="radio" value="{{ $k }}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
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
@endif
