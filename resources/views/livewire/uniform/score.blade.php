<div x-cloak x-data="{ openModal: false }">
    <x-primary-button @click="openModal = !openModal" class="w-full justify-between">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
              </svg>
          Uniform Attire
        </div>
        @if(Auth::user()->admin != 1)
          @if(!$candidate->uniforms->where('judge_id', Auth::user()->id)->isEmpty())
          <div>
            <span class="bg-gray-700 text-gray-200 rounded-full py-1 px-2">
              {{ $candidate->uniforms->where('judge_id', Auth::user()->id)->first()->score }}
            </span>
          </div>
          @endif
        @endif
    </x-primary-button>
    <div x-show="openModal" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!--
          Background backdrop, show/hide based on modal state.

          Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div
        x-show="openModal"
        x-transition:enter="ease-out duration"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!--
              Modal panel, show/hide based on modal state.

              Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <form
            wire:submit.prevent="submitScore"
            x-show="openModal"
            x-trap="openModal"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            @click.outside="openModal = !openModal" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
              <div class="bg-gray-700 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                  <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-gray-800 sm:mx-0 sm:h-10 sm:w-10">
                    <!-- Heroicon name: outline/exclamation-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                      </svg>
                  </div>
                  <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                    <h3 class="text-lg font-medium leading-6 text-gray-100" id="modal-title">Score Candidate {{ $candidate->fullName() }} | Uniform Attire</h3>
                    <div class="text-xs my-1 text-gray-300">
                        <p class="font-semibold">Criteria for Judging</p>
                        <ul>
                            <li>Beauty and Poise - 50%</li>
                            <li>Presentation and Neatness - 40%</li>
                            <li>Audience Impact - 10%</li>
                        </ul>
                        <p class="mt-1"><span class="font-semibold">NOTE:</span> Enter score between 75 and 100. You can include decimals</p>
                    </div>
                    {{-- <input type="text" hidden name="candidate_id"> --}}
                    <div class="mt-2">
                        <div class="mb-4">
                            <label class="block uppercase text-xs font-bold mb-2" for="score">Score</label>
                            <x-text-input required class="w-full appearance-none" wire:model="score" id="score" type="number" name="score" :value="old('score')" autofocus autocomplete="score" ></x-text-input>
                            @error('score') <span class="text-red-400 text-xs font-bold">{{ $message }}</span> @enderror
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-gray-700 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <x-primary-button class="sm:ml-3">Submit Score</x-primary-button>
                <x-secondary-button @click="openModal = !openModal">Cancel</x-secondary-button>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>