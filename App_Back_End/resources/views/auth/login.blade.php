<x-guest-layout title="Login">
    <div class="flex flex-col ">
        <div class="flex items-center justify-center p-20">
            <h2 class="text-2xl font-bold">Login</h2>
        </div>
        <div class="flex items-center justify-center">
            <form method="POST" action="{{ route('login.post') }}" class="flex flex-col gap-4 w-full max-w-md">
                @csrf 

                <input name="email" type="email" placeholder="E-mail" class="border-b border-gray-400 focus:outline-none p-2 w-420px" required>
                <input name="password" type="password" placeholder="Wachtwoord" class="border-b border-gray-400 focus:outline-none p-2 w-420px" required>

                <div class="mt-20 flex justify-center">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-60">Login</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
