<x-guest-layout title="Login">
    <div class="flex flex-col ">
        <div class="flex items-center justify-center p-16">
            <h1 class="font-bold text-3xl">Login</h1>
        </div>
        <div class="flex items-center justify-center">
            <form method="POST" action="{{ route('login.post') }}" class="flex flex-col gap-4 w-full max-w-md">
                @csrf 

                <input name="email" type="email" placeholder="E-mail" class="border-b border-gray-400 focus:outline-none p-2 w-420px" required>
                <input name="password" type="password" placeholder="Wachtwoord" class="border-b border-gray-400 focus:outline-none p-2 w-420px" required>

                <div class="mt-20 flex justify-center" >
                    <button type="submit" class="bg-green text-white px-4 py-2 rounded hover:opacity-80 cursor-pointer w-60">Login</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
