<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Attendances Management System') }}
            </h2>
            <a href="/attendances/create" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Add New Attendance
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-r-md shadow-sm" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700 font-medium">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-600">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-semibold text-gray-600" width="80px">No</th>
                                    <th scope="col" class="px-6 py-4 font-semibold text-gray-600">Employee</th>
                                    <th scope="col" class="px-6 py-4 font-semibold text-gray-600">Date</th>
                                    <th scope="col" class="px-6 py-4 font-semibold text-gray-600">Check In</th>
                                    <th scope="col" class="px-6 py-4 font-semibold text-gray-600">Check Out</th>
                                    <th scope="col" class="px-6 py-4 font-semibold text-gray-600">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($attendances as $attendance)
                                    <tr class="bg-white hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ ++$i }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900">{{ optional($attendance->employee)->full_name ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 text-gray-500">{{ $attendance->date }}</td>
                                        <td class="px-6 py-4 text-gray-500">{{ $attendance->check_in }}</td>
                                        <td class="px-6 py-4 text-gray-500">{{ $attendance->check_out }}</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $attendance->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-10 text-center text-gray-500 bg-gray-50">
                                            There are no attendance records yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        @if(method_exists($attendances, 'hasPages') && $attendances->hasPages())
                            <div class="mt-4 px-2">
                                {!! $attendances->links() !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
