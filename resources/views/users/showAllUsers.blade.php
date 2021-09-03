<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" ></script>

<x-app-layout>
<div class="py-3">
<div  class="container-fluid max-w-max bg-white mx-auto py-2 px-6 shadow-md col-md-8"> <!--  class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg col-md-8 mx-auto"-->
	<x-slot name="header">
		<div align="center">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Displaying All Users
        	</h2>
		</div>
    </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        	
        
		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Username</th>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Admin Flag</th>
					<th scope="col">Email Address</th>
					<th scope="col">Created At</th>
					<th scope="col">Updated At</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($users as $user )  
			@php $id = $user->id @endphp
    			<tr>
					<th scope="row">{{ $user->id }}</th>
     	 			<td>{{ $user->username }}</td>
      				<td>{{ $user->firstname }}</td>
      				<td>{{ $user->lastname }}</td>
      				<td>{{ $user->admin }}</td>
      				<td>{{ $user->email }}</td>
      				<td>{{ $user->created_at }}</td>
      				<td>{{ $user->updated_at }}</td>
      		<form method="GET" action="{{ route('admin.edit', ['admin' =>  $id]) }}"> 
			@csrf
      				<td><input type="submit" value="Edit User" class="btn btn-primary" /></td>
      		</form>
      		<form method="POST" action="{{ route('admin.destroy', ['admin' =>  $id]) }}"> 
			@csrf
			@method('DELETE')
      				<td><input type="submit" value="Delete User" class="btn btn-danger" onclick="return confirm('WARNING: Selecting Yes will delete the user from the database. This action is FINAL')"/></td>
      		</form>
				</tr>    
			   		
    		@endforeach	
    		<tr>{{ $users->links() }}</tr>		
			</tbody>
		</table>       
</div>
</div>
</x-app-layout>
