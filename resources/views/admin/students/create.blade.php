<x-user-layout>
	<x-slot name="header">
		Create Student
  </x-slot>
  
	<x-panel class="flex flex-col  pt-16 pb-16 ">
		<x-splade-form :for="$form" />	
	</x-panel>
</x-user-layout>