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
                            <button class="btn btn-sm btn-danger" onclick="destroyUser({{ $user->id }})"><i
                                    class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
        function destroyUser(user_id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "delete",
                        url: "{{ route('user.destroy', ' + user_id+ ') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            user_id: user_id
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: response.success,
                                    icon: "success"
                                });

                                setInterval(() => {
                                    window.location.reload();

                                }, 1500);
                            }
                        }
                    });
                }
            });
        }
    </script>
</x-app-layout>
