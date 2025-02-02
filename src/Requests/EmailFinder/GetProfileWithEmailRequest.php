<?php

namespace HelgeSverre\Snov\Requests\EmailFinder;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class GetProfileWithEmailRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  mixed  $email  The email address of the person you want to find additional information on.
     **/
    public function __construct(
        protected mixed $email,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/get-profile-by-email';
    }

    public function defaultBody(): array
    {
        return array_filter([
            'email' => $this->email,
        ]);
    }
}
