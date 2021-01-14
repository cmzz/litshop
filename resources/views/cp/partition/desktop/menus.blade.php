<div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
    <div class="flex items-center flex-shrink-0 px-4">
        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-900-text.svg" alt="Workflow">
    </div>

    <nav class="mt-5 flex-1" aria-label="Sidebar">
        <div class="px-2 space-y-1">
            @if($menus && is_array($menus))
                @foreach($menus as $menu)
                    @php($menuId = $menu->id())
                    <a href="{{ $menu->urlOrLeafUrl() }}"
                       class="{{ \Nav::path()->contains($menuId) ? 'bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md'}}">
                        @if($menu->name())
                            @php($svg = 'icon.'.$menu->icon())
                            <x-dynamic-component :component="$svg" class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" viewBox="0 0 24 24" />
                        @endif

                        <span>{{ $menu->name() }}</span>
                    </a>
                @endforeach
            @endif
        </div>
    </nav>
</div>
