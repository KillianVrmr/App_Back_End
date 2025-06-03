<x-guest-layout title="Login">
    <form method="POST" action="{{ route('login.post') }}">
        @csrf 

        <input name="email" type="email" class="" placeholder="Email" required>
        <input name="password" type="password" class="" placeholder="Password" required>

        <button class="">Login</button>
    </form>
</x-guest-layout>
