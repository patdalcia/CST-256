<x-app-layout>
<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg col-md-8 mx-auto">
	<x-slot name="header">
		<div align="center">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Search For A Job Poster
        	</h2>
		</div>
    </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

	<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
	
		<form method="POST" action="{{ route('job.handleSearch') }}">
            @csrf

            <!-- Search Parameter -->
            <div>
                <x-label for="search" :value="__('Search')" />

                <x-input id="search" class="block mt-1 w-full" type="text" name="search" :value="old('search')" required autofocus />
            </div>           

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Search For Job Posting') }}
                </x-button>
            </div>
        </form>
	</div>
        
</div>
</x-app-layout>