<?php

namespace App\Models;

class Card
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
    private $instmntType;
    private $instmntMon;
    private $recurrOpt;
    private $userLanguage;
    private $userAgent;

    // PAYMENT
    private $tXid;
    private $cardNo;
    private $cardExpYymm;
    private $cardCvv;
    private $cardHolderNm;
    private $recurringToken;
    private $preauthToken;
    private $callBackUrl;

    function __construct(CardBuilder $builder)
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
        $this->instmntType = $builder->getInstmType();
        $this->instmntMon = $builder->getInstmnMon();
        $this->recurrOpt = $builder->getRecurrOpt();
        $this->userLanguage = $builder->getUserLanguage();
        $this->userAgent = $builder->getUserAgent();

        // PAYMENT
        $this->tXid = $builder->getTXid();
        $this->cardNo = $builder->getCardNo();
        $this->cardExpYymm = $builder->getCardExpYymm();
        $this->cardCvv = $builder->getCardCvv();
        $this->cardHolderNm = $builder->getCardHolderNm();
        $this->recurringToken = $builder->getRecurringToken();
        $this->preauthToken = $builder->getPreauthToken();
        $this->callBackUrl = $builder->getCallBackUrl();
    }

    public static function builder(): CardBuilder
    {
        return new CardBuilder();
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
            'userAgent' => $this->userAgent,
            'userLanguage' => $this->userLanguage,
            'instmntType' => $this->instmntType,
            'instmntMon' => $this->instmntMon,
            'recurrOpt' => $this->recurrOpt,
        ];
    }

    public function toArrayPayment(){
        return [
            'timeStamp' => $this->timeStamp,
            'referenceNo' => $this->referenceNo,
            'merchantToken' => $this->merchantToken,
            'tXid' => $this->tXid,
            'cardNo' => $this->cardNo,
            'cardExpYymm' => $this->cardExpYymm,
            'cardCvv' => $this->cardCvv,
            'cardHolderNm' => $this->cardHolderNm,
            'recurringToken' => $this->recurringToken,
            'preauthToken' => $this->preauthToken,
            'callBackUrl' => $this->callBackUrl
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

    public function getInstmType()
    {
        return $this->instmntType;
    }

    public function getInstmnMon()
    {
        return $this->instmntMon;
    }

    public function getRecurrOpt()
    {
        return $this->recurrOpt;
    }

    public function getUserLanguage()
    {
        return $this->userLanguage;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function getTXid()
    {
        return $this->tXid;
    }

    public function getCardNo()
    {
        return $this->cardNo;
    }

    public function getCardExpYymm()
    {
        return $this->cardExpYymm;
    }
    
    public function getCardCvv()
    {
        return $this->cardCvv;
    }
    
    public function getCardHolderNm()
    {
        return $this->cardHolderNm;
    }
    
    public function getRecurringToken()
    {
        return $this->recurringToken;
    }
    
    public function getPreauthToken()
    {
        return $this->preauthToken;
    }

    public function getCallBackUrl()
    {
        return $this->callBackUrl;
    }

    public function setMerchantToken($merchantToken)
    {
        $this->merchantToken = $merchantToken;
    }
}

class CardBuilder
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
    private $instmntType;
    private $instmntMon;
    private $recurrOpt;
    private $userLanguage;
    private $userAgent;

    // PAYMENT

    private $tXid;
    private $cardNo;
    private $cardExpYymm;
    private $cardCvv;
    private $cardHolderNm;
    private $recurringToken;
    private $preauthToken;
    private $callBackUrl;

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

    public function getInstmType()
    {
        return $this->instmntType;
    }

    public function getInstmnMon()
    {
        return $this->instmntMon;
    }

    public function getRecurrOpt()
    {
        return $this->recurrOpt;
    }

    public function getUserLanguage()
    {
        return $this->userLanguage;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function getTXid()
    {
        return $this->tXid;
    }

    public function getCardNo()
    {
        return $this->cardNo;
    }

    public function getCardExpYymm()    
    {
        return $this->cardExpYymm;
    }

    public function getCardCvv()
    {
        return $this->cardCvv;
    }

    public function getCardHolderNm()
    {
        return $this->cardHolderNm;

    }

    public function getRecurringToken()
    {
        return $this->recurringToken;
    }

    public function getPreauthToken()
    {
        return $this->preauthToken;
    }

    public function getCallBackUrl()
    {
        return $this->callBackUrl;
    }

    // SETTER V2

    public function setTimeStamp($timeStamp): CardBuilder
    {
        $this->timeStamp = $timeStamp;
        return $this;
    }

    public function setIMid($iMid): CardBuilder
    {
        $this->iMid = $iMid;
        return $this;
    }

    public function setPayMethod($payMethod): CardBuilder
    {
        $this->payMethod = $payMethod;
        return $this;
    }

    public function setCurrency($currency): CardBuilder
    {
        $this->currency = $currency;
        return $this;
    }
    public function setAmt($amt): CardBuilder
    {
        $this->amt = $amt;
        return $this;
    }

    public function setMerchantToken($timeStamp, $iMid, $tXid, $amount, $merchantKey): CardBuilder
    {
        $this->merchantToken = $timeStamp . $iMid . $tXid . $amount . $merchantKey;
        return $this;
    }

    public function setReferenceNo($referenceNo): CardBuilder
    {
        $this->referenceNo = $referenceNo;
        return $this;
    }

    public function setDescription($description): CardBuilder
    {
        $this->description = $description;
        return $this;
    }
    public function setGoodsNm($goodsNm): CardBuilder
    {
        $this->goodsNm = $goodsNm;
        return $this;
    }
    public function setBillingNm($billingNm): CardBuilder
    {
        $this->billingNm = $billingNm;
        return $this;
    }
    public function setBillingPhone($billingPhone): CardBuilder
    {
        $this->billingPhone = $billingPhone;
        return $this;
    }
    public function setBillingEmail($billingEmail): CardBuilder
    {
        $this->billingEmail = $billingEmail;
        return $this;
    }
    public function setBillingAddr($billingAddr): CardBuilder
    {
        $this->billingAddr = $billingAddr;
        return $this;
    }
    public function setBillingCity($billingCity): CardBuilder
    {
        $this->billingCity = $billingCity;
        return $this;
    }
    public function setBillingState($billingState): CardBuilder
    {
        $this->billingState = $billingState;
        return $this;
    }
    public function setBillingCountry($billingCountry): CardBuilder
    {
        $this->billingCountry = $billingCountry;
        return $this;
    }
    public function setBillingPostCd($billingPostCd): CardBuilder
    {
        $this->billingPostCd = $billingPostCd;
        return $this;
    }
    public function setDbProcessUrl($dbProcessUrl): CardBuilder
    {
        $this->dbProcessUrl = $dbProcessUrl;
        return $this;
    }
    public function setCartData($cartData): CardBuilder
    {
        $this->cartData = $cartData;
        return $this;
    }
    public function setUserIP($userIP): CardBuilder
    {
        $this->userIP = $userIP;
        return $this;
    }
    public function setInstmntType($instmntType): CardBuilder
    {
        $this->instmntType = $instmntType;
        return $this;
    }
    public function setInstmntMon($instmntMon): CardBuilder
    {
        $this->instmntMon = $instmntMon;
        return $this;
    }
    public function setRecurrOpt($recurrOpt): CardBuilder
    {
        $this->recurrOpt = $recurrOpt;
        return $this;
    }
    public function setUserLanguage($userLanguage): CardBuilder
    {
        $this->userLanguage = $userLanguage;
        return $this;
    }
    public function setUserAgent($userAgent): CardBuilder
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    public function setTXid($tXid): CardBuilder
    {
        $this->tXid = $tXid;
        return $this;
    }

    public function setCardNo($cardNo): CardBuilder
    {
        $this->cardNo = $cardNo;
        return $this;   
    }

    public function setCardExpYymm($cardExpYymm): CardBuilder
    {
        $this->cardExpYymm = $cardExpYymm;
        return $this;
    }
    public function setCardCvv($cardCvv): CardBuilder
    {
        $this->cardCvv = $cardCvv;
        return $this;
    }
    public function setCardHolderNm($cardHolderNm): CardBuilder
    {
        $this->cardHolderNm = $cardHolderNm;
        return $this;
    }
    public function setRecurringToken($recurringToken): CardBuilder
    {
        $this->recurringToken = $recurringToken;
        return $this;
    }
    public function setPreauthToken($preauthToken): CardBuilder
    {
        $this->preauthToken = $preauthToken;
        return $this;
    }
    public function setCallBackUrl($callBackUrl): CardBuilder
    {
        $this->callBackUrl = $callBackUrl;
        return $this;
    }

    public function build(): Card
    {
        return new Card($this);
    }
}
