<?php

namespace App\Models;

class Cvs
{

    // V2

    private $timeStamp;
    private $iMid;
    private $payMethod;
    private $currency;
    private $amt;
    private $merchantToken;
    private $referenceNo;
    private $description;
    private $goodsNm;
    private $billingNm;
    private $billingPhone;
    private $billingEmail;
    private $billingAddr;
    private $billingCity;
    private $billingState;
    private $billingCountry;
    private $billingPostCd;
    private $dbProcessUrl;
    private $cartData;
    private $userIP;
    private $deliveryNm;
    private $deliveryPhone;
    private $deliveryAddr;
    private $deliveryCity;
    private $deliveryState;
    private $deliveryPostCd;
    private $deliveryCountry;
    private $reqDt;
    private $reqTm;
    private $reqDomain;
    private $reqServerIP;
    private $reqClientVer;
    private $userSessionID;
    private $mitraCd;
    private $payValidDt;
    private $payValidTm;

    function __construct(CvsBuilder $builder)
    {
        // V2

        $this->timeStamp = $builder->getTimeStamp();
        $this->iMid = $builder->getIMid();
        $this->payMethod = $builder->getPayMethod();
        $this->currency = $builder->getCurrency();
        $this->amt = $builder->getAmt();
        $this->merchantToken = $builder->getMerchantToken();
        $this->referenceNo = $builder->getReferenceNo();
        $this->description = $builder->getDescription();
        $this->goodsNm = $builder->getGoodsNm();
        $this->billingNm = $builder->getBillingNm();
        $this->billingPhone = $builder->getBillingPhone();
        $this->billingEmail = $builder->getBillingEmail();
        $this->billingAddr = $builder->getBillingAddr();
        $this->billingCity = $builder->getBillingCity();
        $this->billingState = $builder->getBillingState();
        $this->billingCountry = $builder->getBillingCountry();
        $this->billingPostCd = $builder->getBillingPostCd();
        $this->dbProcessUrl = $builder->getDbProcessUrl();
        $this->cartData = $builder->getCartData();
        $this->userIP = $builder->getUserIP();
        $this->deliveryNm = $builder->getDeliveryNm();
        $this->deliveryPhone = $builder->getDeliveryPhone();
        $this->deliveryAddr = $builder->getDeliveryAddr();
        $this->deliveryCity = $builder->getDeliveryCity();
        $this->deliveryState = $builder->getDeliveryState();
        $this->deliveryPostCd = $builder->getDeliveryPostCd();
        $this->deliveryCountry = $builder->getDeliveryCountry();        
        $this->reqDt = $builder->getReqDt();
        $this->reqTm = $builder->getReqTm();
        $this->reqDomain = $builder->getReqDomain();
        $this->reqServerIP = $builder->getReqServerIP();
        $this->reqClientVer = $builder->getReqClientVer();
        $this->userSessionID = $builder->getUserSessionID();
        $this->mitraCd = $builder->getMitraCd();
        $this->payValidDt = $builder->getPayValidDt();
        $this->payValidTm = $builder->getPayValidTm();
    }

