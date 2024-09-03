<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Register extends Authenticatable
{
    use Notifiable;
    protected $table = 'register';
    public $timestamps = false;
    protected $fillable = [
        'uname', 'pass', 'created_at',
    ];

    // Specify the custom username field
    public function username()
    {
        return 'uname';
    }

    // Define the attribute for the password field
    public function getAuthPassword()
    {
        return $this->pass;
    }
}
