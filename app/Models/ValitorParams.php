<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;

class ValitorParams {
   
    use HasResponses;

    public $MerchantID;
    public $Language;
    public $Currency;
    public $AuthorizationOnly;
    public $ReferenceNumber;
    public $Product_1_Description;
    public $Product_1_Quantity;
    public $Product_1_Price;
    public $Product_1_Discount;
    public $PaymentSuccessfulURL;
    public $PaymentSuccessfulServerSideURL;
    public $PaymentSuccessfulURLText;
    public $DigitalSignature;
    public $PaymentSuccessfulAutomaticRedirect;
    public $PaymentCancelledURL;

    public function toArray() {
        return get_object_vars($this);
    }
}