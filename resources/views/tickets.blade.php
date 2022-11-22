<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-center font-bold">
                                <td class="border px-6 py-4">id</td>
                                <td class="border px-6 py-4">Number</td>
                                <td class="border px-6 py-4">User</td>
                                <td class="border px-6 py-4">Bus</td>
                                <td class="border px-6 py-4">Seat</td>
                                <td class="border px-6 py-4"> Date</td>
                                <td class="border px-6 py-4">From</td>
                                <td class="border px-6 py-4">To</td>
                            </tr>
                        </thead>
                        @foreach($tickets as $ticket)
                            <tr>
                                <td class="border px-6 py-4">{{$ticket->id}}</td>
                                <td class="border px-6 py-4">{{$ticket->number}}</td>
                                <td class="border px-6 py-4">{{$ticket->user->name}}</td>
                                <td class="border px-6 py-4">{{$ticket->bus->number}}</td>
                                <td class="border px-6 py-4">{{$ticket->seat->number}}</td>
                                <td class="border px-6 py-4">{{$ticket->day}}</td>
                                <td class="border px-6 py-4">{{$ticket->stationFrom->name}}</td>
                                <td class="border px-6 py-4">{{$ticket->stationTo->name}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
