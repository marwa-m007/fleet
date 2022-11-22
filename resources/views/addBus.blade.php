<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Add vehicle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">

                        <div class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400">
                        Seats will be generated .
                        </div>

                      </div>

                    <form method="POST" action="{{ route('storebus') }}">
                        @csrf
                        <div>
                            <x-input-label for="number" :value="__('number')" />

                            <x-text-input  class="block mt-1 w-full"
                                            type="text"
                                            name="number"
                                            required  />

                            <x-input-error :messages="$errors->get('number')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="model" :value="__('model')" />

                            <x-text-input  class="block mt-1 w-full"
                                            type="text"
                                            name="model"
                                            value="blabla"
                                             />
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
</x-app-layout>
