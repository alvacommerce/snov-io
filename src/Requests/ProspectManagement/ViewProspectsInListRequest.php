<?php

namespace HelgeSverre\Snov\Requests\ProspectManagement;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class ViewProspectsInListRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  mixed  $listId  The list’s unique identifier.
     * @param  mixed  $page  You can choose on which page of the list you would like to begin your search. This field is optional.
     * @param  mixed  $perPage  You can choose on which page of the list you would like to end your search. This field is optional. Maximum value is 100.
     **/
    public function __construct(
        protected mixed $listId,
        protected mixed $page,
        protected mixed $perPage,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/prospect-list';
    }

    public function defaultBody(): array
    {
        return array_filter([
            'listId' => $this->listId,
            'page' => $this->page,
            'perPage' => $this->perPage,
        ]);
    }
}
