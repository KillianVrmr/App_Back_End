<x-guest-layout title="Register">
    <form method="POST" action="{{ route('register.post') }}">
        @csrf 

        <input name="email" type="email" class="" placeholder="Email" required>
        <input name="name" type="text" class="" placeholder="name" required>
        <input name="password" type="password" class="" placeholder="Password" required>

        <button class="">Register</button>
    </form>
</x-guest-layout>
