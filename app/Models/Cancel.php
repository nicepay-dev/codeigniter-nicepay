<?php

namespace App\Models;

class Cancel
{

    // V2

    private $timeStamp;
    private $tXid;
    private $iMid;
    private $payMethod;
    private $cancelType;
    private $amt;
    private $merchantToken;
    private $referenceNo;
    private $cancelMsg;
    private $cancelServerIp;
    private $cancelUserId;
    private $cancelUserIp;
    private $cancelUserInfo;
    private $cancelRetryCnt;
    private $worker;

    function __construct(CancelBuilder $builder)
    {
        // V2

        $this->timeStamp = $builder->getTimeStamp();
        $this->tXid = $builder->getTXid();
        $this->iMid = $builder->getIMid();
        $this->payMethod = $builder->getPayMethod();
        $this->cancelType = $builder->getCancelType();
        $this->amt = $builder->getAmt();
        $this->merchantToken = $builder->getMerchantToken();
        $this->referenceNo = $builder->getReferenceNo();
        $this->cancelMsg = $builder->getCancelMsg();
        $this->cancelServerIp = $builder->getCancelServerIp();
        $this->cancelUserId = $builder->getCancelUserId();
        $this->cancelUserIp = $builder->getCancelUserIp();
        $this->cancelUserInfo = $builder->getCancelUserInfo();
        $this->cancelRetryCnt = $builder->getCancelRetryCnt();
        $this->worker = $builder->getWorker();
    }

    public static function builder(): CancelBuilder
    {
        return new CancelBuilder();
    }

    // V2

    public function toArrayV2(): array
    {
        return [
            'timeStamp' => $this->timeStamp,
            'tXid' => $this->tXid,
            'referenceNo' => $this->referenceNo,
            'merchantToken' => $this->merchantToken,
            'payMethod' => $this->payMethod,
            'cancelType' => $this->cancelType,
            'amt' => $this->amt,
            'iMid' => $this->iMid,
        ];
    }

    // V2
    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    public function getTXid()
    {
        return $this->tXid;
    }

    public function getIMid()
    {
        return $this->iMid;
    }

    public function getPayMethod()
    {
        return $this->payMethod;
    }

    public function getCancelType()
    {
        return $this->cancelType;
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

    public function getCancelMsg()
    {
        return $this->cancelMsg;
    }

    public function getCancelServerIp()
    {
        return $this->cancelServerIp;
    }

    public function getCancelUserId()
    {
        return $this->cancelUserId;
    }

    public function getCancelUserIp()
    {
        return $this->cancelUserIp;
    }

    public function getCancelUserInfo()
    {
        return $this->cancelUserInfo;
    }

    public function getCancelRetryCnt()
    {
        return $this->cancelRetryCnt;
    }

    public function getWorker()
    {
        return $this->worker;
    }

    public function setMerchantToken($merchantToken)
    {
        $this->merchantToken = $merchantToken;
    }
}

class CancelBuilder
{

    // V2

    private $timeStamp;
    private $tXid;
    private $iMid;
    private $payMethod;
    private $cancelType;
    private $amt;
    private $merchantToken;
    private $referenceNo;
    private $cancelMsg;
    private $cancelServerIp;
    private $cancelUserId;
    private $cancelUserIp;
    private $cancelUserInfo;
    private $cancelRetryCnt;
    private $worker;

    // GETTER V2

    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    public function getTXid()
    {
        return $this->tXid;
    }

    public function getIMid()
    {
        return $this->iMid;
    }

    public function getPayMethod()
    {
        return $this->payMethod;
    }

    public function getCancelType()
    {
        return $this->cancelType;
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

    // V2
    public function getCancelMsg()
    {
        return $this->cancelMsg;
    }

    public function getCancelServerIp()
    {
        return $this->cancelServerIp;
    }

    public function getCancelUserId()
    {
        return $this->cancelUserId;
    }

    public function getCancelUserIp()
    {
        return $this->cancelUserIp;
    }

    public function getCancelUserInfo()
    {
        return $this->cancelUserInfo;
    }

    public function getCancelRetryCnt()
    {
        return $this->cancelRetryCnt;
    }

    public function getWorker()
    {
        return $this->worker;
    }

    // SETTER V2

    public function setTimeStamp($timeStamp): CancelBuilder
    {
        $this->timeStamp = $timeStamp;
        return $this;
    }

    public function setTXid($tXid): CancelBuilder
    {
        $this->tXid = $tXid;
        return $this;
    }

    public function setIMid($iMid): CancelBuilder
    {
        $this->iMid = $iMid;
        return $this;
    }

    public function setPayMethod($payMethod): CancelBuilder
    {
        $this->payMethod = $payMethod;
        return $this;
    }

    public function setCancelType($cancelType): CancelBuilder
    {
        $this->cancelType = $cancelType;
        return $this;
    }

    public function setAmt($amt): CancelBuilder
    {
        $this->amt = $amt;
        return $this;
    }

    public function setMerchantToken($timeStamp, $iMid, $tXid, $amount, $merchantKey): CancelBuilder
    {
        $this->merchantToken = $timeStamp . $iMid . $tXid . $amount . $merchantKey;
        return $this;
    }

    public function setReferenceNo($referenceNo): CancelBuilder
    {
        $this->referenceNo = $referenceNo;
        return $this;
    }

    // V2
    public function setCancelMsg($cancelMsg): CancelBuilder
    {
        $this->cancelMsg = $cancelMsg;
        return $this;
    }

    public function setCancelServerIp($cancelServerIp): CancelBuilder
    {
        $this->cancelServerIp = $cancelServerIp;
        return $this;
    }

    public function setCancelUserId($cancelUserId): CancelBuilder
    {
        $this->cancelUserId = $cancelUserId;
        return $this;
    }

    public function setCancelUserIp($cancelUserIp): CancelBuilder
    {
        $this->cancelUserIp = $cancelUserIp;
        return $this;
    }

    public function setCancelUserInfo($cancelUserInfo): CancelBuilder
    {
        $this->cancelUserInfo = $cancelUserInfo;
        return $this;
    }

    public function setCancelRetryCnt($cancelRetryCnt): CancelBuilder
    {
        $this->cancelRetryCnt = $cancelRetryCnt;
        return $this;
    }

    public function setWorker($worker): CancelBuilder
    {
        $this->worker = $worker;
        return $this;
    }

    public function build(): Cancel
    {
        return new Cancel($this);
    }
}
