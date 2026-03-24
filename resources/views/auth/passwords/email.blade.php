@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-41.5px)] flex items-center justify-center px-4 bg-linear-to-br from-orange-100 to-orange-200">

        <div class="w-full max-w-lg">

            <div class="bg-white shadow-lg rounded-xl border border-gray-100 overflow-hidden">

                <!-- Header -->
                <div class="bg-linear-to-r from-orange-400 via-primary to-orange-700 px-6 py-4 text-lg font-semibold">
                    {{ __('Reset Password') }}
                </div>

                <!-- Body -->
                <div class="p-6">

                    @if (session('status'))
                        <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                        @csrf

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
                                   autofocus
                                   autocomplete="email"
                                   class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                            @error('email')
                            <span class="text-red-500 text-sm">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <button type="submit"
                                class="w-full bg-slate-700 hover:bg-slate-800 text-white py-2 rounded-lg font-semibold transition">
                            {{ __('Send Password Reset Link') }}
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
