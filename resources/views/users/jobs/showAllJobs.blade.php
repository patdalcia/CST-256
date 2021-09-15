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
        	
        
		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Job Title</th>
					<th scope="col">Job Description</th>
					<th scope="col">Job Requirements</th>
					<th scope="col">Created At</th>
					<th scope="col">Updated At</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($jobs as $job )  
			@php $id = $job->id @endphp
    			<tr>
					<th scope="row">{{ $job->id }}</th>
     	 			<td>{{ $job->title }}</td>
      				<td>{{ $job->description }}</td>
      				<td>{{ $job->requirements }}</td>
      				<td>{{ $job->created_at }}</td>
      				<td>{{ $job->updated_at }}</td>
      		<form method="GET" action="{{ route('job.edit', ['job' =>  $id]) }}"> 
			@csrf
      				<td><input type="submit" value="Edit Job Posting" class="btn btn-primary" /></td>
      		</form>
      		<form method="POST" action="{{ route('job.destroy', ['job' =>  $id]) }}"> 
			@csrf
			@method('DELETE')
      				<td><input type="submit" value="Delete Job Posting" class="btn btn-danger" onclick="return confirm('WARNING: Selecting Yes will delete the Job Posting from the database. This action is FINAL')"/></td>
      		</form>
				</tr>    
			   		
    		@endforeach	
    		<tr>{{ $jobs->links() }}</tr>		
			</tbody>
		</table>       
</div>
</div>
</x-app-layout>
