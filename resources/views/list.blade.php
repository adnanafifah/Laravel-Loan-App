@extends('master') 
@section('content')

<div class="card">
    <div class="card-content">
        <h4>Loan > List</h4>
        <br>
        <a class="waves-effect waves-light btn blue" href="add">Add <i class="material-icons right">add</i></a>

        <table>
            <thead>
                <tr>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Id</th>
                    <th>Customer Name</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Duration</th>
                    <th>Installment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lists as $list)
                <tr>
                    <td><a class="waves-effect waves-light btn green" href="view/{{$list->loan_id}}">View <i class="material-icons right">pageview</i></a></td>
                    <td><a class="waves-effect waves-light btn orange" href="edit/{{$list->loan_id}}">Edit <i class="material-icons right">edit</i></a></td>
                    <td>{{ $list->loan_id }}</td>
                    <td>{{ $list->name }}</td>
                    @if ($list->type == 1)
                    <td>Home</td>
                    @else
                    <td>Personal</td>
                    @endif
                    <td>{{ number_format($list->amount, 2) }}</td>
                    <td>{{ $list->duration }}</td>
                    <td>{{ number_format($list->installment / 100, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection