<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/css/calendar.css', 'resources/js/calendar.js'])
    <title>Uren indienen</title>
</head>

<body class="bg-deeppurple">
    <div class="flex">
        <div>
            <x-sidebar></x-sidebar>
        </div>
        <div class="p-16 w-full h-screen overflow-y-auto">
            <h1 class="font-bold text-3xl text-white mb-8">Uren indienen</h1>
            
            @if($pendingShifts->count() > 0)
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($pendingShifts as $shift) 
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $shift->project->name ?? 'Project' }}</h3>
                                <p class="text-gray-600">{{ \Carbon\Carbon::parse($shift->shift_date)->format('d-m-Y') }}</p>
                                <p class="text-sm text-gray-500">
                                    Geplande tijd: {{ \Carbon\Carbon::parse($shift->planned_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($shift->planned_end)->format('H:i') }}
                                </p>
                            </div>

                            <form action="{{ route('timesheet.submit', $shift->id) }}" method="POST" class="space-y-4">
                                @csrf
                                
                                <!-- Starttijd -->
                                <div>
                                    <label for="actual_start_{{ $shift->id }}" class="block text-sm font-medium text-gray-700 mb-1">
                                        Starttijd
                                    </label>
                                    <input 
                                        type="time" 
                                        id="actual_start_{{ $shift->id }}" 
                                        name="actual_start" 
                                        value="{{ old('actual_start', \Carbon\Carbon::parse($shift->planned_start)->format('H:i')) }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required
                                    >
                                    @error('actual_start')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Eindtijd -->
                                <div>
                                    <label for="actual_end_{{ $shift->id }}" class="block text-sm font-medium text-gray-700 mb-1">
                                        Eindtijd
                                    </label>
                                    <input 
                                        type="time" 
                                        id="actual_end_{{ $shift->id }}" 
                                        name="actual_end" 
                                        value="{{ old('actual_end', \Carbon\Carbon::parse($shift->planned_end)->format('H:i')) }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required
                                    >
                                    @error('actual_end')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Pauze -->
                                <div>
                                    <label for="actual_break_{{ $shift->id }}" class="block text-sm font-medium text-gray-700 mb-1">
                                        Pauze (minuten)
                                    </label>
                                    <input 
                                        type="number" 
                                        id="actual_break_{{ $shift->id }}" 
                                        name="actual_break" 
                                        value="{{ old('actual_break', 0) }}"
                                        min="0"
                                        max="480"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="0"
                                    >
                                    @error('actual_break')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Notities -->
                                <div>
                                    <label for="notes_{{ $shift->id }}" class="block text-sm font-medium text-gray-700 mb-1">
                                        Notities (optioneel)
                                    </label>
                                    <textarea 
                                        id="notes_{{ $shift->id }}" 
                                        name="notes" 
                                        rows="3"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                                        placeholder="Voeg eventuele opmerkingen toe...">{{ old('notes') }}</textarea>
                                    @error('notes')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Indienen knop -->
                                <button 
                                    type="submit" 
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                >
                                    Uren indienen
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                    <div class="text-gray-400 mb-4">
                        <svg class="mx-auto h-16 w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Geen openstaande uren</h3>
                    <p class="text-gray-500">Je hebt momenteel geen diensten waarvoor je nog uren moet indienen.</p>
                </div>
            @endif

            <!-- Recent ingediend -->
            @if(isset($recentlySubmitted) && $recentlySubmitted->count() > 0)
                <div class="mt-12">
                    <h2 class="text-xl font-semibold text-white mb-6">Recent ingediend</h2>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Datum</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tijd</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($recentlySubmitted as $shift)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $shift->project->name ?? 'Project' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($shift->shift_date)->format('d-m-Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($shift->actual_start)->format('H:i') ?? '-' }} - {{ \Carbon\Carbon::parse($shift->actual_end)->format('H:i') ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                                @if($shift->submitted_at) bg-green-100 text-green-800
                                                @else bg-yellow-100 text-yellow-800 @endif">
                                                {{ $shift->submitted_at ? 'Ingediend' : 'Openstaand' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
