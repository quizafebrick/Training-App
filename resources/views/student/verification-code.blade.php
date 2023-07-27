@extends('student-components.layouts')

@section('student-verification-code')
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full text-white bg-gray-900 rounded-lg shadow-xl dark:border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-center text-white md:text-2xl">
                        Verification Code
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('student-verified') }}" method="POST">
                        @csrf
                        <div>
                            <label for="verification_token" class="block mb-2 text-lg font-medium text-white">
                                Enter your Code
                            </label>
                            <input type="text" name="verification_token" id="verification_token"
                                class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 font-medium text-lg"
                                placeholder="Enter Verification Code" value="{{ old('verification_token') }}">
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 hover:duration-300 font-bold">
                            Verify Code
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
