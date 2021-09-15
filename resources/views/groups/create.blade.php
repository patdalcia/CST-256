<x-app-layout>
<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg col-md-8 mx-auto">
	<x-slot name="header">
		<div align="center">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Create New Group
        	</h2>
		</div>
    </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

	<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
		<form enctype="multipart/form-data" method="POST" action="{{ route('group.store') }}">
            @csrf

            <!-- Group Title -->
            <div>
                <x-label for="title" :value="__('Group Title')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            </div>
            
            <!-- Group Description -->
            <div>
                <x-label for="description" :value="__('Group Description')" />

                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
            </div>
            
            <!-- Group Rules -->
            <div>
                <x-label for="rules" :value="__('Group Rules')" />

                <x-input id="rules" class="block mt-1 w-full" type="text" name="rules" :value="old('rules')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
            	<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url()->previous() }}">
                    {{ __('Go Back?') }}
                </a>
                <x-button class="ml-4">
                    {{ __('Create New Group') }}
                </x-button>
            </div>
        </form>
	</div>
        
</div>
</x-app-layout>
