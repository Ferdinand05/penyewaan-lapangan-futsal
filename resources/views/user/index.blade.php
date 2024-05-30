<x-app-layout title="Users">
    @section('content-title')
        Tabel Users
    @endsection

    <div class="container">
        <small>Jumlah User : {{ $users->count() }}</small>
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <td>No.</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Created at</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->getRoleNames()[0] == 'admin')
                                <span class="badge badge-primary">{{ $user->getRoleNames()[0] }}</span>
                            @else
                                <span class="badge badge-success">{{ $user->getRoleNames()[0] }}</span>
                            @endif

                        </td>
                        <td>{{ $user->created_at->toFormattedDateString() }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
