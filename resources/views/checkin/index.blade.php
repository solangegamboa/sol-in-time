<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Check in') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end p-3">
                <a class="btn btn-dark me-md-2" type="button" href="{{ route('checkin.create') }}"><i class="bi bi-clock"></i> Clock-in</a>
                <a class="btn btn-secondary" type="button" href="{{ route('checkin.export') }}"><i class="bi bi-download"></i> Exports</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('success'))
                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">Success</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Obs</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($checkins as $checkin)
                            <tr>
                                <td>{{$checkin->types->name}}</td>
                                <td>{{ $checkin->date->format('d/m/Y') }}</td>
                                <td>{{ $checkin->time->format('H:i:s') }}</td>
                                <td>{{ $checkin->obs }}</td>
                                <td>
                                    <form action="{{route('checkin.destroy',[$checkin->id])}}"
                                          method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-secondary btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
