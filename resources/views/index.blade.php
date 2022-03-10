@extends('layouts.mainlayout')
@section('title', 'Index')
@section('content')
<table>
<tr>
    <th>Employee Number</th>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Birthday</th>
    <th> Age </th>
    <th> Gender </th>
    <th> Email </th>
    <th>Status</th>
</tr>

@forelse($Employee as $key => $employee)
    <tr>
        <td>
            <p>{{ $key }}</p>
        </td>
        <td>
            <p>{{  $employee['lastname'] }}</p>
        </td>
        <td>
            <p>{{  $employee['firstname'] }}</p>
        </td>
        <td>
            <p>{{  $employee['birthday'] }}</p>
        </td>
        <td>
            <p>{{  $employee['Age'] }}</p>
        </td>
        <td>
            <p>{{  $employee['Gender'] }}</p>
        </td>
        <td>
            <p>{{  $employee['Email'] }}</p>
        </td>
        <td>
        <form action="<?php echo $key ?>/destroy" method="POST">
        @csrf
        <input type="hidden" name="name" value= <?php echo $key ?>>
        <input type="submit" name="submit" onclick="return confirm('Are you sure you want to delete <?php echo $key ?>?')" value="Delete">
        </form>
        </td>
        <td>
    </tr>

@empty
    <h1>No Data!</h1>
@endforelse

</table>
@endsection