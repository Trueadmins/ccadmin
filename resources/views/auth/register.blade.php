@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-41.5px)] flex items-center justify-center px-4 bg-linear-to-br from-orange-100 to-orange-200">

        <div class="w-full max-w-md">

            <div class="bg-white shadow-lg rounded-xl border border-gray-200 overflow-hidden">

                <!-- Header -->
                <div class="bg-linear-to-r from-orange-400 via-primary to-orange-700 px-6 py-4 text-lg font-semibold">
                    {{ __('Register') }}
                </div>

                <!-- Body -->
                <div class="p-6">
                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        <!-- Name -->
                        <div>
                            <label for="name" class="block mb-1 text-sm font-medium">
                                {{ __('Name') }}
                            </label>

                            <input id="name"
                                   type="text"
                                   name="name"
                                   value="{{ old('name') }}"
                                   required
                                   autofocus
                                   autocomplete="name"
                                   class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                            @error('name')
                            <span class="text-red-500 text-sm">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block mb-1 text-sm font-medium">
                                {{ __('Email Address') }}
                            </label>

                            <input id="email"
                                   type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autocomplete="email"
                                   class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                            @error('email')
                            <span class="text-red-500 text-sm">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block mb-1 text-sm font-medium">
                                {{ __('Password') }}
                            </label>

                            <input id="password"
                                   type="password"
                                   name="password"
                                   required
                                   autocomplete="new-password"
                                   class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                            @error('password')
                            <span class="text-red-500 text-sm">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password-confirm" class="block mb-1 text-sm font-medium">
                                {{ __('Confirm Password') }}
                            </label>

                            <input id="password-confirm"
                                   type="password"
                                   name="password_confirmation"
                                   required
                                   autocomplete="new-password"
                                   class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <!-- Submit -->
                        <button type="submit"
                                class="w-full bg-slate-700 hover:bg-slate-800 text-white py-2 rounded-lg font-semibold transition">
                            {{ __('Register') }}
                        </button>

                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection
