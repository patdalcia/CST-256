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
		
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">                   
                <div class="p-6 bg-white border-b border-gray-200">        
                             	
                
                 Welcome {{ $user->firstname }} {{$user->lastname }}, you're logged in!
                 <br><br>
                 This page is a work in progress, check back soon!<br><br>
                 
                 @if(Auth::user()->admin > 0)
                 You have Admin Permissions! Click the Admin Link above for basic CRUD operations. 
                 @endif
                                              
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
