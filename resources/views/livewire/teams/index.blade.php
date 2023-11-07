<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('teams.create');
            <div class="overflow-x-auto relative rounded-lg border border-gray-600">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs uppercase bg-gray-700 border-b border-gray-600 text-gray-100">
                        <tr>
                            <th scope="col" class="py-3 px-6">Name</th>
                            <th scope="col" class="py-3 px-6">Color</th>
                            <th scope="col" class="py-3 px-6"> </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($teams as $team)
                            <tr class="bg-gray-700 border-b border-gray-600">
                                <th scope="row" class="py-4 px-6 text-gray-50 flex items-center"><img class="h-12 mr-2" src="{{ asset('storage/teams/' . $team->photo) }}" alt="">{{ $team->name }}</th>
                                <td class="py-4 px-6 text-gray-200">{{ $team->color }}</td>
                                <td class="py-4 px-6 text-gray-200">Edit</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
