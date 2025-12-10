@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-6">Reset Password</h2>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror" 
                           required autocomplete="email" autofocus>
                                @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                        </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input id="password" type="password" name="password" 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror" 
                           required autocomplete="new-password">
                                @error('password')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                        </div>

                <div class="mb-6">
                    <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <input id="password-confirm" type="password" name="password_confirmation" 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                           required autocomplete="new-password">
                        </div>

                <div class="mb-4">
                    <button type="submit" class="w-full px-6 py-2 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-600">
                        Reset Password
                                </button>
                </div>
            </form>
    </div>
</div>
@endsection
