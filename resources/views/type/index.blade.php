<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Types') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table-auto">
                    <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Hora Padrão</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @forelse($types as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->default_time }}</td>
                            <td>
                                <a href="{{ route('type.edit', $type->id) }}" class="">Edit</a>
                                <form action="{{ route('type.destroy', $type->id) }}" method="post">
                                    <button onclick="return confirm('Vai deletar mesmo?')" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            Data not found
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
