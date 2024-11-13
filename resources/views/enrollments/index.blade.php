<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enrollments') }}
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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('enrollments.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Enrollment</a>
                    <table class="min-w-full bg-white mt-4">
                        <thead>
                            <tr>
                                <th class="py-2">Student</th>
                                <th class="py-2">Course</th>
                                <th class="py-2">Enrollment Date</th>
                                <th class="py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enrollments as $enrollment)
                            <tr>
                                <td class="py-2">{{ $enrollment->student->name }}</td>
                                <td class="py-2">{{ $enrollment->course->title }}</td>
                                <td class="py-2">{{ $enrollment->enrollment_date }}</td>
                                <td class="py-2">
                                    <a href="{{ route('enrollments.edit', $enrollment) }}" class="text-blue-500">Edit</a> |
                                    <form action="{{ route('enrollments.destroy', $enrollment) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
