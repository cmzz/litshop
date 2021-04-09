@if($field->showOnUI())
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        @if($field->label())
        <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            {{ $field->label() }}
        </label>
        @endif

        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <textarea id="field_{{ $field->name() }}"
                      name="{{ $field->name() }}"
                      rows="3"
                      placeholder="{{ $field->placeholder() }}"
                      class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">{{ $field->value() }}</textarea>

            @if($field->helper())
                <p class="mt-2 text-sm text-gray-500">
                    {{ $field->helper() }}
                </p>
            @endif
        </div>
    </div>
@endif
