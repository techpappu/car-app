<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SellerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'isEnabled'=>$this->is_enabled,
            'number' => $this->seller->number,
            'address' => $this->seller->address,
            'company_name' => $this->seller->company_name,
            'company_fax' => $this->seller->company_fax,
            'license_number' => $this->seller->license_number,
            'company_address' => $this->seller->company_address,
            'company_number' => $this->seller->company_number,
            'company_email' => $this->seller->company_email,
            'account_name' => $this->seller->account_name,
            'account_number' => $this->seller->account_number,
            'bank_name' => $this->seller->bank_name,
            'bank_code' => $this->seller->bank_code,
            'branch_name' => $this->seller->branch_name,
            'branch_code' => $this->seller->branch_code,
            'bank_address' => $this->seller->bank_address,
            'sales_commission' => $this->seller->sales_commission,
            'paid_amount' => $this->seller->paid_amount,
            
            
        ];
    }
}
