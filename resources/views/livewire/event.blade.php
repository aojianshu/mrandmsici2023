<div class="max-w-7xl mx-auto grid grid-cols-2 gap-8 text-gray-100 mt-2">
    {{-- Because she competes with no one, no one can compete with her. --}}
    @foreach($candidates as $candidate)
    <div class="shadow-lg rounded-lg shadow-gray-700 px-2 py-4 flex justify-evenly flex-grow items-center border border-gray-800 space-x-4">
        <div class="w-full">
            <img class="object-cover w-full" src="{{ asset('/storage/candidates/' . $candidate->photo) }}" alt="">
        </div>
        <div class="text-center w-full">
            <h1 class="font-bold"><span class="font-light text-gray-400">{{ $candidate->number }}</span> - {{ $candidate->fullName() }}</h1>
            <p class="text-gray-400">{{ $candidate->team->monickerName() }}</p>
            <hr class="mb-4 border-gray-700">
            <div class="flex flex-col space-y-4">
                @livewire('production.score', ['candidate' => $candidate], key($candidate->id))
                @livewire('uniform.score', ['candidate' => $candidate], key($candidate->id))
                @livewire('sport.score', ['candidate' => $candidate], key($candidate->id))
                @livewire('formal.score', ['candidate' => $candidate], key($candidate->id))
                @livewire('question.score', ['candidate' => $candidate], key($candidate->id))
            </div>
        </div>
    </div>
    @endforeach
</div>
