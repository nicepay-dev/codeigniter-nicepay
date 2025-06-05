<?php

namespace App\Models;

class Payloan
{

    // V2

    private $timeStamp;
    private $iMid;
    private $payMethod;
    private $currency;
    private $amt;
    private $referenceNo;
    private $callBackUrl;
    private $goodsNm;
    private $billingNm;
    private $billingPhone;
    private $billingEmail;
    private $billingAddr;
    private $billingCity;
    private $billingState;
    private $billingCountry;
    private $billingPostCd;
    private $cartData;
    private $userIP;
    private $dbProcessUrl;
    private $merchantToken;
    private $deliveryNm;
    private $deliveryPhone;
    private $deliveryAddr;
    private $deliveryCity;
    private $deliveryState;
    private $deliveryPostCd;
    private $deliveryCountry;
    private $mitraCd;
    private $instmntType;
    private $instmntMon;
    private $userSessionID;
    private $userAgent;
    private $userLanguage;
    private $sellers;

    function __construct(PayloanBuilder $builder)
    {
        // V2

        $this->timeStamp = $builder->getTimeStamp();
        $this->iMid = $builder->getIMid();
        $this->payMethod = $builder->getPayMethod();
        $this->currency = $builder->getCurrency();
        $this->amt = $builder->getAmt();
        $this->referenceNo = $builder->getReferenceNo();
        $this->callBackUrl = $builder->getCallBackUrl();
        $this->goodsNm = $builder->getGoodsNm();
        $this->billingNm = $builder->getBillingNm();
        $this->billingPhone = $builder->getBillingPhone();
        $this->billingEmail = $builder->getBillingEmail();
        $this->billingAddr = $builder->getBillingAddr();
        $this->billingCity = $builder->getBillingCity();
        $this->billingState = $builder->getBillingState();
        $this->billingCountry = $builder->getBillingCountry();
        $this->billingPostCd = $builder->getBillingPostCd();
        $this->cartData = $builder->getCartData();
        $this->userIP = $builder->getUserIP();
        $this->dbProcessUrl = $builder->getDbProcessUrl();
        $this->merchantToken = $builder->getMerchantToken();
        $this->deliveryNm = $builder->getDeliveryNm();
        $this->deliveryPhone = $builder->getDeliveryPhone();
        $this->deliveryAddr = $builder->getDeliveryAddr();
        $this->deliveryCity = $builder->getDeliveryCity();
        $this->deliveryState = $builder->getDeliveryState();
        $this->deliveryPostCd = $builder->getDeliveryPostCd();
        $this->deliveryCountry = $builder->getDeliveryCountry();
        $this->mitraCd = $builder->getMitraCd();
        $this->instmntType = $builder->getInstmntType();
        $this->instmntMon = $builder->getInstmntMon();
        $this->userSessionID = $builder->getUserSessionID();
        $this->userAgent = $builder->getUserAgent();
        $this->userLanguage = $builder->getUserLanguage();
        $this->sellers = $builder->getSellers();
    }

    public static function builder(): PayloanBuilder
    {
        return new PayloanBuilder();
    }

    // V2

    public function toArrayV2(): array
    {
        return [
            'timeStamp' => $this->timeStamp,
            'iMid' => $this->iMid,
            'payMethod' => $this->payMethod,
            'currency' => $this->currency,
            'amt' => $this->amt,
            'referenceNo' => $this->referenceNo,
            'callBackUrl' => $this->callBackUrl,
            'goodsNm' => $this->goodsNm,
            'billingNm' => $this->billingNm,
            'billingPhone' => $this->billingPhone,
            'billingEmail' => $this->billingEmail,
            'billingAddr' => $this->billingAddr,
            'billingCity' => $this->billingCity,
            'billingState' => $this->billingState,
            'billingPostCd' => $this->billingPostCd,
            'billingCountry' => $this->billingCountry,
            'dbProcessUrl' => $this->dbProcessUrl,
            'merchantToken' => $this->merchantToken,
            'cartData' => $this->cartData,
            'userIP' => $this->userIP,
            'deliveryNm' => $this->deliveryNm,
            'deliveryPhone' => $this->deliveryPhone,
            'deliveryAddr' => $this->deliveryAddr,
            'deliveryCity' => $this->deliveryCity,
            'deliveryState' => $this->deliveryState,
            'deliveryPostCd' => $this->deliveryPostCd,
            'deliveryCountry' => $this->deliveryCountry,
            'mitraCd' => $this->mitraCd,
            'instmntType' => $this->instmntType,
            'instmntMon' => $this->instmntMon,
            'userSessionID' => $this->userSessionID,
            'userAgent' => $this->userAgent,
            'userLanguage' => $this->userLanguage,
            'sellers' => $this->sellers
        ];
    }

    // V2
    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    public function getIMid()
    {
        return $this->iMid;
    }

