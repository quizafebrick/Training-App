@extends('components.layouts')

@section('registration')
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full text-white bg-gray-900 rounded-lg shadow-xl dark:border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-2 md:space-y-4 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-center text-white md:text-2xl">
                        Create your Account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-white">Your
                                Email:</label>
                            <input type="email" name="email_address" id="email_address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.50"
                                placeholder="name@company.com" value="{{ old('email_address') }}">
                            <span class="py-2 text-sm font-medium text-red-500">
                                @error('email_address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-white dark:text-white">Password:</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            <span class="py-2 text-sm font-medium text-red-500">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div>
                            <label for="confirm_password"
                                class="block mb-2 text-sm font-medium text-white dark:text-white">Confirm
                                Password:</label>
                            <input type="password" name="confirm_password" id="confirm-password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900  sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            <span class="py-2 text-sm font-medium text-red-500">
                                @error('confirm_password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-bold rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 hover:duration-300">Create
                            an account</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account?
                            <a href="{{ route('login') }}"
                                class="font-medium text-primary-600 hover:text-blue-600 hover:duration-300 text-gray-50">
                                Login here
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
