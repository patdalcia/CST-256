<?php 
use Illuminate\Support\Facades\Auth;

//Retrieving currently logged in user
$user = Auth::user();
$destroyPath = "route('admin.destroy','" . Auth::user()->id . "')";
$destroyPath2 = "request()->routeIs('admin.create', '" . Auth::user()->id . "')";
?>
@section('title', 'Admin Dashboard')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ "Admin Operations" }}
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
        
        <!-- Edit User Information section -->
        <div>
        <br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ "Edit Users" }}
        </h2>
        <br>
        
        	<!-- Create New User Link -->       	
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">       
                 	<div align="center">
                		<x-responsive-nav-link :href="route('admin.create')" :active="request()->routeIs('admin.create')">
                			{{ __('Create New User') }}
            			</x-responsive-nav-link>
                	</div> 
                </div>
            </div>
            <!-- Search Users Link -->   
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">       
                	<div align="center">
                		<x-responsive-nav-link :href="route('admin.search')" :active="request()->routeIs('admin.search')">
                			{{ __('User Search') }}
            			</x-responsive-nav-link>
                	</div>                 
                </div>
            </div>
            <!-- Show All Users Link -->   
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">       
                	<div align="center">
                		<x-responsive-nav-link :href="route('admin.showAllUsers')" :active="request()->routeIs('admin.showAllUsers')">
                			{{ __('Show All Users') }}
            			</x-responsive-nav-link>
                	</div>                 
                </div>
            </div>
        </div>
        
        <!-- Edit Job Posting section -->        
        <div>
        <br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ "Edit Job Postings" }}
        </h2>
        <br>
        
        <!-- Create New Job Posting Link -->   
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">       
                	<div align="center">
                		<x-responsive-nav-link :href="route('job.create')" :active="request()->routeIs('job.create')">
                			{{ __('Create New Job Posting') }}
            			</x-responsive-nav-link>
                	</div>                 
                </div>
            </div>
            
         <!-- Show All Job Postings Link -->   
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">       
                	<div align="center">
                		<x-responsive-nav-link :href="route('job.showAllJobs')" :active="request()->routeIs('job.showAllJobs')">
                			{{ __('Show All Job Postings') }}
            			</x-responsive-nav-link>
                	</div>                 
                </div>
            </div>
            <!-- Search Job Posting Link -->   
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">       
                	<div align="center">
                		<x-responsive-nav-link :href="route('job.search')" :active="request()->routeIs('job.search')">
                			{{ __('Job Posting Search') }}
            			</x-responsive-nav-link>
                	</div>                 
                </div>
            </div>
        
        </div>
            
            
        </div>
    </div>
</x-app-layout>