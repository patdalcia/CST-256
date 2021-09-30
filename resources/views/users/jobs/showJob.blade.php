<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" ></script>

<x-app-layout>
<div class="py-3">
<div  class="container-fluid max-w-max bg-white mx-auto py-2 px-6 shadow-md col-md-8"> <!--  class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg col-md-8 mx-auto"-->
	<x-slot name="header">
		<div align="center">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Displaying Selected Job
        	</h2>
		</div>
    </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        	
		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>																									
				</tr>
				<tr>
					<th scope="row">{{ $job->id }}</th>
				</tr>
				<tr>
					<th scope="col">Job Title</th>					
				</tr>
				<tr>
					<td>{{ $job->title }}</td>
				</tr>
				<tr>
					<th scope="col">Job Description</th>				
				</tr>
				<tr>
					<td>{{ $job->description }}</td>
				</tr>
				<tr>
					<th scope="col">Job Requirements</th>				
				</tr>
				<tr>
					<td>{{ $job->requirements }}</td>
				</tr>
				<tr>
					<th scope="col">Created At</th>				
				</tr>
				<tr>
					<td>{{ $job->created_at }}</td>
				</tr>
				<tr>
					<th scope="col">Updated At</th>				
				</tr>
				<tr>
					<td>{{ $job->updated_at }}</td>
				</tr>
			</thead>
			<tbody>
			
			@php $id = $job->id @endphp
    			<tr>
		 				     				
      				
      				
      		<form method="GET" action="#"> 
			@csrf
      				<td><input type="submit" value="Apply? (NOT IMPLEMENTED)" class="btn btn-primary" /></td>
      		</form>		
      		@if(Auth::user()->admin == 1)
      		<form method="GET" action="{{ route('job.edit', ['job' =>  $id]) }}"> 
			@csrf
      				<td><input type="submit" value="Edit Job Posting" class="btn btn-primary" /></td>
      		</form>
      		<form method="POST" action="{{ route('job.destroy', ['job' =>  $id]) }}"> 
			@csrf
			@method('DELETE')
      				<td><input type="submit" value="Delete Job Posting" class="btn btn-danger" onclick="return confirm('WARNING: Selecting Yes will delete the Job Posting from the database. This action is FINAL')"/></td>
      		</form>
      		@endif
				</tr>    		
			</tbody>
		</table>       
</div>
</div>
</x-app-layout>
