<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="flex bg-deeppurple">
    <x-sidebar />

    <div class="flex-1 p-16">
        <h1 class="font-bold text-3xl text-white">Uren goedkeuren</h1>
        @if ($pendingShifts->isEmpty())
        <div class="bg-white rounded-lg p-6 shadow-sm">
            <p class="text-gray-600">Geen uren om goed te keuren.</p>
        </div>
        @else
        <div class="space-y-4">
            @foreach ($pendingShifts as $shift)
            <div class="bg-white rounded-lg p-6 mt-4 shadow-sm border border-gray-200">
                <div class="mb-4">
                    <h2 class="text-lg font-semibold text-gray-900">{{ $shift->user->name }} {{ $shift->user->lastname }}</h2>
                    <p class="text-sm text-gray-500">{{ $shift->shift_date->format('d/m/Y') }}</p>
                </div>

                @if($shift->notes)
                <div class="mb-4">
                    <p class="text-sm text-gray-600">
                        <span class="font-medium">Opmerking:</span> {{ $shift->notes }}
                    </p>
                </div>
                @endif

                <div class="grid md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Geplande shift</h3>
                        <p class="text-sm text-gray-600">{{ $shift->planned_start->format('H:i')}} - {{$shift->planned_end->format('H:i')}}</p>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Opgegeven uren</h3>
                        <p class="text-sm text-gray-600">{{ $shift->actual_start->format('H:i')}} - {{$shift->actual_end->format('H:i')}}</p>
                    </div>
                    <div id="editModal-{{ $shift->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-md w-full max-w-md">
        <h3 class="font-bold mb-4">Uren aanpassen</h3>
        <form method="POST" action="{{ route('shifts.update', $shift->id) }}">
            @csrf
            @method('PUT')

            <label for="actual_start" class="block mb-2">Starttijd:</label>
            <input type="datetime-local" name="actual_start" class="w-full mb-4 p-2 border rounded" 
                value="{{ $shift->actual_start->format('Y-m-d\TH:i') }}" required>

            <label for="actual_end" class="block mb-2">Eindtijd:</label>
            <input type="datetime-local" name="actual_end" class="w-full mb-4 p-2 border rounded" 
                value="{{ $shift->actual_end->format('Y-m-d\TH:i') }}" required>

            <div class="flex justify-end">
                <button type="button" onclick="document.getElementById('editModal-{{ $shift->id }}').classList.add('hidden')" 
                    class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuleren</button>

                <button type="submit" class="bg-green hover:bg-green-hover text-white px-4 py-2 rounded">Opslaan</button>
            </div>
        </form>
    </div>
</div>
                </div>

                <div class="flex">
                    <form method="POST" action="{{ route('shifts.approve', $shift->id) }}">
                        @csrf
                        <button type="submit" class="bg-green hover:bg-green-hover text-white px-4 py-2 mr-2 rounded-md text-sm font-medium transition-colors">
                            Goedkeuren
                        </button>
                    </form>
                    <!-- Aanpassen-knop -->
                    <button onclick="document.getElementById('editModal-{{ $shift->id }}').classList.remove('hidden')"
                        class="bg-yellow-500 hover:bg-yellow-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                        Aanpassen
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</body>

</html>