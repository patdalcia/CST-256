<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" ></script>

<x-app-layout>
<div class="py-12">
<div  class="container-fluid max-w-max bg-white mx-auto py-12 px-6 shadow-md col-md-8"> <!--  class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg col-md-8 mx-auto"-->
	<x-slot name="header">
		<div align="center">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Edit Selected User
        	</h2>
		</div>
    </x-slot>

         <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
 		@php $id = $job->id @endphp
        <form method="POST" action="{{ route('job.update', ['job' => $id] ) }}">
            @csrf
            @method('PUT')

            <!-- Job Title -->
            <div>
                <x-label for="title" :value="__('Job Title')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$job->title" required autofocus />
            </div>
            
            <!-- Job Description -->
            <div>
                <x-label for="description" :value="__('Job Description')" />

                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$job->description" required autofocus />
            </div>
            
            <!-- Job Requirements -->
            <div>
                <x-label for="requirements" :value="__('Job Requirements')" />

                <x-input id="requirements" class="block mt-1 w-full" type="text" name="requirements" :value="$job->requirements" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url()->previous() }}">
                    {{ __('Search For Another Job Posting?') }}
                </a>

                <x-button class="ml-4" onclick="return confirm('WARNING: Are you sure you want to update Job Posting with inputted values?')">
                    {{ __('Save Changes') }}
                </x-button>
            </div>
        </form>

</div>
</div>
</x-app-layout>

