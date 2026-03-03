@auth()

    <nav x-data="{ mobileMenuOpen: false }" class="bg-gray-50 dark:bg-gray-900 shadow-md print:hidden">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="flex-shrink-0">
                        <img class="h-8 w-auto" src="#" alt="E-Commerce Logo">
                    </a>
                    <div class="hidden md:block ml-6">
                        <div class="flex space-x-4 rtl:space-x-reverse">
                            <a href="{{ route('home') }}" class="text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:bg-blue-500 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>
                            <a href="{{ route('tasks') }}" class="text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:bg-blue-500 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Обсуждения</a>
                            <a href="#" class="text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:bg-blue-500 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Categories</a>
                            <a href="#" class="text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:bg-blue-500 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">About Us</a>
                            <a href="#" class="text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:bg-blue-500 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                            <form action="{{ route("logout") }}" method="POST">
                                @csrf
                                <button class="text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:bg-blue-500 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Выйти</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                    <div class="hidden md:block">
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" placeholder="Search products" class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 sm:text-sm" />
                        </div>
                    </div>


                    <button class="relative text-gray-700 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400" aria-label="View Cart">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 100 4 2 2 0 000-4zm-8-4h16l2-4H4l2 4z" />
                        </svg>
                        <span class="absolute top-0 right-0 -mt-1 -mr-1 px-2 py-0.5 bg-blue-600 dark:bg-blue-500 text-white text-xs font-bold rounded-full">3</span>
                    </button>


                    <button type="button" class="rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <img class="h-8 w-8 rounded-full" src="https://i.pravatar.cc/150" alt="User profile picture">
                    </button>


                    <div class="-mr-2 flex md:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="bg-gray-100 dark:bg-gray-800 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" aria-controls="mobile-menu" aria-expanded="false" x-bind:aria-expanded="mobileMenuOpen.toString()">
                            <span class="sr-only">Open main menu</span>
                            <svg x-show="!mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg x-show="mobileMenuOpen" x-cloak class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu" x-show="mobileMenuOpen" x-cloak>
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" placeholder="Search products" class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 sm:text-sm" />
                </div>
                <a href="#" class="bg-blue-500 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Home</a>
                <a href="#" class="text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:bg-blue-500 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium">Shop</a>
                <a href="#" class="text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:bg-blue-500 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium">Categories</a>
                <a href="#" class="text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:bg-blue-500 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium">About Us</a>
                <a href="#" class="text-gray-700 dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:bg-blue-500 dark:hover:text-white block px-3 py-2 rounded-md text-base font-medium">Contact</a>
            </div>
        </div>
    </nav>
@endauth
