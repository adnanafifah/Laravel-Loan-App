<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';
    protected $primaryKey = 'document_id';
    const UPDATED_AT = null;
    const CREATED_AT = null;
}
