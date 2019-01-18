<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Fornecedor extends Model
{

    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fornecedores';

    protected $fillable = [
        'nome',
        'email',
        'mensalidade',
        'ativado',
        'email_token',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
