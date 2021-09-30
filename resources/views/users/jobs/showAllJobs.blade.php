<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" ></script>

<x-app-layout>
<div class="py-3">
<div  class="container-fluid max-w-max bg-white mx-auto py-2 px-6 shadow-md col-md-8"> <!--  class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg col-md-8 mx-auto"-->
	<x-slot name="header">
		<div align="center">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Displaying All Jobs
        	</h2>
		</div>
    </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        	
        
		@foreach($jobs as $job)
		<x-card :data="$job"/>
		@endforeach       
</div>
</div>
</x-app-layout>
