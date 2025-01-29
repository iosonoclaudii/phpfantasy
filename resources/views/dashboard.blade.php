<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-bold mb-4">Benvenuto nella tua Dashboard!</h1>
                <p class="mb-6 text-lg text-gray-700">
                    Questo sito dimostra che con PHP e MySQL puoi creare progetti incredibilmente dinamici e interattivi. Abbiamo realizzato diversi esempi pratici, tra cui:
                </p>

                <h2 class="text-xl font-semibold text-gray-800">Cosa troverai in questo sito?</h2>
                <ul class="list-disc list-inside text-gray-700 mt-3 space-y-2">
                    <li><strong>To-Do List:</strong> Una semplice ma efficace applicazione per gestire le tue attività.</li>
                    <li><strong>Gioco della Pallina:</strong> Un gioco interattivo che mette alla prova la tua memoria e riflessi.</li>
                    <li><strong>Tamagotchi:</strong> Una simulazione digitale di una creatura da accudire, dove puoi nutrirla, farla giocare e dormire.</li>
                </ul>

                <p class="mt-6 text-lg text-gray-700">
                    Con PHP, puoi creare molto di più. Dai giochi interattivi alle applicazioni di gestione, dai sistemi di prenotazione alle API avanzate, le possibilità sono infinite.
                </p>

                <h2 class="text-xl font-semibold text-gray-800 mt-6">Cosa abbiamo dimostrato?</h2>
                <p class="text-gray-700 mt-3">
                    Attraverso questi esempi, abbiamo dimostrato che con PHP, MySQL e un framework come Laravel puoi:
                </p>
                <ul class="list-disc list-inside text-gray-700 mt-3 space-y-2">
                    <li>Gestire dati dinamici e interattivi attraverso database relazionali.</li>
                    <li>Implementare logiche complesse come quelle di un gioco o di un sistema di crescita simulata.</li>
                    <li>Realizzare interfacce responsive e user-friendly utilizzando tecnologie moderne.</li>
                </ul>

                <p class="mt-6 text-lg text-gray-700">
                    Crediamo che con creatività e PHP, il limite sia solo la tua immaginazione.
                </p>

        
            </div>
        </div>
    </div>
</div>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
