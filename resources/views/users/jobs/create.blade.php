<x-app-layout>
<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg col-md-8 mx-auto">
	<x-slot name="header">
		<div align="center">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Create New Job Posting
        	</h2>
		</div>
    </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

	<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
		<form method="POST" action="{{ route('job.store') }}">
            @csrf

            <!-- Job Title -->
            <div>
                <x-label for="title" :value="__('Job Title')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            </div>
            
            <!-- Job Description -->
            <div >
                <x-label for="description" :value="__('Job Description')" />
                               
                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
            </div>
            
            <!-- Job requirements -->
            <div>
                <x-label for="requirements" :value="__('Job Requirements')" />

                <x-input id="requirements" class="form-control" type="text" name="requirements" :value="old('requirements')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
            	<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url()->previous() }}">
                    {{ __('Go Back?') }}
                </a>
                <x-button class="ml-4">
                    {{ __('Create New Job Posting') }}
                </x-button>
            </div>
        </form>
	</div>
        
</div>
</x-app-layout>