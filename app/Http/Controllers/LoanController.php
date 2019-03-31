<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class LoanController extends Controller
{
    public function show()
    {
        return view('list', ['lists' => Loan::all()]);
    }

    public function edit($id)
    {
        return view('edit', [
            'list' => Loan::find($id),
            'docs' => Document::where('loan_id', $id)->get()
        ]);
    }

    public function update($id, Request $request)
    {
        // Load data with id
        $loan = Loan::find($id);

        $loan->name = Input::get('name');
        $loan->type = Input::get('type');
        $loan->amount = Input::get('amount');
        $loan->duration = Input::get('duration');
        if($loan->type == 1)
        {
            $loan->installment = ( $loan->amount * 0.005 * ((1+0.005)** $loan->duration) ) / ( ((1+0.005)** $loan->duration) - 1 );
        } else {
            $loan->installment = ($loan->amount*($loan->duration / 12)*0.08+$loan->amount) / $loan->duration; 
        }
        $loan->save();

        if ($request->hasFile('documents')) { 
            $data = file_get_contents(Input::file('documents')->getRealPath()); 
            $base64 = base64_encode($data); 

            $doc = new Document;

            $doc->file_name = Input::file('documents')->getClientOriginalName();
            $doc->extension = Input::file('documents')->getMimeType();
            $doc->content = $base64;
            $doc->loan_id = $id;

            $doc->save();
        }

        return redirect('edit/'.$id);
    }

    public function view($id)
    {
        return view('view', ['list' => Loan::find($id),'docs' => Document::where('loan_id', $id)->get()]);
    }

    public function add()
    {
        return view('add');
    }

    public function insert()
    {
        $loan = new Loan;

        $loan->name = Input::get('name');
        $loan->type = Input::get('type');
        $loan->amount = Input::get('amount');
        $loan->duration = Input::get('duration');
        if($loan->type == 1)
        {
            $loan->installment = ( $loan->amount * 0.005 * ((1+0.005)** $loan->duration) ) / ( ((1+0.005)** $loan->duration) - 1 );
        } else {
            $loan->installment = ($loan->amount*($loan->duration / 12)*0.08+$loan->amount) / $loan->duration; 
        }
        $loan->save();

        return redirect('view/'.$loan->loan_id);
    }

    public function delete($id)
    {
        Loan::destroy($id) ;
        return redirect('/');
    }

    public function download($id) 
    {
        $doc = Document::find($id);

        $decoded = base64_decode($doc->content); 
        $file = $doc->file_name;

        $filePath = file_put_contents($file, $decoded);

        return response()->download($file)->deleteFileAfterSend();
    }
}
