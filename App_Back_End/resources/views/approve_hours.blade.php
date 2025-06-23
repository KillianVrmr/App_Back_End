<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Uren goedkeuren</title>
</head>

<body class="flex bg-deeppurple text-white">
    <x-sidebar />

    <div class="flex-1 p-16">
        <h1 class="font-bold text-3xl">Uren goedkeuren</h1>

        @if ($pendingShifts->isEmpty())
            <div class="bg-white text-gray-600 p-6 mt-6 rounded-lg shadow-sm">
                Geen uren om goed te keuren.
            </div>
        @else
            <div class="space-y-6">
                @foreach ($pendingShifts as $shift)
                    <div class="bg-white text-black p-6 rounded-lg shadow-sm border border-gray-200">
                        <p class="text-sm text-gray-500 mb-2">{{ $shift->shift_date->format('d/m/Y') }}</p>

                        @foreach ($shift->users as $user)
                            @php
                                $pivot = $user->pivot;
                                $actualStart = optional($pivot->actual_start)->format('H:i');
                                $actualEnd = optional($pivot->actual_end)->format('H:i');
                            @endphp

                            <div class="mb-6 border-b border-gray-300 pb-4">
                                <h2 class="text-lg font-semibold">{{ $user->name }} {{ $user->lastname }}</h2>

                                <div class="grid md:grid-cols-2 gap-4 mt-2 mb-4">
                                    <div>
                                        <h3 class="font-medium mb-1">Geplande shift</h3>
                                        <p class="text-sm text-gray-600">
                                            {{ $shift->planned_start->format('H:i') }} - {{ $shift->planned_end->format('H:i') }}
                                        </p>
                                    </div>
                                    <div>
                                        <h3 class="font-medium mb-1">Opgegeven uren</h3>
                                        <p class="text-sm text-gray-600">
                                            {{ $actualStart ?? '—' }} - {{ $actualEnd ?? '—' }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Actieknoppen -->
                                <div class="flex space-x-2">
                                    <form method="POST" action="{{ route('shifts.approve', ['shiftId' => $shift->id, 'userId' => $user->id]) }}">
                                        @csrf
                                        <button type="submit" class="bg-green  hover:bg-green-hover text-white px-4 py-2 rounded text-sm">
                                            Goedkeuren
                                        </button>
                                    </form>

                                    <button
                                        onclick="document.getElementById('editModal-{{ $shift->id }}-{{ $user->id }}').classList.remove('hidden')"
                                        class="bg-yellow-500 hover:bg-yellow-700 text-white px-4 py-2 rounded text-sm"
                                    >
                                        Aanpassen
                                    </button>
                                </div>

                                <!-- Modal -->
                                <div id="editModal-{{ $shift->id }}-{{ $user->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                                    <div class="bg-white text-black p-6 rounded-md w-full max-w-md">
                                        <h3 class="font-bold mb-4">Uren aanpassen – {{ $user->name }}</h3>

                                        <form method="POST" action="{{ route('shifts.update', ['shiftId' => $shift->id, 'userId' => $user->id]) }}">
                                            @csrf
                                            @method('PUT')

                                            <label class="block mb-2">Starttijd:</label>
                                            <input
                                                type="datetime-local"
                                                name="actual_start"
                                                class="w-full mb-4 p-2 border rounded"
                                                value="{{ optional($pivot->actual_start)->format('Y-m-d\TH:i') }}"
                                                required
                                            >

                                            <label class="block mb-2">Eindtijd:</label>
                                            <input
                                                type="datetime-local"
                                                name="actual_end"
                                                class="w-full mb-4 p-2 border rounded"
                                                value="{{ optional($pivot->actual_end)->format('Y-m-d\TH:i') }}"
                                                required
                                            >

                                            <div class="flex justify-end">
                                                <button type="button"
                                                    onclick="document.getElementById('editModal-{{ $shift->id }}-{{ $user->id }}').classList.add('hidden')"
                                                    class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded mr-2"
                                                >
                                                    Annuleren
                                                </button>

                                                <button type="submit" class="bg-green hover:bg-green-hover text-white px-4 py-2 rounded">
                                                    Opslaan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
