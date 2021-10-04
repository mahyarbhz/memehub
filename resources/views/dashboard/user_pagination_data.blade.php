<div>
    <table class="border-collapse table-auto border border-green-800 w-full">
        <thead class="bg-blue-200">
        <tr>
            <th class="border border-blue-600 px-2 py-2">Username</th>
            <th class="border border-blue-600 px-2 py-2">Email</th>
            <th class="border border-blue-600 px-2 py-2">Role Name</th>
            <th class="border border-blue-600 px-2 py-2">Role Scope</th>
            <th class="border border-blue-600 px-2 py-2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $user)
            <tr>
                <td class="border border-blue-600 py-2 pl-2">{{ $user->name }}</td>
                <td class="border border-blue-600 py-2 pl-2">{{ $user->email }}</td>
                <td class="border border-blue-600 py-2 pl-2">{{ $user->role->name }}</td>
                <td class="border border-blue-600 py-2 pl-2">{{ $user->role->scope }}</td>
                <td class="border border-blue-600 py-2 pl-2"><a href="{{ route('owners.uedit', $user->id) }}" class="mx-1 px-1 py-1 rounded bg-yellow-300"><i class="fas fa-edit"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="flex justify-center">
        {!! $data->links() !!}
    </div>
</div>
