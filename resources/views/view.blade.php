@extends('master') 
@section('content')

<div class="card">
    <div class="card-content">
        <h4>Loan > View</h4>
        <br>
        <table>
            <tr>
                <td>ID</td>
                <td>{{$list->loan_id}}</td>
            </tr>
            <tr>
                <td>Customer Name</td>
                <td>{{$list->name}}</td>
            </tr>
            <tr>
                <td>Type</td>
                @if($list->type == 1)
                <td> Home </td>
                @else
                <td> Personal</td>
                @endif
            </tr>
            <tr>
                <td>Amount</td>
                <td>{{$list->amount}}</td>
            </tr>
            <tr>
                <td>Duration</td>
                <td>{{$list->duration}}</td>
            </tr>
            <tr>
                <td>Installment</td>
                <td>{{$list->installment / 100}}</td>
            </tr>
        </table>
        <br>
        <p>Uploaded Document</p>
        <br>
        <table>
            <thead>
                <tr>
                    <th>View/Download</th>
                    <th>File Name</th>
                    <th>Extension</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($docs as $doc)
                <tr>
                    <td><a class="waves-effect waves-light btn amber" href="/download/{{$doc->document_id}}">Download <i class="material-icons right">file_download</i></a></td>
                    <td>{{$doc->file_name}}</td>
                    <td>{{$doc->extension}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <a class="waves-effect waves-light btn blue-grey" href="/">Cancel <i class="material-icons right">cancel</i></a>
    </div>
</div>
@endsection