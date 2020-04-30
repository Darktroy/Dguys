<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoneyChanges extends Model
{
    


    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'value'
              ];

  



}
