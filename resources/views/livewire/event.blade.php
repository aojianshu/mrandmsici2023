<div class="grid grid-cols-2 gap-8 text-gray-100">
    {{-- Because she competes with no one, no one can compete with her. --}}
    @foreach($candidates as $candidate)
    <div class="shadow-lg rounded-lg shadow-gray-700">
        <div class="px-2 py-4 flex justify-evenly items-center">
            <img class="w-80" src="{{ asset('/storage/candidates/' . $candidate->photo) }}" alt="">
            <div class="flex-col items-center content-center justify-center text-center">
                <p>{{ $candidate->fullName() }}</p>
                <p>{{ $candidate->team->monickerName() }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
