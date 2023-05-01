<?php

namespace App\Http\Service\Frontend;

use App\Http\Repository\Frontend\FAQRepository;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use App\Http\Resources\Frontend\FAQResource;

class FAQService
{
    use RespondsWithHttpStatus;

    public function index()
    {
        return FAQRepository::index();
    }

  }
