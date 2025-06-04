<x-guest-layout title="Logout">
    <form method="POST" action="{{ route('logout.post') }}">
        @csrf 

        <button type="submit" class="">Logout</button>
    </form>
</x-guest-layout>