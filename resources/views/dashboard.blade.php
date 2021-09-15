<?php 
use Illuminate\Support\Facades\Auth;

//Retrieving currently logged in user
$user = Auth::user();
?>
@section('title', 'Dashboard')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" ></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ $user->username }}'s {{ __('Home Page') }}
        </h2>
    </x-slot>    		

<div class="py-12">  	
        
	<div class="d-flex h-md-100 justify-content-around">
		<div class="d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
			<div class="mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
				Welcome {{ $user->firstname }} {{ $user->lastname }}, you're logged in!
				<br><br>
				This page is a work in progress, check back soon!<br><br>
				
				@if(Auth::user()->admin > 0)
				You Have Admin Permissions! Click the Admin Link above for CRUD Operations.
				@else
				You Have Normal User Permissions! Click the User Link above for User Operations.
				@endif
			</div>		
		</div>
		
 		<div class="d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
 			<div class="px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
 			
 				<br>
        			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
           				{{ "Job Postings" }}
        			</h2>
        		<br>
				
				@php $jobs = DB::table('jobs')->paginate(5) @endphp
				
				<!-- Validation Errors -->
        		<x-auth-validation-errors class="mb-4" :errors="$errors" />
        	        
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Job Title</th>
							<th scope="col">Job Description</th>
							<th scope="col">Job Requirements</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($jobs as $job )  
					@php $id = $job->id @endphp
    					<tr>
     	 					<td>{{ $job->title }}</td>
      						<td>{{ $job->description }}</td>
      						<td>{{ $job->requirements }}</td>     						
      				
      				<form method="GET" action=""> 
					@csrf
      						<td><input type="submit" value="View Job Details (NOT IMPLEMENTED)" class="btn btn-primary" /></td>
      				</form>
						</tr>    
			   		
    				@endforeach		
    				<tr>{{ $jobs->links() }}</tr>		
					</tbody>
				</table> 

			</div>	
 		</div>
        
	</div>             
</div>
</x-app-layout>
