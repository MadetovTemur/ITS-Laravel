<x-user-layout>
	<x-slot name="header">
		Subjects
  </x-slot>


	<x-panel class="flex flex-col  pt-16 pb-16 ">
		<x-splade-lazy class="flex flex-col items-center">
			<x-slot:placeholder class="pt-16 pb-16 ">
				Loading your Table
			</x-slot:placeholder>
			
			<Link href="{{ route('admin.subjects.create') }}" class="inline w-fit rounded-md shadow-sm bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" >
				Create Subject
			</Link>

			<x-splade-table class="w-full mt-5"  :for="$subjects" striped pagination-scroll="head" >
		    <x-slot:empty-state>
		        <p>Whoops!</p>
		    </x-slot>				
				@cell('actions', $subject)
					<Link href="{{ route('admin.subjects.edit', $subject->id) }}" 
						class="rounded-lg mr-3 bg-lime-950 py-2 px-4  hover:text-green-400 font-semibold">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-vector-pen" viewBox="0 0 16 16">
							  <path fill-rule="evenodd" d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z"/>
							  <path fill-rule="evenodd" d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086z"/>
							</svg>


					</Link>
					<Link href="#" class="rounded-lg bg-red-800 py-2 px-4  hover:text-green-400 font-semibold">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
						  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
						</svg>
					</Link>
				@endcell
			</x-splade-table>

		</x-splade-lazy>
	</x-panel>
</x-user-layout>