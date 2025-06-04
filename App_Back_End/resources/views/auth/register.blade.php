<x-guest-layout title="Register">
    <div class="flex flex-col ">
        <div class="flex items-center justify-center p-16">
            <h1 class="font-bold text-3xl">Registreer</h1>
        </div>
        <div class="flex items-center justify-center">
        <form method="POST" action="{{ route('register.post') }}" class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full max-w-4xl">
            @csrf 
            <div class="flex flex-col space-y-4">
                <div>
                <input name="email" type="email" class="border-b border-gray-400 focus:outline-none p-2 w-full form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="E-mail" required>
                @error('email')
                <div class="invalid-feedback text-red-500">{{ $message }}</div>
                @enderror    
                </div>
                <div>
                <input name="firstname" type="text" class="border-b border-gray-400 focus:outline-none p-2 w-full form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}" placeholder="Voornaam" required>
                @error('firstname')
                <div class="invalid-feedback text-red-500">{{ $message }}</div>
                @enderror 
                </div>
                <div>
                <input name="lastname" type="text" class="border-b border-gray-400 focus:outline-none p-2 w-full form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" placeholder="Achternaam" required>
                @error('lastname')
                <div class="invalid-feedback text-red-500">{{ $message }}</div>
                @enderror 
                </div>
                <div>
                <input name="password" type="password" class="border-b border-gray-400 focus:outline-none p-2 w-full form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Wachtwoord" required>
                @error('password')
                <div class="invalid-feedback text-red-500">{{ $message }}</div>
                @enderror 
                </div>
                <div>
                <input name="password_confirmation" type="password" class="border-b border-gray-400 focus:outline-none p-2 w-full form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" placeholder="Herhaal wachtwoord" required>
                @error('password_confirmation')
                <div class="invalid-feedback text-red-500">{{ $message }}</div>
                @enderror 
                </div>
            </div>
            <div class="flex flex-col space-y-4">
                <div>
                <input name="function_id" type="number" class="border-b border-gray-400 focus:outline-none p-2 w-full form-control @error('function_id') is-invalid @enderror" value="{{ old('function_id') }}" placeholder="Functie">
                @error('function_id')
                <div class="invalid-feedback text-red-500">{{ $message }}</div>
                @enderror    
                </div>
                <div>
                <input name="blood_type" type="text" class="border-b border-gray-400 focus:outline-none p-2 w-full form-control @error('blood_type') is-invalid @enderror" value="{{ old('blood_type') }}" placeholder="Bloed groep">
                @error('blood_type')
                <div class="invalid-feedback text-red-500">{{ $message }}</div>
                @enderror    
                </div>
                <div>
                <input name="emergency_contact" type="text" class="border-b border-gray-400 focus:outline-none p-2 w-full form-control @error('emergency_contact') is-invalid @enderror" value="{{ old('emergency_contact') }}" placeholder="Contactpersoon voor noodgevallen" required>
                @error('emergency_contact')
                <div class="invalid-feedback text-red-500">{{ $message }}</div>
                @enderror    
                </div>
                <div>
                <input name="contact_number" type="text" class="border-b border-gray-400 focus:outline-none p-2 w-full form-control @error('contact_number') is-invalid @enderror" value="{{ old('contact_number') }}" placeholder="telefoonnummer contactpersoon" required>
                @error('contact_number')
                <div class="invalid-feedback text-red-500">{{ $message }}</div>
                @enderror    
                </div>
            </div>

            <div class="md:col-span-2 mt-6 flex justify-end">
            <button type="submit" class="bg-green text-white px-4 py-2 rounded hover:opacity-80">
                Account aanmaken
            </button>
            </div>
        </form>
        </div>
    </div>
</x-guest-layout>
