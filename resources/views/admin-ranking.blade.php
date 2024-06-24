<!-- resources/views/admin-ranking.blade.php -->

<x-app-layout>
    <link href="{{ asset('admin-ranking.css') }}" rel="stylesheet">
    @include('layouts.sidebar')

    <div class="container">
        <h1>Admin Ranking</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Email Verified At</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->email_verified_at }}</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
