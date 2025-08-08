@extends('dashboard.layouts.app')

@section('content')
    <div class="flex flex-col">
        <h1>Users</h1>
        <div class="">
            <table class="">
                <thead>
                    <tr>
                        <th class="">
                            <p class="">Name</p>
                        </th>
                        <th class="">
                            <p class="">Email</p>
                        </th>
                        <th class="">
                            <p class="">Role</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                        <td class="">
                            <p class="">{{ $user->name }}</p>
                        </td>
                        <td class="">
                            <p class="">{{ $user->email }}</p>
                        </td>
                        <td class="">
                            <p class="">{{ $user->role->name }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection 
