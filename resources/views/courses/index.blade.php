<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('courses.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Course</a>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2">Title</th>
                                <th class="py-2">Description</th>
                                <th class="py-2">Teacher</th>
                                <th class="py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td class="py-2">{{ $course->title }}</td>
                                    <td class="py-2">{{ $course->description }}</td>
                                    <td class="py-2">
                                        {{ $course->teacher ? $course->teacher->name : 'No Teacher Assigned' }}
                                    </td>
                                    <td class="py-2">
                                        <a href="{{ route('courses.edit', $course) }}" class="text-blue-500">Edit</a> |
                                        <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline">
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