    public function getPayMethod()
    {
        return $this->payMethod;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getAmt()
    {
        return $this->amt;
    }

    public function getReferenceNo()
    {
        return $this->referenceNo;
    }

    public function getCallBackUrl()
    {
        return $this->callBackUrl;
    }

    public function getGoodsNm()
    {
        return $this->goodsNm;
    }

    public function getBillingNm()
    {
        return $this->billingNm;
    }

    public function getBillingPhone()
    {
        return $this->billingPhone;
    }

    public function getBillingEmail()
    {
        return $this->billingEmail;
    }

    public function getBillingAddr()
    {
        return $this->billingAddr;
    }

    public function getBillingCity()
    {
        return $this->billingCity;
    }

    public function getBillingState()
    {
        return $this->billingState;
    }

    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    public function getBillingPostCd()
    {
        return $this->billingPostCd;
    }

    public function getCartData()
    {
        return $this->cartData;
    }

    public function getUserIP()
    {
        return $this->userIP;
    }

    public function getDbProcessUrl()
    {
        return $this->dbProcessUrl;
    }

    public function getMerchantToken()
    {
        return $this->merchantToken;
    }

    public function getDeliveryNm()
    {
        return $this->deliveryNm;
    }

    public function getDeliveryPhone()
    {
        return $this->deliveryPhone;
    }

    public function getDeliveryAddr()
    {
        return $this->deliveryAddr;
    }

    public function getDeliveryCity()
    {
        return $this->deliveryCity;
    }

    public function getDeliveryState()
    {
        return $this->deliveryState;
    }

    public function getDeliveryPostCd()
    {
        return $this->deliveryPostCd;
    }

    public function getDeliveryCountry()
    {
        return $this->deliveryCountry;
    }

    public function getMitraCd()
    {
        return $this->mitraCd;
    }

    public function getInstmntType()
    {
        return $this->instmntType;
    }

    public function getInstmntMon()
    {
        return $this->instmntMon;
    }

    public function getUserSessionID()
    {
        return $this->userSessionID;
    }

    public function geUserAgent()
    {
        return $this->userAgent;
    }

    public function geUserLanguage()
    {
        return $this->userLanguage;
    }

    public function getSellers()
    {
        return $this->sellers;
    }

    public function setMerchantToken($merchantToken)
    {
        $this->merchantToken = $merchantToken;
    }
}

class PayloanBuilder
{

    // V2

    private $timeStamp;
    private $iMid;
    private $payMethod;
    private $currency;
    private $amt;
    private $referenceNo;
    private $callBackUrl;
    private $goodsNm;
    private $billingNm;
    private $billingPhone;
    private $billingEmail;
    private $billingAddr;
    private $billingCity;
    private $billingState;
    private $billingCountry;
    private $billingPostCd;
    private $cartData;
    private $userIP;
    private $dbProcessUrl;
    private $merchantToken;
    private $deliveryNm;
    private $deliveryPhone;
    private $deliveryAddr;
    private $deliveryCity;
    private $deliveryState;
    private $deliveryPostCd;
    private $deliveryCountry;
    private $mitraCd;
    private $instmntType;
    private $instmntMon;
    private $userSessionID;
    private $userAgent;
    private $userLanguage;
    private $sellers;

    // GETTER V2

    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    public function getIMid()
    {
        return $this->iMid;
    }

