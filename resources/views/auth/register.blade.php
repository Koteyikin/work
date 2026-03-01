@extends('layouts.main')

@section('title', 'Регистраация')

@section('body')



    <div class="min-h-screen bg-gray-100 dark:bg-neutral-900 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white dark:bg-neutral-800 rounded-xl shadow-lg overflow-hidden">
            <div class="px-10 py-8">
                <div class="text-center">
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900 dark:text-white">
                        Create an Account
                    </h2>
                    <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                        Already registered?
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-indigo-500 dark:hover:text-indigo-400">
                            Log in
                        </a>
                    </p>
                </div>

                <div class="mt-8">
                    <div class="space-y-6">
                        <div>
                            <button type="button" class="relative w-full flex justify-center items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-neutral-900 dark:border-neutral-700 text-gray-500 dark:text-neutral-300 hover:bg-gray-50 dark:hover:bg-neutral-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="sr-only">Sign up with Google</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M19.983 10.147a.05.05 0 00-.053-.037c-.37-.187-1.76-.914-4.44-.914-2.23 0-4.12 1.013-4.98 2.28-1.25-2.25-2.63-3.987-3.99-5.24-.5-.453-1.047-.88-1.62-.88-1.38 0-3.74.4-3.74 3.2 0 1.7 1.14 3.467 3.14 4.73 1.2 2.2 1.84 3.127 1.84 3.913 0 1.067-.56 1.814-1.39 2.24-.85.44-1.91.714-3.11.714-2.37 0-5.21-.834-5.21-3.76 0-1.96 1.79-3.294 4.33-3.294 1.25 0 2.28.614 2.86 1.387.6.747.73 1.12.73 2.067 0 1.3-.56 2.04-1.17 2.573-.36.307-.7.534-.98.667-.74.334-2.21.787-4.37.787-2.78 0-4.7-1.147-4.7-3.16 0-1.973 2.25-3.467 4.42-3.467 1.02 0 1.96.427 2.54 1.02.56.573.65.987.65 2.087 0 1.12-.45 1.893-.94 2.4-.31.32-.59.56-.82.72-.55.4-1.96.987-4.1.987-2.65 0-4.57-.987-4.57-2.853 0-2.467 3.51-2.8 4.12-2.8.6 0 1.38.093 2.08.347.84.3 2.45.84 4.54.84 3.64 0 5.83-1.134 5.83-3.307 0-2.067-2.05-3.454-4.33-3.454-2.1 0-3.83.867-4.4 1.84-.55.947-.45 1.414-.45 2.614 0 1.26.59 2.28 1.39 3.013.8.733 1.89 1.133 3.11 1.133 1.49 0 3.3-.493 4.33-.733.98-.227 1.96-.733 2.8-1.32l-.43-1.614z" fill="#4285F4"/>
                                    <path d="M10.353 18.997c-1.98-.003-3.88-.623-5.45-1.69l-1.38 1.71a9.97 9.97 0 008.8 2.97.957.957 0 00.03-.003l-.003-.04v-.027a9.954 9.954 0 00-2.007-3.94z" fill="#34A853"/>
                                    <path d="M3.323 12.577c-.17-.46-.327-.957-.46-1.487-1.48.147-2.81.777-3.86 1.84l1.39 1.71c.84-.56 2.02-.887 3.03-.887 1.57 0 3.13.52 4.28 1.52-.29-.3-2.74-2.833-2.83-4.187a.234.234 0 00.027-.04z" fill="#FBBC05"/>
                                    <path d="M19.953 11.58a9.945 9.945 0 00-2.85-5.387l-1.65 1.35c1.12 1.013 1.85 2.387 2.14 4.037a.388.388 0 00.01.05l.007-.007.023-.01.007-.007a.01.01 0 00.003 0c.04-.02.05-.03.06-.03v-.01c-.03-.02-.03-.04-.06-.06l-.007-.003-.023-.01-.007-.003a.107.107 0 00-.01 0l.007.007a.142.142 0 00-.007 0c-.01 0-.03 0-.03.01a.302.302 0 00-.02-.01.112.112 0 00-.007 0v.01a.036.036 0 00.01.02l.007.007a.013.013 0 00.003 0c.02.02.03.04.06.06l.007.003.023.01.007.003a.013.013 0 00.003 0c.01-.01.02-.02.03-.03a.307.307 0 00.02-.04.115.115 0 00.007-.01v.01a.057.057 0 00-.003-.037z" fill="#EA4335"/>
                                </svg>
                                <span class="ml-3">Continue with Google</span>
                            </button>
                        </div>

                        <div class="relative">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-300 dark:border-neutral-700"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
              <span class="px-3 bg-white dark:bg-neutral-800 text-gray-500 dark:text-neutral-400">
                Or register with your details
              </span>
                            </div>
                        </div>
                    </div>

                    <form class="mt-8 space-y-6" action="{{ route("register.store") }}" method="POST">
                        @csrf
                        <input type="hidden" name="remember" value="true">
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Name
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>
                                    </div>
                                    <input id="name" name="name" type="text" autocomplete="name" required class="appearance-none block w-full px-3 py-2 pl-10 border border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 rounded-md placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Email address
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>
                                    </div>
                                    <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 pl-10 border border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 rounded-md placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Password
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2h1a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2h1zm7-5a3 3 0 11-6 0 3 3 0 016 0zm-1 9H6v3a1 1 0 102 0v-3h2a1 1 0 100-2h-2V8a1 1 0 10-2 0v3H5a1 1 0 100 2h7z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 pl-10 border border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 rounded-md placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="confirm-password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Confirm Password
                                </label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2h1a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2h1zm7-5a3 3 0 11-6 0 3 3 0 016 0zm-1 9H6v3a1 1 0 102 0v-3h2a1 1 0 100-2h-2V8a1 1 0 10-2 0v3H5a1 1 0 100 2h7z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input id="confirm-password" name="confirm-password" type="password" autocomplete="new-password" required class="appearance-none block w-full px-3 py-2 pl-10 border border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 rounded-md placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="flex items-center">
                                <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded dark:bg-neutral-700 dark:border-neutral-500">
                                <label for="terms" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                                    I agree to the
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-indigo-500 dark:hover:text-indigo-400">
                                        Terms and Conditions
                                    </a>
                                </label>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="px-4 py-6 bg-gray-50 dark:bg-neutral-900 border-t border-gray-200 dark:border-neutral-700 sm:px-10">
                <p class="text-xs text-gray-500 dark:text-neutral-500 text-center">
                    By registering, you agree to our <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-indigo-500 dark:hover:text-indigo-400">terms of service</a>, <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-indigo-500 dark:hover:text-indigo-400">privacy policy</a>, and <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-indigo-500 dark:hover:text-indigo-400">cookie policy</a>.
                </p>
            </div>
        </div>
    </div>


@endsection
