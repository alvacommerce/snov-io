<?php

namespace HelgeSverre\Snov\Requests\EmailFinder;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class AddNamesToFindEmailsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  mixed  $firstName  The email address owner`s first name.
     * @param  mixed  $lastName  The email address owner`s last name.
     * @param  mixed  $domain  The domain name of the company that is used in the email address.
     **/
    public function __construct(
        protected mixed $firstName,
        protected mixed $lastName,
        protected mixed $domain,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/add-names-to-find-emails';
    }

    public function defaultBody(): array
    {
        return array_filter([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'domain' => $this->domain,
        ]);
    }
}
