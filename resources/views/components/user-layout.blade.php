{{-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius --}}
<div class="min-h-screen bg-gray-200">
    <x-splade-data default="{ open: false }">
        <nav class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('home') }}">
                                <x-application-mark class="block h-9 w-auto" />
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            @auth("admin")
                                @foreach($adminNav as $item)
                                    <x-nav-link href="{{ route($item['name']) }}" :active="request()->routeIs($item['name'])">
                                        {{ $item['title'] }}
                                    </x-nav-link>
                                @endforeach
                            @endauth

                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="data.open = ! data.open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path v-bind:class="{'hidden': data.open, 'inline-flex': ! data.open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path v-bind:class="{'hidden': ! data.open, 'inline-flex': data.open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div v-bind:class="{'block': data.open, 'hidden': ! data.open }" class="sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    @auth("admin")
                        @foreach($adminNav as $item)
                            <x-responsive-nav-link href="{{ route($item['name']) }}" :active="request()->routeIs($item['name'])">
                                {{ $item['title'] }}
                            </x-responsive-nav-link>
                        @endforeach
                    @endauth
                </div>
            </div>
        </nav>
    </x-splade-data>


    <!-- Page Heading -->
    @if(isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $header }}
                </h2>
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>