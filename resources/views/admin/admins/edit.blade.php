<x-user-layout>
	<x-slot name="header">
		Edit Student
  </x-slot>
  
	<x-panel class="flex flex-col  pt-16 pb-16 ">
		
		<x-splade-form :for="$form" />

		<x-splade-form :for="$form_update_password" />

	</x-panel>
</x-user-layout>