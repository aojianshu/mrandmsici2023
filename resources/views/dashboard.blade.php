<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100" x-data="{ tab: 'total' }">
                    <nav class="flex text-gray-400 border-b border-gray-900 mb-4 bg-gray-900">
                        <a :class="{ '!border-gray-100 text-gray-100 bg-gray-800': tab === 'total' }" x-on:click.prevent="tab = 'total'" class="p-2 cursor-pointer hover:text-gray-300 hover:border-gray-300 hover:bg-gray-800 border-b-2 border-transparent text-sm w-28">
                            <div class="flex flex-col items-center content-center justify-center w-full text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                              </svg>

                              <span>Total</span>
                            </div>
                        </a>
                        <a :class="{ '!border-gray-100 text-gray-100 bg-gray-800': tab === 'production' }" x-on:click.prevent="tab = 'production'" class="p-2 cursor-pointer hover:text-gray-300 hover:border-gray-300 hover:bg-gray-800 border-b-2 border-transparent text-sm w-28">
                            <div class="flex flex-col items-center content-center justify-center w-full text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg>
                                Production
                            </div>
                        </a>
                        <a :class="{ '!border-gray-100 text-gray-100 bg-gray-800': tab === 'uniform' }" x-on:click.prevent="tab = 'uniform'" class="p-2 cursor-pointer hover:text-gray-300 hover:border-gray-300 hover:bg-gray-800 border-b-2 border-transparent text-sm w-28">
                            <div class="flex flex-col items-center content-center justify-center w-full text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                  </svg>
                                Uniform
                            </div>
                        </a>
                        <a :class="{ '!border-gray-100 text-gray-100 bg-gray-800': tab === 'sports' }" x-on:click.prevent="tab = 'sports'" class="p-2 cursor-pointer hover:text-gray-300 hover:border-gray-300 hover:bg-gray-800 border-b-2 border-transparent text-sm w-28">
                            <div class="flex flex-col items-center content-center justify-center w-full text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                                  </svg>
                                Sports
                            </div>
                        </a>
                        <a :class="{ '!border-gray-100 text-gray-100 bg-gray-800': tab === 'formal' }" x-on:click.prevent="tab = 'formal'" class="p-2 cursor-pointer hover:text-gray-300 hover:border-gray-300 hover:bg-gray-800 border-b-2 border-transparent text-sm w-28">
                            <div class="flex flex-col items-center content-center justify-center w-full text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                  </svg>
                                Formal
                            </div>
                        </a>
                        <a :class="{ '!border-gray-100 text-gray-100 bg-gray-800': tab === 'q&a' }" x-on:click.prevent="tab = 'q&a'" class="p-2 cursor-pointer hover:text-gray-300 hover:border-gray-300 hover:bg-gray-800 border-b-2 border-transparent text-sm w-28">
                            <div class="flex flex-col items-center content-center justify-center w-full text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0012 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 01-2.031.352 5.988 5.988 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 01-2.031.352 5.989 5.989 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971z" />
                                  </svg>
                                Q&A
                            </div>
                        </a>
                    </nav>
                    <div class="p-4 rounded-lg bg-gray-700">
                        <div x-show="tab === 'total'" x-transition>
                            @livewire('total')
                        </div>
                        <div x-show="tab === 'production'" x-transition>
                            @livewire('production.index')
                        </div>
                        <div x-show="tab === 'uniform'" x-transition>
                            @livewire('uniform.index')
                        </div>
                        <div x-show="tab === 'sports'" x-transition>
                            @livewire('sport.index')
                        </div>
                        <div x-show="tab === 'formal'" x-transition>
                            @livewire('formal.index')
                        </div>
                        <div x-show="tab === 'q&a'" x-transition>
                            @livewire('question.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
