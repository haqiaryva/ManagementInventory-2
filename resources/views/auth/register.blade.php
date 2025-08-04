<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form method="POST" action="{{ route('register.store') }}" class="space-y-6">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <div class="flex items-center gap-4">
                            <label class="w-40 text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                            <x-text-input id="name"
                                class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-1 ml-44 text-sm text-red-600" />
                    </div>

                    {{-- Username --}}
                    <div>
                        <div class="flex items-center gap-4">
                            <label class="w-40 text-sm font-medium text-gray-700">{{ __('Username') }}</label>
                            <x-text-input id="email"
                                class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                type="text" name="email" :value="old('email')" required autocomplete="off" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1 ml-44 text-sm text-red-600" />
                    </div>

                    {{-- Password --}}
                    <div>
                        <div class="flex items-center gap-4">
                            <label class="w-40 text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                            <x-text-input id="password"
                                class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                type="password" name="password" required autocomplete="new-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1 ml-44 text-sm text-red-600" />
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <div class="flex items-center gap-4">
                            <label class="w-40 text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                            <x-text-input id="password_confirmation"
                                class="w-full py-2 px-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 ml-44 text-sm text-red-600" />
                    </div>

                    {{-- Submit Button --}}
                    <div class="flex justify-end mt-8">
                        <button type="submit"
                            class="bg-gray-500 hover:bg-gray-900 text-white font-semibold py-2 px-6 rounded-full transition duration-200 inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor"
                                viewBox="0 0 448 512">
                                <path
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                            </svg>
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
