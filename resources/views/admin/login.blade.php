<div>
    <div class="flex flex-col h-screen bg-gray-100">
        <div class="grid place-items-center mx-2 my-20 sm:my-auto">
            <div class="w-11/12 p-12 sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12 px-6 py-10 sm:px-10 sm:py-6 bg-white rounded-lg shadow-md lg:shadow-lg">

                <h2 class="text-center font-semibold text-3xl lg:text-4xl text-gray-800">
                    Login
                </h2>

                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                    </div>
                </div>

                <form class="mt-10" wire:submit.prevent="submit">
                    <div>
                        <label for="email" class="block text-xs font-semibold text-gray-600 uppercase">E-mail</label>
                        <input id="email" wire:model="email" type="text" name="email" placeholder="e-mail address"
                           class="@error('email') border-red-300 @enderror block w-full py-3 px-1 mt-2 text-gray-800 appearance-none border-b-2 border-gray-100 focus:text-gray-500 focus:outline-none focus:border-gray-200" />
                        @error('email')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block mt-3 text-xs font-semibold text-gray-600 uppercase">Password</label>
                        <input id="password" wire:model.lazy="password" type="password" name="password" placeholder="password" autocomplete="current-password"
                           class="@error('email') border-red-300 @enderror block w-full py-3 px-1 mt-2 mb-4 text-gray-800 appearance-none border-b-2 border-gray-100 focus:text-gray-500 focus:outline-none focus:border-gray-200" />
                        @error('email')
                            <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="w-full py-3 mt-10 bg-gray-800 rounded-sm font-medium text-white uppercase focus:outline-none hover:bg-gray-700 hover:shadow-none">
                        Login
                    </button>

                    <!-- Another Auth Routes -->
                    <div class="sm:flex sm:flex-wrap mt-8 sm:mb-4 text-sm text-center">
                        <a href="forgot-password" class="flex-2 underline">
                            Forgot password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
