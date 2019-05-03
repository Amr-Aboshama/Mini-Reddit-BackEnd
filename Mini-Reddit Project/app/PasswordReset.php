<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PasswordReset extends Model
{
    public $incrementing = false; //so eloquent doesn't expect your primary key to be an autoincrement primary key.

    public $timestamps = false; // To cancel expectations of updated_at and created_at tables.

    protected $primaryKey = 'email';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'hash', 'expires_at',
    ];

    /**
     * Generate new password reset URL and invalidate all the old ones.
     *
     * @param string $email email to generate URL for it
     *
     * @return string Hashed URL to access the form.
     */
    public static function createPasswordReset($email)
    {
        self::where('email', $email)->delete();

        $hash = Str::random(100);
        self::create([
            'email' => $email,
            'hash' => $hash,
            'created_at' => now()->toDateTimeString(),
        ]);

        return $hash;
    }

    /**
     * Get the email of a specific hash.
     *
     * @param string $hash hash of forget password request
     *
     * @return object if a valid forget password exists and haven't expired yet, return email. Otherwise, return false
     */
    public static function getEmailByHash($hash)
    {
        try {
            $record = self::where('hash', $hash)->first();
            $diff_in_minutes = now()->diffInMinutes($record->created_at);

            $email = $record->email;

            $record->delete();

            if ($diff_in_minutes > 60) {
                return false;
            }

            return $email;
        } catch (\Exception $e) {
            return false;
        }
    }
}
