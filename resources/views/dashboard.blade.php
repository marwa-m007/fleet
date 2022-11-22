<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (Session::has('message'))
                        <div
                            class="bg-blue-50 border border-blue-500 text-blue-900 placeholder-blue-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-blue-100 dark:border-blue-400">
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('seats') }}">
                        @csrf
                        <x-input-label for="day" :value="__('Day')" />
                        <div class="relative">
                            <input type="date" name="day" value="{{ old('day') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <x-input-error :messages="$errors->get('day')" class="mt-2" />
                        </div>
                        <x-input-label for="station_from" :value="__('From')" />
                        <div class="relative">
                            @include('select-stations', [
                                'name' => 'station_from',
                                'stations' => $stations,
                            ])
                            <x-input-error :messages="$errors->get('station_from')" class="mt-2" />
                        </div>
                        <x-input-label for="station_to" :value="__('To')" />
                        <div class="relative">


                            @include('select-stations', ['name' => 'station_to', 'stations' => $stations])

                            <x-input-error :messages="$errors->get('station_to')" class="mt-2" />
                        </div>

                        <div class="flex justify-end mt-4">
                            <x-primary-button>
                                {{ __('Confirm') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const dateRangePickerEl = document.getElementById('datePicker');
        new DateRangePicker(dateRangePickerEl, {});
    </script>
</x-app-layout>
