<!-- resources/views/ranking.blade.php -->

<x-app-layout>
    <link href="{{ asset('ranking.css') }}" rel="stylesheet">
    @include('layouts.sidebar')

    <div class="container">
        <h1>User Ranking</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>MBTI</th>
                    <th>Job</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->mbti }}</td>
                        <td>{{ $user->job }}</td>
                        <td>{{ $user->score }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
