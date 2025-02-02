<?php

namespace HelgeSverre\Snov\Requests\EmailVerifier;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class EmailVerifierRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  mixed  $emails  The email addresses you need to verify.
     **/
    public function __construct(
        protected mixed $emails,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/get-emails-verification-status';
    }

    public function defaultBody(): array
    {
        return array_filter([
            'emails' => $this->emails,
        ]);
    }
}
