<x-layouts.base>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="h-screen flex overflow-hidden bg-white">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div class="lg:hidden">
            <div class="fixed inset-0 flex z-40">
                <!--
                  Off-canvas menu overlay, show/hide based on off-canvas menu state.

                  Entering: "transition-opacity ease-linear duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "transition-opacity ease-linear duration-300"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="fixed inset-0">
                    <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
                </div>
                <!--
                  Off-canvas menu, show/hide based on off-canvas menu state.

                  Entering: "transition ease-in-out duration-300 transform"
                    From: "-translate-x-full"
                    To: "translate-x-0"
                  Leaving: "transition ease-in-out duration-300 transform"
                    From: "translate-x-0"
                    To: "-translate-x-full"
                -->
                <div tabindex="0" class="relative flex-1 flex flex-col max-w-xs w-full bg-white focus:outline-none">
                    @include('cp.partition.logo')
                    @include('cp.partition.mobile.menus')
                    @include('cp.partition.mobile.userinfo')

                </div>
                <div class="flex-shrink-0 w-14" aria-hidden="true">
                    <!-- Force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-40">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex flex-col h-0 flex-1 border-r border-gray-200 bg-white">
                    @include('cp.partition.desktop.menus')
                    @include('cp.partition.desktop.userinfo')
                </div>
            </div>
        </div>

        <div class="flex flex-col min-w-0 flex-1 overflow-hidden">
            <div class="lg:hidden">
                <div class="flex items-center justify-between bg-gray-50 border-b border-gray-200 px-4 py-1.5">
                    <div>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                    </div>
                    <div>
                        <button type="button" class="-mr-3 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900">
                            <span class="sr-only">Open sidebar</span>
                            <!-- Heroicon name: menu -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex-1 relative z-0 flex overflow-hidden">
                <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none xl:order-last bg-gray-100" tabindex="0">
                    <!-- Start main area-->
                    <div class="inset-0">
                        {{ $slot }}
                    </div>
                    <!-- End main area -->
                </main>

{{--                @livewire(\LitShop\CP\SecondarySidebar::class)--}}

                @if($topMenu->hasChildren())
                    <aside class="hidden relative xl:order-first xl:flex xl:flex-col flex-shrink-0 w-40 border-r border-gray-200">
                        <div class="">
                            <x-cp-page-head smpx="4"  px="4" lgpx="5" class="font-medium">
                                {{ $topMenu->name() }}管理
                            </x-cp-page-head>

                            <div class="absolute inset-0 pt-16 pb-6 px-3 lg:px-4">
                                @include('cp.partition.desktop.secondary-sidebar')
                            </div>
                        </div>
                    </aside>
                @endif
            </div>
        </div>
    </div>

    <x-notification />
</x-layouts.base>
