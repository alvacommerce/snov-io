<?php

namespace HelgeSverre\Snov\Requests\ProspectManagement;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class CreateNewProspectListRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  mixed  $name  The name of the new prospect list.
     **/
    public function __construct(
        protected mixed $name,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/lists';
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
        ]);
    }
}
