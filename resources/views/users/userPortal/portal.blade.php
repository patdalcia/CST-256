<?php 
use Illuminate\Support\Facades\Auth;
use App\Models\User;

//Retrieving currently logged in user
$user = Auth::user();
$destroyPath = "route('admin.destroy','" . Auth::user()->id . "')";
$destroyPath2 = "request()->routeIs('admin.create', '" . Auth::user()->id . "')";

$demographics = User::findOrFail($user->id)->userDemographic;
?>
@section('title', 'User Dashboard')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ "User Operations" }}
        </h2>
    </x-slot>

    <div class="py-12">
    
    <!-- Admin function Links -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Status Alerts Section -->  
        @if (session('status'))  
    			<div class="alert alert-success alert-dismissible fade show" align="center" role="alert">
  					<strong>{{ session('status') }}</strong>
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
  					<br><br>
				</div>
		@endif	
		
		@if (is_null($demographics))
				<div class="alert alert-success alert-dismissible fade show" align="center" role="alert">
  					<strong>{{ "Your user demographic information has not been updated! Please click the 'Edit Your Information' link to update." }}</strong>
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
  					<br><br>
				</div>
		@endif
        
        	<!-- Create New User Link -->       	
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">       
                 	<div align="center">
                		<x-responsive-nav-link :href="route( 'user.edit', [ 'user' => Auth::user()->id ] )" :active="request()->routeIs( 'user.edit', [ 'user' => Auth::user()->id ] )">
                			{{ __('Edit Your Information') }}
            			</x-responsive-nav-link>
                	</div> 
                </div>
            </div>
            <!-- Search Users Link -->   
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">       
                	<div align="center">
                		<x-responsive-nav-link :href="route('admin.search')" :active="request()->routeIs('admin.search')">
                			{{ __('Edit Posts (NOT IMPLEMENTED)') }}
            			</x-responsive-nav-link>
                	</div>                 
                </div>
            </div>
            <!-- Show All Users Link -->   
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">       
                	<div align="center">
                		<x-responsive-nav-link :href="route('user.showAllPosts')" :active="request()->routeIs('user.showAllPosts')">
                			{{ __('Show All User Posts (NOT IMPLEMENTED)') }}
            			</x-responsive-nav-link>
                	</div>                 
                </div>
            </div>
            <!-- Create User Post Link -->   
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">       
                	<div align="center">
                		<x-responsive-nav-link :href="route('user.create')" :active="request()->routeIs('user.create')">
                			{{ __('Create a Post') }}
            			</x-responsive-nav-link>
                	</div>                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>