<?php

namespace HelgeSverre\Snov\Requests\EmailVerifier;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class AddEmailsForVerificationRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  mixed  $emails  A list of email addresses you need to add to the verification queue. Each request can contain up to 10 emails.
     **/
    public function __construct(
        protected mixed $emails,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/add-emails-to-verification';
    }

    public function defaultBody(): array
    {
        return array_filter([
            'emails' => $this->emails,
        ]);
    }
}