    public function getPayMethod()
    {
        return $this->payMethod;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getAmt()
    {
        return $this->amt;
    }

    public function getReferenceNo()
    {
        return $this->referenceNo;
    }

    public function getCallBackUrl()
    {
        return $this->callBackUrl;
    }

    public function getGoodsNm()
    {
        return $this->goodsNm;
    }

    public function getBillingNm()
    {
        return $this->billingNm;
    }

    public function getBillingPhone()
    {
        return $this->billingPhone;
    }

    public function getBillingEmail()
    {
        return $this->billingEmail;
    }

    public function getBillingAddr()
    {
        return $this->billingAddr;
    }

    public function getBillingCity()
    {
        return $this->billingCity;
    }

    public function getBillingState()
    {
        return $this->billingState;
    }

    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    public function getBillingPostCd()
    {
        return $this->billingPostCd;
    }

    public function getCartData()
    {
        return $this->cartData;
    }

    public function getUserIP()
    {
        return $this->userIP;
    }

    public function getDbProcessUrl()
    {
        return $this->dbProcessUrl;
    }

    public function getMerchantToken()
    {
        return $this->merchantToken;
    }

    public function getDeliveryNm()
    {
        return $this->deliveryNm;
    }

    public function getDeliveryPhone()
    {
        return $this->deliveryPhone;
    }

    public function getDeliveryAddr()
    {
        return $this->deliveryAddr;
    }

    public function getDeliveryCity()
    {
        return $this->deliveryCity;
    }

    public function getDeliveryState()
    {
        return $this->deliveryState;
    }

    public function getDeliveryPostCd()
    {
        return $this->deliveryPostCd;
    }

    public function getDeliveryCountry()
    {
        return $this->deliveryCountry;
    }

    public function getMitraCd()
    {
        return $this->mitraCd;
    }

    public function getInstmntType()
    {
        return $this->instmntType;
    }

    public function getInstmntMon()
    {
        return $this->instmntMon;
    }

    public function getUserSessionID()
    {
        return $this->userSessionID;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function getUserLanguage()
    {
        return $this->userLanguage;
    }

    public function getSellers()
    {
        return $this->sellers;
    }

    // SETTER V2

    public function setTimeStamp($timeStamp): PayloanBuilder
    {
        $this->timeStamp = $timeStamp;
        return $this;
    }

    public function setIMid($iMid): PayloanBuilder
    {
        $this->iMid = $iMid;
        return $this;
    }

    public function setPayMethod($payMethod): PayloanBuilder
    {
        $this->payMethod = $payMethod;
        return $this;
    }

    public function setCurrency($currency): PayloanBuilder
    {
        $this->currency = $currency;
        return $this;
    }
    public function setAmt($amt): PayloanBuilder
    {
        $this->amt = $amt;
        return $this;
    }

    public function setReferenceNo($referenceNo): PayloanBuilder
    {
        $this->referenceNo = $referenceNo;
        return $this;
    }

    public function setCallBackUrl($callBackUrl): PayloanBuilder
    {
        $this->callBackUrl = $callBackUrl;
        return $this;
    }

    public function setGoodsNm($goodsNm): PayloanBuilder
    {
        $this->goodsNm = $goodsNm;
        return $this;
    }

    public function setBillingNm($billingNm): PayloanBuilder
    {
        $this->billingNm = $billingNm;
        return $this;
    }

    public function setBillingPhone($billingPhone): PayloanBuilder
    {
        $this->billingPhone = $billingPhone;
        return $this;
    }

    public function setBillingEmail($billingEmail): PayloanBuilder
    {
        $this->billingEmail = $billingEmail;
        return $this;
    }

    public function setBillingAddr($billingAddr): PayloanBuilder
    {
        $this->billingAddr = $billingAddr;
        return $this;
    }

    public function setBillingCity($billingCity): PayloanBuilder
    {
        $this->billingCity = $billingCity;
        return $this;
    }

    public function setBillingState($billingState): PayloanBuilder
    {
        $this->billingState = $billingState;
        return $this;
    }

    public function setBillingCountry($billingCountry): PayloanBuilder
    {
        $this->billingCountry = $billingCountry;
        return $this;
    }

    public function setBillingPostCd($billingPostCd): PayloanBuilder
    {
        $this->billingPostCd = $billingPostCd;
        return $this;
    }

    public function setCartData($cartData): PayloanBuilder
    {
        $this->cartData = $cartData;
        return $this;
    }

    public function setUserIP($userIP): PayloanBuilder
    {
        $this->userIP = $userIP;
        return $this;
    }

    public function setDbProcessUrl($dbProcessUrl): PayloanBuilder
    {
        $this->dbProcessUrl = $dbProcessUrl;
        return $this;
    }

    public function setMerchantToken($timeStamp, $iMid, $tXid, $amount, $merchantKey): PayloanBuilder
    {
        $this->merchantToken = $timeStamp . $iMid . $tXid . $amount . $merchantKey;
        return $this;
    }
    
    public function setDeliveryNm($deliveryNm): PayloanBuilder
    {
        $this->deliveryNm = $deliveryNm;
        return $this;
    }

    public function setDeliveryPhone($deliveryPhone): PayloanBuilder
    {
        $this->deliveryPhone = $deliveryPhone;
        return $this;
    }

    public function setDeliveryAddr($deliveryAddr): PayloanBuilder
    {
        $this->deliveryAddr = $deliveryAddr;
        return $this;
    }

    public function setDeliveryCity($deliveryCity): PayloanBuilder
    {
        $this->deliveryCity = $deliveryCity;
        return $this;
    }

    public function setDeliveryState($deliveryState): PayloanBuilder
    {
        $this->deliveryState = $deliveryState;
        return $this;
    }

    public function setDeliveryPostCd($deliveryPostCd): PayloanBuilder
    {
        $this->deliveryPostCd = $deliveryPostCd;
        return $this;
    }

    public function setDeliveryCountry($deliveryCountry): PayloanBuilder
    {
        $this->deliveryCountry = $deliveryCountry;
        return $this;
    }

    public function setMitraCd($mitraCd): PayloanBuilder 
    {
        $this -> mitraCd = $mitraCd;
        return $this;
    }

    public function setInstmntType($instmntType): PayloanBuilder
    {
        $this->instmntType = $instmntType;
        return $this;
    }

    public function setInstmntMon($instmntMon): PayloanBuilder
    {
        $this->instmntMon = $instmntMon;
        return $this;
    }

    public function setUserSessionID($userSessionID): PayloanBuilder
    {
        $this->userSessionID = $userSessionID;
        return $this;
    }

    public function setUserAgent($userAgent): PayloanBuilder
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    public function setUserLanguage($userLanguage): PayloanBuilder
    {
        $this->userLanguage = $userLanguage;
        return $this;
    }

    public function setSellers($sellers): PayloanBuilder 
    {
        $this -> sellers = $sellers;
        return $this;
    }

    public function build(): Payloan
    {
        return new Payloan($this);
    }
}
