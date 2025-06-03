<x-guest-layout title="Register">
    <form method="POST" action="{{ route('register.post') }}">
        @csrf 

        <input name="email" type="email" class="" placeholder="E-mail" required>
        <input name="name" type="text" class="" placeholder="Voornaam" required>
        <input name="lastName" type="text" class="" placeholder="Achternaam" required>
        <input name="password" type="password" class="" placeholder="Password" required>
        <input name="repeatPassword" type="password" class="" placeholder="Herhaal wachtwoord" required>
        <input name="function" type="select" class="" placeholder="Functie" required>
        <input name="bloodType" type="text" class="" placeholder="Bloed groep">
        <input name="emergencyContact" type="text" class="" placeholder="Contactpersoon voor noodgevallen" required>
        <input name="contactNumber" type="text" class="" placeholder="telefoonnummer contactpersoon" required>


        <button class="">Account aanmaken</button>
    </form>
</x-guest-layout>
