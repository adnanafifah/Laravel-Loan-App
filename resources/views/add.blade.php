@extends('master') 
@section('content')

<div class="card">
    <div class="card-content">
        <h4>Loan > Add</h4>
        <br>
        <form method="POST" action="/insert">
            @csrf
            <table>
                <tr>
                    <td>Customer Name</td>
                    <td><input name="name" type="text" class="validate"></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>
                        <select name="type">
                            <option value="" disabled>Choose your option</option>
                            <option value="1">Home</option>
                            <option value="2">Personal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td><input name="amount" type="text" class="validate"></td>
                </tr>
                <tr>
                    <td>Duration</td>
                    <td><input name="duration" type="text" class="validate"></td>
                </tr>
            </table>
            <br>
            <button class="waves-effect waves-light btn green" type="submit">Save <i class="material-icons right">save</i></button>
            <a class="waves-effect waves-light btn" href="/">Cancel <i class="material-icons right">cancel</i></a>
        </form>
    </div>
</div>
@endsection