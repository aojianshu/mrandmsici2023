<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="overflow-x-auto relative">
        <h1>Female</h1>
        <table role="table" class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        <button class="uppercase" wire:click="sortBy('number')">
                            Candidate Name
                        </button>
                    </th>
                    @foreach($judges as $judge)
                        <th scope="col" class="py-3 px-6">
                            {{ $judge->fullName() }}'s Score
                        </th>
                    @endforeach
                    <th scope="col" class="py-3 px-6">
                        <button class="uppercase" wire:click="sortBy('score')">
                            Average
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidates as $candidate)
                @if($candidate->gender === "Female")
                <tr class="bg-white border-b">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                        <span class="text-xs text-gray-400">{{ $candidate->number }}</span> - {{ $candidate->fullName() }}
                    </th>
                    @foreach($judges as $judge)
                    <td class="py-4 px-6">
                        @if(!empty($judge->productions->where('candidate_id', $candidate->id)->first()))
                            {{ $judge->productions->where('candidate_id', $candidate->id)->first()->score }}
                        @else
                            <span class="text-red-700">0</span>
                        @endif
                    </td>
                    @endforeach
                    <td class="py-4 px-6 font-bold">
                        {{ round($candidate->score, 3) }}
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <h1 class="mt-4">Male</h1>
        <table role="table" class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        <button class="uppercase" wire:click="sortBy('number')">
                            Candidate Name
                        </button>
                    </th>
                    @foreach($judges as $judge)
                        <th scope="col" class="py-3 px-6">
                            {{ $judge->fullName() }}'s Score
                        </th>
                    @endforeach
                    <th scope="col" class="py-3 px-6">
                        <button class="uppercase" wire:click="sortBy('score')">
                            Average
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidates as $candidate)
                @if($candidate->gender === "Male")
                <tr class="bg-white border-b">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                        <span class="text-xs text-gray-400">{{ $candidate->number }}</span> - {{ $candidate->fullName() }}
                    </th>
                    @foreach($judges as $judge)
                    <td class="py-4 px-6">
                        @if(!empty($judge->productions->where('candidate_id', $candidate->id)->first()))
                            {{ $judge->productions->where('candidate_id', $candidate->id)->first()->score }}
                        @else
                            <span class="text-red-700">0</span>
                        @endif
                    </td>
                    @endforeach
                    <td class="py-4 px-6 font-bold">
                        {{ round($candidate->score, 3) }}
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>