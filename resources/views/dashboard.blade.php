<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Navigation Links -->
            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-gray-100 border-b border-gray-200 flex space-x-4">
                    <a href="{{ route('dashboard') }}" class="text-gray-800 hover:text-blue-500">Dashboard</a>
                    <a href="{{ route('enrollments.index') }}" class="text-gray-800 hover:text-blue-500">Enrollments</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
