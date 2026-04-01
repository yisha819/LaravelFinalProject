<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Leave Request Details') }}
            </h2>
            <a href="{{ route('leave-requests.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 p-6">
                
                <div class="border-b border-gray-200 pb-5 mb-5">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Leave Request Information
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Details of the employee's leave request.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-6">
                    <div class="sm:col-span-1 border border-gray-100 rounded-lg p-5 bg-gray-50 shadow-sm">
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                            Employee
                        </dt>
                        <dd class="mt-1 text-base text-gray-900 font-semibold">
                            {{ $leaveRequest->employee->full_name ?? 'N/A' }}
                        </dd>
                    </div>

                    <div class="sm:col-span-1 border border-gray-100 rounded-lg p-5 bg-gray-50 shadow-sm">
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                            Leave Type
                        </dt>
                        <dd class="mt-1 text-base text-gray-900 font-semibold">
                            {{ $leaveRequest->type }}
                        </dd>
                    </div>

                    <div class="sm:col-span-1 border border-gray-100 rounded-lg p-5 bg-gray-50 shadow-sm">
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                            Status
                        </dt>
                        <dd class="mt-1 text-base">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $leaveRequest->status === 'Approved' ? 'bg-green-100 text-green-800 border-green-200' : 
                                  ($leaveRequest->status === 'Pending' ? 'bg-yellow-100 text-yellow-800 border-yellow-200' : 
                                  'bg-red-100 text-red-800 border-red-200') }} border">
                                {{ $leaveRequest->status }}
                            </span>
                        </dd>
                    </div>

                    <div class="sm:col-span-1 border border-gray-100 rounded-lg p-5 bg-gray-50 shadow-sm">
                        <dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                            Start Date
                        </dt>
                        <dd class="mt-1 text-base text-gray-900 font-semibold">
                            {{ \Carbon\Carbon::parse($leaveRequest->start_date)->format('M d, Y') }}
                        </dd>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200 flex space-x-3">
                    <a href="/leave-requests/{{ $leaveRequest->id }}/edit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>
                        Edit this Request
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
