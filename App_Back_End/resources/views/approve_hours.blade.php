<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <x-header></x-header>

    <div>
        <h2>Onderstaande uren moeten nog worden goedgekeurd:</h2>
    </div>
    @foreach ($pendingShifts as $shift)
    <div>
        <p>{{ $shift->user->name }} - {{ $shift->shift_date }}</p>
        <form method="POST" action="{{ route('shifts.approval.approve', $shift->id) }}">
            @csrf
            <button type="submit">Goedkeuren</button>
        </form>
    </div>
@endforeach
</body>
</html>