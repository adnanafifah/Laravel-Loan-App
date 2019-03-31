@extends('master') 
@section('content')

<div class="card">
    <div class="card-content">
        <h4>Loan > Edit</h4>
        <br>
        <form method="POST" action="/update/{{$list->loan_id}}" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td>ID</td>
                    <td>{{$list->loan_id}}</td>
                </tr>
                <tr>
                    <td>Customer Name</td>
                    <td><input name="name" type="text" class="validate" value="{{$list->name}}"></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>
                        <select name="type">
                            <option value="" disabled>Choose your option</option>
                            <option value="1"
                                @if($list->type == 1)
                                    selected
                                @endif
                            >Home</option>
                            <option value="2" 
                                @if($list->type == 2)
                                    selected
                                @endif
                            >Personal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td><input name="amount" type="text" class="validate" value="{{$list->amount}}"></td>
                </tr>
                <tr>
                    <td>Duration</td>
                    <td><input name="duration" type="text" class="validate" value="{{$list->duration}}"></td>
                </tr>
                <tr>
                    <td>Installment</td>
                    <td><input name="installment" type="text" class="validate" value="{{$list->installment / 100}}"></td>
                </tr>
            </table>
            <br>
            <p>Uploaded Document</p>
            <div id="documentFiles">
            </div>

            <button class="waves-effect waves-light btn blue" type="button" onclick="upload()">Upload <i class="material-icons right">file_upload</i></button>
            <input type="file" style="display:none" name="documents" id="inputupload" onchange="onChange(this)" />
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
            <button class="waves-effect waves-light btn green" type="submit">Save <i class="material-icons right">save</i></button>
            <a class="waves-effect waves-light btn blue-grey" href="/">Cancel <i class="material-icons right">cancel</i></a>
            <a class="waves-effect waves-light btn red" href="/delete/{{$list->loan_id}}">Delete <i class="material-icons right">delete</i></a>
        </form>
    </div>
</div>
<script>
    function onChange($event){
        var files = $event.files;

        $('#documentFiles').empty();

        for(let i = 0; i < files.length; i ++) {
            $('#documentFiles').append(`
                <table>
                    <tr>
                        <td></td>
                        <td> ${files.item(i).name}</td>
                        <td> ${files.item(i).type}</td>
                    </tr>
                </table>
            `);
        }
    }

    function upload(){
        document.getElementById('inputupload').click();
    }

</script>
@endsection