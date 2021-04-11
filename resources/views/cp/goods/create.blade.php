<div>
    <x-cp-page-head>
        发布商品
    </x-cp-page-head>


    <div class="p-4">
    <div class="lg:flex lg:space-x-5 mb-6">
        <div class="lg:flex-1">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5">
                    <form wire:submit.prevent="store" class="space-y-8 divide-y divide-gray-200">
                        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                            @if($formConf && count($formConf))
                                @foreach($formConf as $i => $formField)
                                    <div class="{{ $i == 0 ? '' : 'pt-8 space-y-6 sm:pt-10 sm:space-y-5' }}">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                {{ $formField['section'] }}
                                            </h3>
                                        </div>

                                        @if(isValidityArrayField($formField, 'fields'))
                                            @foreach($formField['fields'] as $field)
                                                @switch($field['type'])
                                                    @case(\Util\FormField\FormFieldTypes::TEXT)
                                                    @case(\Util\FormField\FormFieldTypes::INPUT)
                                                        <x-fields.t
                                                            label="{{ data_get($field, 'label') }}"
                                                            helper="{{ data_get($field, 'helper') }}"
                                                            palceholder="{{ data_get($field, 'palceholder') }}"
                                                            name="{{ data_get($field, 'name') }}"></x-fields.t>
                                                    @break

                                                    @case(\Util\FormField\FormFieldTypes::MULTI_IMAGE_UPLOADER)
                                                        <x-fields.multi-image-uploader
                                                            label="{{ data_get($field, 'label') }}"
                                                            helper="{{ data_get($field, 'helper') }}"
                                                            palceholder="{{ data_get($field, 'palceholder') }}"
                                                            name="{{ data_get($field, 'name') }}"></x-fields.multi-image-uploader>
                                                    @break

                                                    @case(\Util\FormField\FormFieldTypes::MULTI_SELECT)
                                                        <x-fields.multi-select
                                                            label="{{ data_get($field, 'label') }}"
                                                            helper="{{ data_get($field, 'helper') }}"
                                                            palceholder="{{ data_get($field, 'palceholder') }}"
                                                            name="{{ data_get($field, 'name') }}"></x-fields.multi-select>
                                                    @break

                                                    @case(\Util\FormField\FormFieldTypes::SELECT)
                                                        <x-fields.select
                                                            label="{{ data_get($field, 'label') }}"
                                                            helper="{{ data_get($field, 'helper') }}"
                                                            palceholder="{{ data_get($field, 'palceholder') }}"
                                                            name="{{ data_get($field, 'name') }}"></x-fields.select>
                                                    @break

                                                    @case(\Util\FormField\FormFieldTypes::RADIO_BOX)
                                                        <x-fields.radio
                                                            label="{{ data_get($field, 'label') }}"
                                                            helper="{{ data_get($field, 'helper') }}"
                                                            palceholder="{{ data_get($field, 'palceholder') }}"
                                                            options="{{ json_encode(data_get($field, 'options')) }}"
                                                            value="{{ data_get($field, 'value') }}"
                                                            name="{{ data_get($field, 'name') }}"></x-fields.radio>
                                                    @break

                                                    @case(\Util\FormField\FormFieldTypes::CHECK_BOX)
                                                        <x-fields.checkbox
                                                            label="{{ data_get($field, 'label') }}"
                                                            helper="{{ data_get($field, 'helper') }}"
                                                            palceholder="{{ data_get($field, 'palceholder') }}"
                                                            options="{{ json_encode(data_get($field, 'options')) }}"
                                                            value="{{ data_get($field, 'value') }}"
                                                            name="{{ data_get($field, 'name') }}"></x-fields.checkbox>
                                                    @break

                                                    @case(\Util\FormField\FormFieldTypes::FILE_UPLOADER)
                                                        <x-fields.file-uploader
                                                            label="{{ data_get($field, 'label') }}"
                                                            helper="{{ data_get($field, 'helper') }}"
                                                            palceholder="{{ data_get($field, 'palceholder') }}"
                                                            name="{{ data_get($field, 'name') }}"></x-fields.file-uploader>
                                                    @break

                                                    @case(\Util\FormField\FormFieldTypes::MULTI_FILE_UPLOADER)
                                                        <x-fields.multi-file-uploader
                                                            label="{{ data_get($field, 'label') }}"
                                                            helper="{{ data_get($field, 'helper') }}"
                                                            palceholder="{{ data_get($field, 'palceholder') }}"
                                                            name="{{ data_get($field, 'name') }}"></x-fields.multi-file-uploader>
                                                    @break

                                                    @case(\Util\FormField\FormFieldTypes::TEXTAREA)
                                                        <x-fields.textarea
                                                            label="{{ data_get($field, 'label') }}"
                                                            helper="{{ data_get($field, 'helper') }}"
                                                            palceholder="{{ data_get($field, 'palceholder') }}"
                                                            value="{{ data_get($field, 'value') }}"
                                                            name="{{ data_get($field, 'name') }}"></x-fields.textarea>
                                                    @break
                                                @endswitch
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="pt-5">
                            <div class="flex justify-end">
                                <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    重置
                                </button>
                                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    保存并查看
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
