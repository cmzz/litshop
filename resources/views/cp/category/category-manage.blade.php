<div class="">
    <x-cp-page-head>
        {{ $leafMenu->name() }}
    </x-cp-page-head>

    <div class="p-4">
        <div class="lg:flex lg:space-x-5 mb-6">
            <div class="lg:flex-1">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5">

                        <form wire:submit.prevent="store" class="space-y-8 divide-y divide-gray-200">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
