<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="overflow-x-auto relative">
        <h1>Female</h1>
        <table role="table" class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs text-gray-400 uppercase bg-gray-900">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        <button class="uppercase" wire:click="sortBy('number')">
                            Candidate Name
                        </button>
                    </th>
                    <th scope="col" class="py-3 px-6">People's Choice (5%)</th>
                    <th scope="col" class="py-3 px-6">Photogenic (5%)</th>
                    <th scope="col" class="py-3 px-6">Production (10%)</th>
                    <th scope="col" class="py-3 px-6">Uniform (15%)</th>
                    <th scope="col" class="py-3 px-6">Sports (15%)</th>
                    <th scope="col" class="py-3 px-6">Formal (20%)</th>
                    <th scope="col" class="py-3 px-6">Q&A (30%)</th>
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
                    <tr class="bg-gray-800 border-b border-b-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-300 whitespace-nowrap ">
                            <span class="text-xs text-gray-400">{{ $candidate->number }}</span> - {{ $candidate->fullName() }}
                        </th>
                        <td class="py-4 px-6">
                            {{ is_null($candidate->populars) ? '0' : $candidate->populars->score }}
                        </td>
                        <td class="py-4 px-6">
                            {{ is_null($candidate->photogenics) ? '0' : $candidate->photogenics->score }}
                        </td>
                        <td class="py-4 px-6">{{ $candidate->productions->avg('score') . ' (' . $candidate->productions->avg('score') * .10 .')' }}</td>
                        <td class="py-4 px-6">{{ $candidate->uniforms->avg('score') . ' (' . $candidate->uniforms->avg('score') * .15 .')' }}</td>
                        <td class="py-4 px-6">{{ $candidate->sports->avg('score') . ' (' . $candidate->sports->avg('score') * .15 .')'  }}</td>
                        <td class="py-4 px-6">{{ $candidate->formals->avg('score') . ' (' . $candidate->formals->avg('score') * .20 .')'  }}</td>
                        <td class="py-4 px-6">{{ $candidate->questions->avg('score') . ' (' . $candidate->questions->avg('score') * .30 .')'  }}</td>
                        <td class="py-4 px-6 font-bold text-gray-300">
                            {{ round($candidate->score, 3) }}
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <h1 class="mt-4">Male</h1>
        <table role="table" class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs text-gray-400 uppercase bg-gray-900 ">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        <button class="uppercase" wire:click="sortBy('number')">
                            Candidate Name
                        </button>
                    </th>
                    <th scope="col" class="py-3 px-6">People's Choice (5%)</th>
                    <th scope="col" class="py-3 px-6">Photogenic (5%)</th>
                    <th scope="col" class="py-3 px-6">Production (10%)</th>
                    <th scope="col" class="py-3 px-6">Uniform (15%)</th>
                    <th scope="col" class="py-3 px-6">Sports (15%)</th>
                    <th scope="col" class="py-3 px-6">Formal (20%)</th>
                    <th scope="col" class="py-3 px-6">Q&A (30%)</th>
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
                    <tr class="bg-gray-800 border-b border-b-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-300 whitespace-nowrap ">
                            <span class="text-xs text-gray-400">{{ $candidate->number }}</span> - {{ $candidate->fullName() }}
                        </th>
                        <td class="py-4 px-6">
                            {{ is_null($candidate->populars) ? '0' : $candidate->populars->score }}
                        </td>
                        <td class="py-4 px-6">
                            {{ is_null($candidate->photogenics) ? '0' : $candidate->photogenics->score }}
                        </td>
                        <td class="py-4 px-6">{{ $candidate->productions->avg('score') . ' (' . $candidate->productions->avg('score') * .10 .')' }}</td>
                        <td class="py-4 px-6">{{ $candidate->uniforms->avg('score') . ' (' . $candidate->uniforms->avg('score') * .15 .')' }}</td>
                        <td class="py-4 px-6">{{ $candidate->sports->avg('score') . ' (' . $candidate->sports->avg('score') * .15 .')'  }}</td>
                        <td class="py-4 px-6">{{ $candidate->formals->avg('score') . ' (' . $candidate->formals->avg('score') * .20  .')'  }}</td>
                        <td class="py-4 px-6">{{ $candidate->questions->avg('score') . ' (' . $candidate->questions->avg('score') * .30 .')'  }}</td>
                        <td class="py-4 px-6 font-bold text-gray-300">
                            {{ round($candidate->score, 3) }}
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
