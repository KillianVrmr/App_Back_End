<x-guest-layout title="Register">
    <div class="flex flex-col ">
        <div class="flex items-center justify-center p-20">
            <h2 class="text-2xl font-bold">Account aanmaken</h2>
        </div>
        <div class="flex items-center justify-center">
        <form method="POST" action="{{ route('register.post') }}" class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full max-w-4xl">
            @csrf 
            <div class="flex flex-col space-y-4">
                <input name="email" type="email" class="border-b border-gray-400 focus:outline-none p-2 w-full" placeholder="E-mail" required>
                <input name="name" type="text" class="border-b border-gray-400 focus:outline-none p-2 w-full" placeholder="Voornaam" required>
                <input name="lastName" type="text" class="border-b border-gray-400 focus:outline-none p-2 w-full" placeholder="Achternaam" required>
                <input name="password" type="password" class="border-b border-gray-400 focus:outline-none p-2 w-full" placeholder="Wachtwoord" required>
                <input name="repeatPassword" type="password" class="border-b border-gray-400 focus:outline-none p-2 w-full" placeholder="Herhaal wachtwoord" required>
            </div>
            <div class="flex flex-col space-y-4">
                <input name="function" type="text" class="border-b border-gray-400 focus:outline-none p-2 w-full" placeholder="Functie" required>
                <input name="bloodType" type="text" class="border-b border-gray-400 focus:outline-none p-2 w-full" placeholder="Bloed groep">
                <input name="emergencyContact" type="text" class="border-b border-gray-400 focus:outline-none p-2 w-full" placeholder="Contactpersoon voor noodgevallen" required>
                <input name="contactNumber" type="text" class="border-b border-gray-400 focus:outline-none p-2 w-full" placeholder="telefoonnummer contactpersoon" required>
            </div>

            <div class="md:col-span-2 mt-6 flex justify-end">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Account aanmaken
            </button>
            </div>
        </form>
        </div>
    </div>
</x-guest-layout>
