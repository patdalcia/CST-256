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
 		@php $id = $user->id @endphp
 		
 		<h1><strong>Edit Account Information</strong></h1>
 		
        <form method="POST" action="{{ route('user.update', ['user' => $id] ) }}">
            @csrf
            @method('PUT')

            <!-- Username -->
            <div class="mt-4">
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="$user->username" required autofocus />
            </div>
            
            <!-- First Name -->
            <div class="mt-4">
                <x-label for="firstname" :value="__('First Name')" />

                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="$user->firstname" required autofocus />
            </div>
            
            <!-- Last Name -->
            <div class="mt-4">
                <x-label for="lastname" :value="__('Last Name')" />

                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="$user->lastname" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password"
                                value="$user->password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4 mb-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required
                                value="$user->password" />
            </div>
            
            <h1><strong>Edit Demographic Information</strong></h1>
            
            <!-- Gender -->
            <div class="mt-4">
                <x-label for="gender" :value="__('Preferred Gender')" />

                <x-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="$demographics->gender"/>
            </div>
            
            <!-- Age -->
            <div class="mt-4">
                <x-label for="age" :value="__('Age')" />

                <x-input id="age" class="block mt-1 w-full" type="text" name="age" :value="$demographics->age" required autofocus/>
            </div>
            
            <!-- Education -->
            <div class="mt-4">
                <x-label for="education" :value="__('Education')" />

                <x-input id="education" class="block mt-1 w-full" type="text" name="education" :value="$demographics->education" required autofocus/>
            </div>
            
            <!-- Interests -->
            <div class="mt-4">
                <x-label for="interests" :value="__('Interests')" />

                <x-input id="interests" class="block mt-1 w-full" type="text" name="interests" :value="$demographics->interests" required autofocus/>
            </div>
            
            <!-- Country -->
            <div class="mt-4">
                <x-label for="country" :value="__('Country')" />

                <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="$demographics->country" required autofocus/>
            </div>

            {{-- Job section for Users to manage --}}
            <h1><strong>Edit Member E-Portfolio</strong></h1>

            {{-- Job --}}
            <div class="mt-4">
                <x-label for="job" :value="__('Current Job')" />

                <x-input id="job" class="block mt-1 w-full" type="text" name="job" :value="$portfolio->job" required autofocus/>
            </div>

            {{-- Skills --}}
            <div class="mt-4">
                <x-label for="skills" :value="__('Professional Skills')" />

                <x-input id="skills" class="block mt-1 w-full" type="text" name="skills" :value="$portfolio->skills" required autofocus/>
            </div>

            {{-- Professional Education --}}
            <div class="mt-4">
                <x-label for="professionaleducation" :value="__('Professional Education')" />

                <x-input id="professionaleducation" class="block mt-1 w-full" type="text" name="professionaleducation" :value="$portfolio->professionaleducation" required autofocus/>
            </div>

			<!-- Submit button and links -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url()->previous() }}">
                    {{ __('Return to User Portal?') }}
                </a>

                <x-button class="ml-4" onclick="return confirm('WARNING: Are you sure you want to update user with inputted values?')">
                    {{ __('Save Changes') }}
                </x-button>
            </div>
        </form>

</div>

</div>
</x-app-layout>

