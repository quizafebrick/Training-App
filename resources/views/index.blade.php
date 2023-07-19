@extends('components.layouts')

<?php echo header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Content-Type: text/html');
?>

@section('login')
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full text-white bg-gray-900 rounded-lg shadow-xl dark:border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-center text-white md:text-2xl">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('user-check') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900e">Your
                                email</label>
                            <input type="email" name="email_address" id="email_address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 font-medium text-lg"
                                placeholder="name@company.com" value="{{ old('email_address') }}">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 font-medium text-lg">
                        </div>
                        <div class="flex items-center justify-end">
                            <a href="#"
                                class="text-sm font-medium text-primary-600 hover:text-blue-600 hover:duration-300">
                                Forgot password?
                            </a>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 hover:duration-300 font-bold">Sign
                            in</button>
                        <p class="text-sm font-light text-gray-500">
                            Don’t have an account yet?
                            <a href="{{ route('register') }}"
                                class="font-medium text-gray-50 text-primary-600 hover:text-blue-600 hover:duration-300">
                                Sign up
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
