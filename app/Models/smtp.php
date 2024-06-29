<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class smtp extends Model
{
    use HasFactory;
    protected $fillable = ['mailer', 'host', 'port', 'user_name', 'password'];

    public static function updateSmtps($request, $smtp)
    {
        self::saveBasicInfo($smtp, $request);
    }
    private static function saveBasicInfo($smtp, $request)
    {
        $smtp->mailer      = $request->mailer;
        $smtp->host  = $request->host;
        $smtp->port  = $request->port;
        $smtp->user_name  = $request->user_name;
        $smtp->password  = $request->password;
        $smtp->save();
    }
}