    public static function builder(): CvsBuilder
    {
        return new CvsBuilder();
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
            'description' => $this->description,
            'userIP' => $this->userIP,
            'deliveryNm' => $this->deliveryNm,
            'deliveryPhone' => $this->deliveryPhone,
            'deliveryAddr' => $this->deliveryAddr,
            'deliveryCity' => $this->deliveryCity,
            'deliveryState' => $this->deliveryState,
            'deliveryPostCd' => $this->deliveryPostCd,
            'deliveryCountry' => $this->deliveryCountry,
            'reqDt' => $this->reqDt,
            'reqTm' => $this->reqTm,
            'reqDomain' => $this->reqDomain,
            'reqServerIP' => $this->reqServerIP,
            'reqClientVer' => $this->reqClientVer,
            'userSessionID' => $this->userSessionID,
            'mitraCd' => $this->mitraCd,
            'payValidDt' => $this->payValidDt,
            'payValidTm' => $this->payValidTm
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

    public function getMerchantToken()
    {
        return $this->merchantToken;
    }

    public function getReferenceNo()
    {
        return $this->referenceNo;
    }

    public function getDescription()
    {
        return $this->description;
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

    public function getDbProcessUrl()
    {
        return $this->dbProcessUrl;
    }

    public function getCartData()
    {
        return $this->cartData;
    }

    public function getUserIP()
    {
        return $this->userIP;
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

    public function getReqDt()
    {
        return $this->reqDt;
    }

    public function getReqTm()
    {
        return $this->reqTm;
    }

    public function getReqDomain()
    {
        return $this->reqDomain;
    }

    public function getReqServerIP()
    {
        return $this->reqServerIP;
    }

    public function getReqClientVer()
    {
        return $this->reqClientVer;
    }

    public function getUserSessionID()
    {
        return $this->userSessionID;
    }

    public function getMitraCd()
    {
        return $this->mitraCd;
    }

    public function getPayValidDt()
    {
        return $this->payValidDt;
    }

    public function getPayValidTm()
    {
        return $this->payValidTm;
    }

    public function setMerchantToken($merchantToken)
    {
        $this->merchantToken = $merchantToken;
    }
}

class CvsBuilder
{

    // V2

    private $timeStamp;
    private $iMid;
    private $payMethod;
    private $currency;
    private $amt;
    private $merchantToken;
    private $referenceNo;
    private $description;
    private $goodsNm;
    private $billingNm;
    private $billingPhone;
    private $billingEmail;
    private $billingAddr;
    private $billingCity;
    private $billingState;
    private $billingCountry;
    private $billingPostCd;
    private $dbProcessUrl;
    private $cartData;
    private $userIP;
    private $deliveryNm;
    private $deliveryPhone;
    private $deliveryAddr;
    private $deliveryCity;
    private $deliveryState;
    private $deliveryPostCd;
    private $deliveryCountry;
    private $reqDt;
    private $reqTm;
    private $reqDomain;
    private $reqServerIP;
    private $reqClientVer;
    private $userSessionID;
    private $mitraCd;
    private $payValidDt;
    private $payValidTm;

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

    public function getMerchantToken()
    {
        return $this->merchantToken;
    }

    public function getReferenceNo()
    {
        return $this->referenceNo;
    }

    public function getDescription()
    {
        return $this->description;
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

    public function getDbProcessUrl()
    {
        return $this->dbProcessUrl;
    }

    public function getCartData()
    {
        return $this->cartData;
    }

    public function getUserIP()
    {
        return $this->userIP;
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

    public function getReqDt()
    {
        return $this->reqDt;
    }

    public function getReqTm()
    {
        return $this->reqTm;
    }

    public function getReqDomain()
    {
        return $this->reqDomain;
    }

    public function getReqServerIP()
    {
        return $this->reqServerIP;
    }

    public function getReqClientVer()
    {
        return $this->reqClientVer;
    }

    public function getUserSessionID()
    {
        return $this->userSessionID;
    }

    public function getMitraCd()
    {
        return $this->mitraCd;
    }

    public function getPayValidDt()
    {
        return $this->payValidDt;
    }

    public function getPayValidTm()
    {
        return $this->payValidTm;
    }

    // SETTER V2

    public function setTimeStamp($timeStamp): CvsBuilder
    {
        $this->timeStamp = $timeStamp;
        return $this;
    }

    public function setIMid($iMid): CvsBuilder
    {
        $this->iMid = $iMid;
        return $this;
    }

    public function setPayMethod($payMethod): CvsBuilder
    {
        $this->payMethod = $payMethod;
        return $this;
    }

    public function setCurrency($currency): CvsBuilder
    {
        $this->currency = $currency;
        return $this;
    }
    public function setAmt($amt): CvsBuilder
    {
        $this->amt = $amt;
        return $this;
    }

    public function setMerchantToken($timeStamp, $iMid, $tXid, $amount, $merchantKey): CvsBuilder
    {
        $this->merchantToken = $timeStamp . $iMid . $tXid . $amount . $merchantKey;
        return $this;
    }

    public function setReferenceNo($referenceNo): CvsBuilder
    {
        $this->referenceNo = $referenceNo;
        return $this;
    }

    public function setDescription($description): CvsBuilder
    {
        $this->description = $description;
        return $this;
    }
    public function setGoodsNm($goodsNm): CvsBuilder
    {
        $this->goodsNm = $goodsNm;
        return $this;
    }
    public function setBillingNm($billingNm): CvsBuilder
    {
        $this->billingNm = $billingNm;
        return $this;
    }
    public function setBillingPhone($billingPhone): CvsBuilder
    {
        $this->billingPhone = $billingPhone;
        return $this;
    }
    public function setBillingEmail($billingEmail): CvsBuilder
    {
        $this->billingEmail = $billingEmail;
        return $this;
    }
    public function setBillingAddr($billingAddr): CvsBuilder
    {
        $this->billingAddr = $billingAddr;
        return $this;
    }
    public function setBillingCity($billingCity): CvsBuilder
    {
        $this->billingCity = $billingCity;
        return $this;
    }
    public function setBillingState($billingState): CvsBuilder
    {
        $this->billingState = $billingState;
        return $this;
    }
    public function setBillingCountry($billingCountry): CvsBuilder
    {
        $this->billingCountry = $billingCountry;
        return $this;
    }
    public function setBillingPostCd($billingPostCd): CvsBuilder
    {
        $this->billingPostCd = $billingPostCd;
        return $this;
    }
    public function setDbProcessUrl($dbProcessUrl): CvsBuilder
    {
        $this->dbProcessUrl = $dbProcessUrl;
        return $this;
    }
    public function setCartData($cartData): CvsBuilder
    {
        $this->cartData = $cartData;
        return $this;
    }
    public function setUserIP($userIP): CvsBuilder
    {
        $this->userIP = $userIP;
        return $this;
    }
    public function setDeliveryNm($deliveryNm): CvsBuilder
    {
        $this->deliveryNm = $deliveryNm;
        return $this;
    }
    public function setDeliveryPhone($deliveryPhone): CvsBuilder
    {
        $this->deliveryPhone = $deliveryPhone;
        return $this;
    }
    public function setDeliveryAddr($deliveryAddr): CvsBuilder
    {
        $this->deliveryAddr = $deliveryAddr;
        return $this;
    }
    public function setDeliveryCity($deliveryCity): CvsBuilder
    {
        $this->deliveryCity = $deliveryCity;
        return $this;
    }
    public function setDeliveryState($deliveryState): CvsBuilder
    {
        $this->deliveryState = $deliveryState;
        return $this;
    }
    public function setDeliveryPostCd($deliveryPostCd): CvsBuilder
    {
        $this->deliveryPostCd = $deliveryPostCd;
        return $this;
    }
    public function setDeliveryCountry($deliveryCountry): CvsBuilder
    {
        $this->deliveryCountry = $deliveryCountry;
        return $this;
    }
    public function setReqDt($reqDt): CvsBuilder
    {
        $this->reqDt = $reqDt;
        return $this;
    }
    public function setReqTm($reqTm): CvsBuilder
    {
        $this->reqTm = $reqTm;
        return $this;
    }
    public function setReqDomain($reqDomain): CvsBuilder
    {
        $this->reqDomain = $reqDomain;
        return $this;
    }
    public function setReqServerIP($reqServerIP): CvsBuilder
    {
        $this->reqServerIP = $reqServerIP;
        return $this;
    }
    public function setReqClientVer($reqClientVer): CvsBuilder
    {
        $this->reqClientVer = $reqClientVer;
        return $this;
    }
    public function setUserSessionID($userSessionID): CvsBuilder
    {
        $this->userSessionID = $userSessionID;
        return $this;
    }
    public function setMitraCd($mitraCd): CvsBuilder 
    {
        $this -> mitraCd = $mitraCd;
        return $this;
    }
    public function setPayValidDt($payValidDt): CvsBuilder 
    {
        $this -> payValidDt = $payValidDt;
        return $this;
    }
    public function setPayValidTm($payValidTm): CvsBuilder 
    {
        $this -> payValidTm = $payValidTm;
        return $this;
    }

    public function build(): Cvs
    {
        return new Cvs($this);
    }
}
