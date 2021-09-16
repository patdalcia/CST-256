<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" ></script>

<x-app-layout>
<div class="py-3">
<div  class="container-fluid max-w-max bg-white mx-auto py-2 px-6 shadow-md col-md-8"> <!--  class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg col-md-8 mx-auto"-->
	<x-slot name="header">
		<div align="center">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Search Results
        	</h2>
		</div>
    </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        	
        
		<table class="table">
			<thead>
				<tr>
                    {{-- insert group image here? --}}
					<th scope="col">ID</th>
					<th scope="col">Group Title</th>
					<th scope="col">Group Description</th>
					<th scope="col">Group Rules</th>
					<th scope="col">Created At</th>
					<th scope="col">Updated At</th>
                    {{-- or image here instead? --}}
				</tr>
			</thead>
			<tbody>
			@foreach ($groups as $group )  
			@php $id = $group->id @endphp
    			<tr>
                    {{-- insert group image here?  --}}
					<th scope="row">{{ $group->id }}</th>
     	 			<td>{{ $group->title }}</td>
      				<td>{{ $group->description }}</td>
      				<td>{{ $group->rules }}</td>
      				<td>{{ $group->created_at }}</td>
      				<td>{{ $group->updated_at }}</td>
                    {{-- or insert groups image here instead ? --}}
      		<form method="GET" action="{{ route('group.edit', ['group' =>  $id]) }}"> 
			@csrf
      				<td><input type="submit" value="Edit Group (NOT IMPLEMENTED)" class="btn btn-primary" /></td>
      		</form>
      		<form method="POST" action="{{ route('group.destroy', ['group' =>  $id]) }}"> 
			@csrf
			@method('DELETE')
      				<td><input type="submit" value="Delete Group" class="btn btn-danger" onclick="return confirm('WARNING: Selecting Yes will delete the Group from the database. This action is FINAL')"/></td>
      		</form>
				</tr>    
			   		
    		@endforeach	
			</tbody>
		</table>       
</div>
</div>
</x-app-layout>