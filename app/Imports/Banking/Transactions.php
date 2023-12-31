<?php

namespace App\Imports\Banking;

use App\Abstracts\Import;
use App\Http\Requests\Banking\Transaction as Request;
use App\Models\Banking\Transaction as Model;

class Transactions extends Import
{
    public $request_class = Request::class;

    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        $row['currency_code'] = $this->getCurrencyCode($row);
        $row['account_id'] = $this->getAccountId($row);
        $row['category_id'] = $this->getCategoryId($row);
        $row['contact_id'] = $this->getContactId($row);
        $row['document_id'] = $this->getDocumentId($row);
        $row['parent_id'] = $this->getParentId($row);

        return $row;
    }
}
