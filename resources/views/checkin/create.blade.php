<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Check in') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('success'))
                    {{ session('success') }}
                @endif
                <form action="{{ route('checkin.store') }}" method="post">
                    @csrf
                    <div class="grid">
                        <div>
                            <x-label for="type_id" :value="__('Tipo')"/>
                            <select name="type_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="1">Entrada</option>
                                <option value="2">Almoço Ida</option>
                                <option value="3">Almoçco Volta</option>
                                <option value="4">Saida</option>
                            </select>
                            @error('type_id')
                            {{ $message }}
                            @enderror
                        </div>
                        <div>
                            <x-label for="date" :value="__('Data')"/>
                            <x-input type="date" name="date"/>
                            @error('date')
                            {{ $message }}
                            @enderror
                        </div>
                        <div>
                            <x-label for="date" :value="__('Hora')"/>
                            <x-input type="time" name="time"/>
                            @error('time')
                            {{ $message }}
                            @enderror
                        </div>
                        <div>
                            <x-label for="obs" :value="__('Observações')"/>
                            <x-input type="text" name="obs"/>
                            @error('obs')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <x-button type="submit">Clock in</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
