<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Enrollment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('enrollments.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="student_id" class="block text-gray-700">Student</label>
                            <select name="student_id" id="student_id" class="block mt-1 w-full border-gray-300 rounded">
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="course_id" class="block text-gray-700">Course</label>
                            <select name="course_id" id="course_id" class="block mt-1 w-full border-gray-300 rounded">
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="enrollment_date" class="block text-gray-700">Enrollment Date</label>
                            <input type="date" name="enrollment_date" id="enrollment_date" class="block mt-1 w-full border-gray-300 rounded">
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                Save Enrollment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
