<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teachers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('teachers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Teacher</a>
                    <table class="min-w-full bg-white mt-4">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Name</th>
                                <th class="py-2 px-4 border-b">Email</th>
                                <th class="py-2 px-4 border-b">Birth Date</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $teacher->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $teacher->email }}</td>
                                    <td class="py-2 px-4 border-b">{{ $teacher->birth_date }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('teachers.edit', $teacher) }}" class="text-blue-500">Edit</a> |
                                        <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" class="inline">
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
