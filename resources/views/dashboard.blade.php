<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                        <h2 class="text-lg font-semibold mb-4">Gérer les tâches</h2>
                        <ul>
                            <li><a href="{{ route('admin.taches.index') }}" class="text-blue-500 hover:underline">Liste des tâches</a></li>
                            <li><a href="{{ route('admin.taches.create') }}" class="text-blue-500 hover:underline">Ajouter une tâche</a></li>
                        </ul> 
                </div>
                
            </div>
        </div>
    </div>
    <div class="py-9">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-lg font-semibold mb-4">Gérer les collaborateurs</h2>
                        <ul>
                            <li><a href="{{ route('admin.collaborateurs.index') }}" class="text-blue-500 hover:underline">Liste des collaborateurs</a></li>
                            <li><a href="{{ route('admin.collaborateurs.create') }}" class="text-blue-500 hover:underline">Ajouter un collaborateur</a></li>
                        </ul>
                </div>  
            </div>
        </div>

        
        
    </div>
</x-app-layout>
