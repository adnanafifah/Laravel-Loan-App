<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'loan';
    protected $primaryKey = 'loan_id';
    const UPDATED_AT = null;
    const CREATED_AT = null;
}
