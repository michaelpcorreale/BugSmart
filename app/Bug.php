<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model {

    protected $table = 'bugs';

    // Bug is assigned to a user

    public function user() {

        return $this->belongsTo('\App\User');

    }

}
