@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel-body">

            <table class="table table-hover">

                <thead>
                <th>
                    Image
                </th>
                <th>
                    Name
                </th>
                <th>
                    Permissions
                </th>
                <th>
                    Delete
                </th>
                </thead>
                <tbody>
                @foreach($users as $user)

                    <tr>
                        <td><img src="{{ asset($user->profile->avatar) }}" alt="" width="60px" height="50px" style="border-radius: 50%;"></td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if($user->admin)

                                <a href="{{ route('user.not_admin',['id'=>$user->id]) }}" class="btn btn-sm btn-danger">Remove Permissions</a>

                             @else

                                <a href="{{ route('user.admin',['id'=>$user->id]) }}" class="btn btn-sm btn-success">Make Admin</a>
                            @endif
                        </td>
                        <td>
                            @if(Auth::id() !== $user->id )
                                <a href="{{ route('user.delete',['id' => $user->id ]) }}" class="btn btn-sm btn-danger">Delete</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>





            </table>
        </div>
    </div>
@stop