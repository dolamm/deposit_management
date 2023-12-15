<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use GuzzleHttp\Client;
class ValidRecaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $client = new Client([
            'base_uri' => 'https://www.google.com/recaptcha/api/',
        ]);

        $response = $client->post('siteverify', [
            'query' => [
                'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                'response' => $value,
            ],
        ]);
        $body = json_decode((string) $response->getBody());
        if (!$body->success) {
            $fail($this->message());
        }
    }

    public function message(): string
    {
        return 'sai captcha, xin mời nhập lại';
    }
}
