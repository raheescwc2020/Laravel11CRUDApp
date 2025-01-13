@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New User</h1>
<table class="table table container">
<thead>
    <th>Sl.NO</th>
    <th>Name </th>
    <th>Email</th>
    <th>Status</th>
    <th>Change Status</th>
</thead>
<tbody>
@forelse($users as $key=>$user)
<tr>
    
<td>{{ ($users->currentPage()-1)*$users->perPage()+$key+1}}</td>

<td>{{$user->name}}</td>
    
<td>{{$user->email}}</td>
    
<td>{{$user->status}}</td>
<td><a href="{{route('admins.edit',$user->id)}}" class="btn btn-warning">Edit</a></td>
</tr>

@empty
                <tr>
                    <td colspan="6">No admin users found.</td>
                </tr>
        

    @endforelse

</tbody>
</table>

</div>

    @endsection