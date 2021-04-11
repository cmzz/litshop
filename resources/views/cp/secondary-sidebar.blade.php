@if($topMenu->children())
<aside class="hidden relative xl:order-first xl:flex xl:flex-col flex-shrink-0 w-48 border-r border-gray-200">
    <!-- Start secondary column (hidden on smaller screens) -->
    <div class="absolute inset-0 py-6 px-3 lg:px-4">
        <div class="h-full">

            @foreach($topMenu->children() as $subMenu)
                @php($menuId = $subMenu->id())

                @if($subMenu->hasChildren())
                    <nav class="mb-6"
                         x-data="{ open_{{ $menuId }}: true}"
                    >
                        <x-secondaray-menu.nav-item :svg="$subMenu->icon() ?: 'chevron-down'"
                                                    :lvl="$subMenu->level()"
                                                    :isLeaf="false"
                                                    :isActive="\Nav::path()->contains($menuId)"
                                                    x-on:click.stop="open_{{ $menuId }} = !open_{{ $menuId }};"
                        >
                            {{ $subMenu->name() }}
                        </x-secondaray-menu.nav-item>

                        <nav x-show.transition.in.opacity.duration.100ms.origin.top.scale.100.out.duration.100ms.origin.top.opacity.scale.100="open_{{ $menuId }}" >
                        @foreach($subMenu->children() as $subOfSubMenu)
                            <x-secondaray-menu.nav-item :url="$subOfSubMenu->url()"
                                                        :svg="$subOfSubMenu->icon()"
                                                        :lvl="$subOfSubMenu->level()"
                                                        :isActive="\Nav::path()->contains($subOfSubMenu->id())"
                            >
                                {{ $subOfSubMenu->name() }}
                            </x-secondaray-menu.nav-item>
                        @endforeach
                        </nav>
                    </nav>
                @else
                    <x-secondaray-menu.nav-item :url="$subMenu->url()"
                                                :svg="$subMenu->icon()"
                                                :lvl="$subMenu->level()"
                                                :isActive="\Nav::path()->contains($menuId)"
                    >
                        {{ $subMenu->name() }}
                    </x-secondaray-menu.nav-item>
                @endif
            @endforeach

        </div>
    </div>
    <!-- End secondary column -->
</aside>
@endif
