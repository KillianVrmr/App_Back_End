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
                    <p class="text-sm text-gray-500">{{ $shift->shift_date }}</p>
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
                        <p class="text-sm text-gray-600">{{ $shift->planned_start}} - {{$shift->planned_end}}</p>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Opgegeven uren</h3>
                        <p class="text-sm text-gray-600">{{ $shift->actual_start}} - {{$shift->actual_end}}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('shifts.approve', $shift->id) }}">
                    @csrf
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                        Goedkeuren
                    </button>
                </form>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</body>

</html>