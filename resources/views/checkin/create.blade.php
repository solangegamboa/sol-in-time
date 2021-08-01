<script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('js/checkin.js') }}"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Check in') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <p>Check-in!</p>
                        <p>{{ session('success') }}</p>
                        <p><a href="{{ route('checkin.index') }}" class="alert-link">Go to check-in list</a></p>
                    </div>
                @endif

                <form action="{{ route('checkin.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="type_id" class="form-label">Type</label>
                        <select class="form-select" aria-label="Type" id="type_id" name="type_id">
                            <option value="1" {{ $type === 5 ? "selected" : "" }}>Entrada</option>
                            <option value="2" {{ $type === 2 ? "selected" : "" }}>Almoço Ida</option>
                            <option value="3" {{ $type === 3 ? "selected" : "" }}>Almoço Volta</option>
                            <option value="4" {{ $type === 4 ? "selected" : "" }}>Saida</option>
                        </select>
                        @error('type_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{$date}}">
                    </div>
                    @error('date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" class="form-control" id="time" name="time" value="{{$time}}">
                    </div>
                    @error('time')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label for="obs" class="form-label">Obs</label>
                        <input type="text" class="form-control" id="obs" name="obs">
                    </div>
                    @error('obs')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button type="submit" class="btn btn-dark"><i class="bi bi-clock"></i> Clock-in</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
