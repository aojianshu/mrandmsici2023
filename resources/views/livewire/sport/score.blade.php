<div x-cloak x-data="{ openModal: false }">
    <x-primary-button @click="openModal = !openModal" class="w-full justify-between">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
              </svg>
          Sports
        </div>
        @if(Auth::user()->admin != 1)
          @if(!$candidate->sports->where('judge_id', Auth::user()->judge->id)->isEmpty())
          <div>
            <span class="bg-gray-700 text-gray-200 rounded-full py-1 px-2">
              {{ $candidate->sports->where('judge_id', Auth::user()->judge->id)->first()->score }}
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
                    <h3 class="text-lg font-medium leading-6 text-gray-100" id="modal-title">Score Candidate {{ $candidate->fullName() }} | Sports Attire</h3>
                    <div class="text-xs my-1 text-gray-300">
                        <p class="font-semibold">Criteria for Judging</p>
                        <ul>
                            <li>Sports Identity - 50%</li>
                            <li>Poise & Bearing - 40%</li>
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