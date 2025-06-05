<?php

namespace App\Models;

class NicepayV2Response
{
    private $resultCd;
    private $resultMsg;
    private $tXid;
    private $referenceNo;
    private $payMethod;
    private $amt;
    private $transDt;
    private $transTm;
    private $currency;
    private $goodsNm;
    private $billingNm;
    private $bankCd;
    private $vacctNo;
    private $vacctValidDt;
    private $vacctValidTm;

    // Inquiry
    private $reqDt;
    private $reqTm;

    // Card
    private $description;
    private $cancelReferenceNo;
    private $acquirerData;
    private $authNo;

    // Convenience Store
    private $payNo;
    private $payValidDt;
    private $payValidTm;
    private $requestURL;    
    private $mitraCd;
    private $paymentExpDt;
    private $paymentExpTm;

    // Qris
    private $qrContent;
    private $qrUrl;

    private $iMid;
    private $instmntMon;
    private $instmntType;
    private $status;
    private $cardNo;
    private $preauthToken;
    private $acquBankCd;
    private $issuBankCd;
    private $receiptCode;
    private $cancelAmt;
    private $recurringToken;
    private $ccTransType;
    private $mRefNo;
    private $acquStatus;
    private $cardExpYymm;
    private $acquBankNm;
    private $issuBankNm;
    private $depositDt;
    private $depositTm;
    private $paymentTrxSn;
    private $cancelTrxSn;
    private $userId;
    private $shopId;

    // Constructor
    private function __construct(NicepayV2ResponseBuilder $builder)
    {
        $this->resultCd = $builder->getResultCd();
        $this->resultMsg = $builder->getResultMsg();
        $this->tXid = $builder->getTXid();
        $this->referenceNo = $builder->getReferenceNo();
        $this->payMethod = $builder->getPayMethod();
        $this->amt = $builder->getAmt();
        $this->transDt = $builder->getTransDt();
        $this->transTm = $builder->getTransTm();
        $this->currency = $builder->getCurrency();
        $this->goodsNm = $builder->getGoodsNm();
        $this->billingNm = $builder->getBillingNm();
        $this->bankCd = $builder->getBankCd();
        $this->vacctNo = $builder->getVacctNo();
        $this->vacctValidDt = $builder->getVacctValidDt();
        $this->vacctValidTm = $builder->getVacctValidTm();

        // Card
        $this->description = $builder->getDescription();
        $this->cancelReferenceNo = $builder->getCancelReferenceNo();
        $this->acquirerData = $builder->getAcquirerData();
        $this->authNo = $builder->getAuthNo();

        // Convenience Store
        $this->payNo = $builder->getPayNo();
        $this->payValidDt = $builder->getPayValidDt();
        $this->payValidTm = $builder->getPayValidTm();
        $this->requestURL = $builder->getRequestURL();
        $this->mitraCd = $builder->getMitraCd();
        $this->paymentExpDt = $builder->getPaymentExpDt();
        $this->paymentExpTm = $builder->getPaymentExpTm();
        $this->qrContent = $builder->getQrContent();
        $this->qrUrl = $builder->getQrUrl();

        $this->reqDt = $builder->getReqDt();
        $this->reqTm = $builder->getReqTm();

        $this->iMid = $builder->getIMid();
        $this->instmntMon = $builder->getInstmntMon();
        $this->instmntType = $builder->getInstmntType();
        $this->status = $builder->getStatus();
        $this->cardNo = $builder->getCardNo();
        $this->preauthToken = $builder->getPreauthToken();
        $this->acquBankCd = $builder->getAcquBankCd();
        $this->issuBankCd = $builder->getIssuBankCd();
        $this->receiptCode = $builder->getReceiptCode();
        $this->cancelAmt = $builder->getCancelAmt();
        $this->recurringToken = $builder->getRecurringToken();
        $this->ccTransType = $builder->getCcTransType();
        $this->mRefNo = $builder->getMRefNo();
        $this->acquStatus = $builder->getAcquStatus();
        $this->cardExpYymm = $builder->getCardExpYymm();
        $this->acquBankNm = $builder->getAcquBankNm();
        $this->issuBankNm = $builder->getIssuBankNm();
        $this->depositDt = $builder->getDepositDt();
        $this->depositTm = $builder->getDepositTm();
        $this->paymentTrxSn = $builder->getPaymentTrxSn();
        $this->cancelTrxSn = $builder->getCancelTrxSn();
        $this->userId = $builder->getUserId();
        $this->shopId = $builder->getShopId();
    }

    public static function fromArray(array $data): self
    {
        $builder = (new NicepayV2ResponseBuilder())
        ->setResultCd($data['resultCd'] ?? null)
        ->setResultMsg($data['resultMsg'] ?? null)
        ->setTXid($data['tXid'] ?? null)
        ->setReferenceNo($data['referenceNo'] ?? null)
        ->setPayMethod($data['payMethod'] ?? null)
        ->setAmt($data['amt'] ?? null)
        ->setTransDt($data['transDt'] ?? null)
        ->setTransTm($data['transTm'] ?? null)
        ->setCurrency($data['currency'] ?? null)
        ->setGoodsNm($data['goodsNm'] ?? null)
        ->setBillingNm($data['billingNm'] ?? null)
        ->setBankCd($data['bankCd'] ?? null)
        ->setVacctNo($data['vacctNo'] ?? null)
        ->setVacctValidDt($data['vacctValidDt'] ?? null)
        ->setVacctValidTm($data['vacctValidTm'] ?? null)
        ->setDescription($data['description'] ?? null)
        ->setCancelReferenceNo($data['cancelReferenceNo'] ?? null)
        ->setAcquirerData($data['acquirerData'] ?? [])
        ->setPayno($data['payNo'] ?? null)
        ->setPayValidDt($data['payValidDt'] ?? null)
        ->setPayValidTm($data['payValidTm'] ?? null)
        ->setRequestURL($data['requestURL'] ?? null)
        ->setMitraCd($data['mitraCd'] ?? null)
        ->setPaymentExpDt($data['paymentExpDt'] ?? null)
        ->setPaymentExpTm($data['paymentExpTm'] ?? null)
        ->setQrContent($data['qrContent'] ?? null)
        ->setQrUrl($data['qrUrl'] ?? null)
        ->setReqDt($data['reqDt'] ?? null)
        ->setReqTm($data['reqTm'] ?? null)
        ->setIMid($data['iMid'] ?? null)
        ->setInstmntMon($data['instmntMon'] ?? null)
        ->setInstmntType($data['instmntType'] ?? null)
        ->setStatus($data['status'] ?? null)
        ->setCardNo($data['cardNo'] ?? null)
        ->setPreauthToken($data['preauthToken'] ?? null)
        ->setAcquBankCd($data['acquBankCd'] ?? null)
        ->setIssuBankCd($data['issuBankCd'] ?? null )
        ->setReceiptCode($data['receiptCode'] ?? null)
        ->setCancelAmt($data['cancelAmt'] ?? null)
        ->setRecurringToken($data['recurringToken'] ?? null)
        ->setCcTransType($data['ccTransType'] ?? null)
        ->setMRefNo($data['mRefNo'] ?? null)
        ->setAcquStatus($data['acquStatus'] ?? null)
        ->setCardExpYymm($data['cardExpYymm'] ?? null)
        ->setAcquBankNm($data['acquBankNm'] ?? null)
        ->setIssuBankNm($data['issuBankNm'] ?? null)
        ->setDepositDt($data['depositDt'] ?? null)
        ->setDepositTm($data['depositTm'] ?? null)
        ->setPaymentTrxSn($data['paymentTrxSn'] ?? null)
        ->setCancelTrxSn($data['cancelTrxSn'] ?? null)
        ->setUserId($data['userId'] ?? null)
        ->setShopId($data['shopId'] ?? null)
        ->setAuthNo($data['authNo'] ?? null);

        // Return the constructed NicepayV2Response using the builder
        return new self($builder);
    }

    public function toArray()
    {
        return [
            'resultCd' => $this->resultCd,
            'resultMsg' => $this->resultMsg,
            'tXid' => $this->tXid,
            'referenceNo' => $this->referenceNo,
            'payMethod' => $this->payMethod,
            'amt' => $this->amt,
            'transDt' => $this->transDt,
            'transTm' => $this->transTm,
            'currency' => $this->currency,
            'goodsNm' => $this->goodsNm,
            'billingNm' => $this->billingNm,
            'bankCd' => $this->bankCd,
            'vacctNo' => $this->vacctNo,
            'vacctValidDt' => $this->vacctValidDt,
            'vacctValidTm' => $this->vacctValidTm,
            'reqDt' => $this->reqDt,
            'reqTm' => $this->reqTm,
            'description' => $this->description,
            'cancelReferenceNo' => $this->cancelReferenceNo,
            'acquirerData' => $this->acquirerData,
            'authNo' => $this->authNo,
            'payNo' => $this->payNo,
            'payValidDt' => $this->payValidDt,
            'payValidTm' => $this->payValidTm,
            'requestURL' => $this->requestURL,
            'mitraCd' => $this->mitraCd,
            'paymentExpDt' => $this->paymentExpDt,
            'paymentExpTm' => $this->paymentExpTm,
            'qrContent' => $this->qrContent,
            'qrUrl' => $this->qrUrl,
            'iMid' => $this->iMid,
            'instmntMon' => $this->instmntMon,
            'instmntType' => $this->instmntType,
            'status' => $this->status,
            'cardNo' => $this->cardNo,
            'preauthToken' => $this->preauthToken,
            'acquBankCd' => $this->acquBankCd,
            'issuBankCd' => $this->issuBankCd,
            'receiptCode' => $this->receiptCode,
            'cancelAmt' => $this->cancelAmt,
            'recurringToken' => $this->recurringToken,
            'ccTransType' => $this->ccTransType,
            'mRefNo' => $this->mRefNo,
            'acquStatus' => $this->acquStatus,
            'cardExpYymm' => $this->cardExpYymm,
            'acquBankNm' => $this->acquBankNm,
            'issuBankNm' => $this->issuBankNm,
            'depositDt' => $this->depositDt,
            'depositTm' => $this->depositTm,
            'paymentTrxSn' => $this->paymentTrxSn,
            'cancelTrxSn' => $this->cancelTrxSn,
            'userId' => $this->userId,
            'shopId' => $this->shopId,
        ];
    }

    // Getter & Setter Method

    public function getPayNo()
    {
        return $this->payNo;
    }

    public function getPayValidDt()
    {
        return $this->payValidDt;
    }

    public function getPayValidTm()
    {
        return $this->payValidTm;
    }

    public function getRequestURL()
    {
        return $this->requestURL;
    }

    public function getMitraCd()
    {
        return $this->mitraCd;
    }

    public function getPaymentExpDt()
    {
        return $this->paymentExpDt;
    }
    public function getPaymentExpTm()
    {
        return $this->paymentExpTm;   
    }

    public function getQrContent()
    {
        return $this->qrContent;
    }

    public function getQrUrl()
    {
        return $this->qrUrl;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getCancelReferenceNo()
    {
        return $this->cancelReferenceNo;
    }

    public function getAcquirerData()
    {
        return $this->acquirerData;
    }
    public function getResultCd()
    {
        return $this->resultCd;
    }

    public function getReqDt()
    {
        return $this->reqDt;
    }

    public function getReqTm()
    {
        return $this->reqTm;
    }

    public function getIMid()
    {
        return $this->iMid;
    }

    public function getInstmntMon()
    {
        return $this->instmntMon;
    }

    public function getInstmntType()
    {
        return $this->instmntType;

    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCardNo()
    {
        return $this->cardNo;
    }

    public function getPreauthToken()
    {
        return $this->preauthToken;
    }

    public function getAcquBankCd()
    {
        return $this->acquBankCd;
    }

    public function getIssuBankCd()
    {
        return $this->issuBankCd;
    }

    public function getReceiptCode()
    {
        return $this->receiptCode;
    }

    public function getCancelAmt()
    {
        return $this->cancelAmt;
    }

    public function getRecurringToken()
    {
        return $this->recurringToken;

    }

    public function getCcTransType()
    {
        return $this->ccTransType;
    }

    public function getMRefNo()
    {
        return $this->mRefNo;
    }

    public function getAcquStatus()
    {
        return $this->acquStatus;
    }

    public function getCardExpYymm()
    {
        return $this->cardExpYymm;
    }

    public function getAcquBankNm()
    {
        return $this->acquBankNm;
    }

    public function getIssuBankNm()
    {
        return $this->issuBankNm;
    }

    public function getDepositDt()
    {
        return $this->depositDt;
    }

    public function getDepositTm()
    {
        return $this->depositTm;
    }

    public function getPaymentTrxSn()
    {
        return $this->paymentTrxSn;
    }

    public function getCancelTrxSn()
    {
        return $this->cancelTrxSn;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getShopId()
    {
        return $this->shopId;
    }

    
    public function getResultMsg()
    {
        return $this->resultMsg;
    }

    public function getTXid()
    {
        return $this->tXid;
    }

    public function getReferenceNo()
    {
        return $this->referenceNo;
    }

    public function getPayMethod()
    {
        return $this->payMethod;
    }

    public function getAmt()
    {
        return $this->amt;
    }

    public function getTransDt()
    {
        return $this->transDt;
    }

    public function getAuthNo()
    {    
        return $this->authNo;
    }

    public function getTransTm()
    {
        return $this->transTm;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getGoodsNm()
    {
        return $this->goodsNm;
    }

    public function getBillingNm()
    {
        return $this->billingNm;
    }

    public function getBankCd()
    {
        return $this->bankCd;
    }

    public function getVacctNo()
    {
        return $this->vacctNo;
    }

    public function getVacctValidDt()
    {
        return $this->vacctValidDt;
    }

    public function getVacctValidTm()
    {
        return $this->vacctValidTm;
    }

//     public function setResponseCode($responseCode): NicepayV2ResponseBuilder
//     {
//         $this->responseCode = $responseCode;
//         return $this;
//     }

    public function setPayNo($payNo): void
    {
        $this->payNo = $payNo;
    }

    public function setPayValidDt($payValidDt): void
    {
        $this->payValidDt = $payValidDt;
    }

    public function setPayValidTm($payValidTm): void
    {
        $this->payValidTm = $payValidTm;
    }

    public function setRequestURL($requestURL): void
    {
        $this->requestURL = $requestURL;
    }

    public function setMitraCd($mitraCd): void
    {
        $this->mitraCd = $mitraCd;
    }

    public function setPaymentExpDt($paymentExpDt): void
    {
        $this->paymentExpDt = $paymentExpDt;
    }

    public function setPaymentExpTm($paymentExpTm): void
    {
        $this->paymentExpTm = $paymentExpTm;    
    }

    public function setQrContent($qrContent): void
    {
        $this->qrContent = $qrContent;
    }

    public function setQrUrl($qrUrl): void
    {
        $this->qrUrl = $qrUrl;
    }

    public function setResultCd($resultCd): void
    {
        $this->resultCd = $resultCd;
    }

    public function setResultMsg($resultMsg): void
    {
        $this->resultMsg = $resultMsg;
    }

    public function setTXid($tXid): void
    {
        $this->tXid = $tXid;
    }

    public function setReferenceNo($referenceNo): void
    {
        $this->referenceNo = $referenceNo;
    }

    public function setPayMethod($payMethod): void
    {
        $this->payMethod = $payMethod;
    }

    public function setAmt($amt): void
    {
        $this->amt = $amt;
    }

    public function setAuthNo($authNo)
    {
        $this->authNo = $authNo;
        return $this;
    }

    public function setTransDt($transDt): void
    {
        $this->transDt = $transDt;
    }

    public function setTransTm($transTm): void
    {
        $this->transTm = $transTm;
    }

    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    public function setGoodsNm($goodsNm): void
    {
        $this->goodsNm = $goodsNm;
    }

    public function setBillingNm($billingNm): void
    {
        $this->billingNm = $billingNm;
    }

    public function setBankCd($bankCd): void
    {
        $this->bankCd = $bankCd;
    }

    public function setVacctNo($vacctNo): void
    {
        $this->vacctNo = $vacctNo;
    }

    public function setVacctValidDt($vacctValidDt): void
    {
        $this->vacctValidDt = $vacctValidDt;
    }

    public function setVacctValidTm($vacctValidTm): void
    {
        $this->vacctValidTm = $vacctValidTm;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setIMid($iMid)
    {
        $this->iMid = $iMid;
        return $this;
    }

    // Builder Class
    public static function builder(): NicepayV2ResponseBuilder
    {
        return new NicepayV2ResponseBuilder();
    }
}

// Builder class
class NicepayV2ResponseBuilder
{
    private $resultCd;
    private $resultMsg;
    private $tXid;
    private $referenceNo;
    private $payMethod;
    private $amt;
    private $transDt;
    private $transTm;
    private $currency;
    private $goodsNm;
    private $billingNm;
    private $bankCd;
    private $vacctNo;
    private $vacctValidDt;
    private $vacctValidTm;

    // Card
    private $description;
    private $cancelReferenceNo;
    private $acquirerData;
    private $authNo;

    // Convenience Store
    private $payNo;
    private $payValidDt;
    private $payValidTm;
    private $requestURL;    
    private $mitraCd;
    private $paymentExpDt;
    private $paymentExpTm;

    // Qris
    private $qrContent;
    private $qrUrl;

    private $reqDt;
    private $reqTm;

    private $iMid;
    private $instmntMon;
    private $instmntType;
    private $status;
    private $cardNo;
    private $preauthToken;
    private $acquBankCd;
    private $issuBankCd;
    private $receiptCode;
    private $cancelAmt;
    private $recurringToken;
    private $ccTransType;
    private $mRefNo;
    private $acquStatus;
    private $cardExpYymm;
    private $acquBankNm;
    private $issuBankNm;
    private $depositDt;
    private $depositTm;
    private $paymentTrxSn;
    private $cancelTrxSn;
    private $userId;
    private $shopId;

    // Getter & Setter Method

    public function getIMid()
    {
        return $this->iMid;
    }

    public function getInstmntMon()
    {
        return $this->instmntMon;
    }

    public function getInstmntType()
    {
        return $this->instmntType;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCardNo()
    {
        return $this->cardNo;
    }

    public function getPreauthToken()
    {
        return $this->preauthToken;
    }

    public function getAcquBankCd()
    {
        return $this->acquBankCd;
    }

    public function getIssuBankCd(){
        return $this->issuBankCd;
    }

    public function getReceiptCode()
    {
        return $this->receiptCode;
    }

    public function getCancelAmt()
    {
        return $this->cancelAmt;
    }

    public function getRecurringToken()
    {
        return $this->recurringToken;
    }

    public function getCcTransType()
    {
        return $this->ccTransType;
    }

    public function getMRefNo()
    {
        return $this->mRefNo;
    }

    public function getAcquStatus()
    {
        return $this->acquStatus;
    }

    public function getCardExpYymm()
    {
        return $this->cardExpYymm;
    }

    public function getAcquBankNm()
    {
        return $this->acquBankNm;
    }

    public function getIssuBankNm()
    {
        return $this->issuBankNm;
    }

    public function getDepositDt()
    {
        return $this->depositDt;
    }

    public function getDepositTm()
    {
        return $this->depositTm;
    }

    public function getPaymentTrxSn()
    {
        return $this->paymentTrxSn;
    }

    public function getCancelTrxSn()
    {
        return $this->cancelTrxSn;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getShopId()
    {
        return $this->shopId;
    }

    public function getReqDt()
    {
        return $this->reqDt;
    }

    public function getReqTm()
    {
        return $this->reqTm;
    }

    public function getPayNo()
    {
        return $this->payNo;
    }

    public function getPayValidDt()
    {
        return $this->payValidDt;
    }

    public function getPayValidTm()
    {
        return $this->payValidTm;
    }

    public function getRequestURL()
    {
        return $this->requestURL;
    }

    public function getMitraCd()
    {
        return $this->mitraCd;
    }

    public function getPaymentExpDt()
    {
        return $this->paymentExpDt;
    }

    public function getPaymentExpTm()
    {
        return $this->paymentExpTm;
    }

    public function getQrContent()
    {
        return $this->qrContent;
    }

    public function getQrUrl(){
        return $this->qrUrl;
    }

    public function getCancelReferenceNo()
    {
        return $this->cancelReferenceNo;
    }

    public function getAcquirerData()
    {
        return $this->acquirerData;
    }

    public function getResultCd()
    {
        return $this->resultCd;
    }

    public function getResultMsg()
    {
        return $this->resultMsg;
    }

    public function getTXid()
    {
        return $this->tXid;
    }

    public function getReferenceNo()
    {
        return $this->referenceNo;
    }

    public function getPayMethod()
    {
        return $this->payMethod;
    }

    public function getAmt()
    {
        return $this->amt;
    }

    public function getTransDt()
    {
        return $this->transDt;
    }

    public function getTransTm()
    {
        return $this->transTm;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getGoodsNm()
    {
        return $this->goodsNm;
    }

    public function getBillingNm()
    {
        return $this->billingNm;
    }

    public function getBankCd()
    {
        return $this->bankCd;
    }

    public function getVacctNo()
    {
        return $this->vacctNo;
    }

    public function getVacctValidDt()
    {
        return $this->vacctValidDt;
    }

    public function getVacctValidTm()
    {
        return $this->vacctValidTm;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAuthNo()
    {
        return $this->authNo;
    }


    public function setIMid($iMid)
    {
        $this->iMid = $iMid;
        return $this;
    }

    public function setInstmntMon($instmntMon)
    {
        $this->instmntMon = $instmntMon;
        return $this;
    }

    public function setInstmntType($instmntType)
    {
        $this->instmntType = $instmntType;
        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function setCardNo($cardNo)
    {
        $this->cardNo = $cardNo;
        return $this;
    }

    public function setPreauthToken($preauthToken)
    {
        $this->preauthToken = $preauthToken;
        return $this;
    }

    public function setAcquBankCd($acquBankCd)
    {
        $this->acquBankCd = $acquBankCd;
        return $this;
    }

    public function setIssuBankCd($issuBankCd)
    {
        $this->issuBankCd = $issuBankCd;
        return $this;
    }

    public function setReceiptCode($receiptCode)
    {
        $this->receiptCode = $receiptCode;
        return $this;
    }

    public function setCancelAmt($cancelAmt)
    {
        $this->cancelAmt = $cancelAmt;
        return $this;
    }

    public function setRecurringToken($recurringToken)
    {
        $this->recurringToken = $recurringToken;
        return $this;
    }

    public function setCcTransType($ccTransType)
    {
        $this->ccTransType = $ccTransType;
        return $this;
    }

    public function setMRefNo($mRefNo)
    {
        $this->mRefNo = $mRefNo;
        return $this;
    }

    public function setAcquStatus($acquStatus)
    {
        $this->acquStatus = $acquStatus;
        return $this;
    }

    public function setCardExpYymm($cardExpYymm)
    {
        $this->cardExpYymm = $cardExpYymm;
        return $this;
    }

    public function setAcquBankNm($acquBankNm)
    {
        $this->acquBankNm = $acquBankNm;
        return $this;
    }

    public function setIssuBankNm($issuBankNm)
    {
        $this->issuBankNm = $issuBankNm;
        return $this;
    }

    public function setDepositDt($depositDt)
    {
        $this->depositDt = $depositDt;
        return $this;
    }

    public function setDepositTm($depositTm)
    {
        $this->depositTm = $depositTm;
        return $this;
    }

    public function setPaymentTrxSn($paymentTrxSn)
    {
        $this->paymentTrxSn = $paymentTrxSn;
        return $this;
    }

    public function setCancelTrxSn($cancelTrxSn)
    {
        $this->cancelTrxSn = $cancelTrxSn;
        return $this;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function setShopId($shopId)
    {
        $this->shopId = $shopId;
        return $this;
    }

    public function setReqDt($reqDt)
    {
        $this->reqDt = $reqDt;
        return $this;
    }

    public function setReqTm($reqTm)
    {
        $this->reqTm = $reqTm;
        return $this;
    }

    public function setPayNo($payNo)
    {
        $this->payNo = $payNo;
        return $this;
    }

    public function setPayValidDt($payValidDt)
    {
        $this->payValidDt = $payValidDt;
        return $this;
    }

    public function setPayValidTm($payValidTm)
    {
        $this->payValidTm = $payValidTm;
        return $this;
    }

    public function setRequestURL($requestURL)
    {
        $this->requestURL = $requestURL;
        return $this;
    }

    public function setMitraCd($mitraCd)
    {
        $this->mitraCd = $mitraCd;
        return $this;
    }

    public function setPaymentExpDt($paymentExpDt)
    {
        $this->paymentExpDt = $paymentExpDt;
        return $this;
    }

    public function setPaymentExpTm($paymentExpTm)
    {
        $this->paymentExpTm = $paymentExpTm;
        return $this;
    }

    public function setQrContent($qrContent)
    {
        $this->qrContent = $qrContent;
        return $this;
    }

    public function setQrUrl($qrUrl)
    {
        $this->qrUrl = $qrUrl;
        return $this;
    }

    public function setCancelReferenceNo($cancelReferenceNo)
    {
        $this->cancelReferenceNo = $cancelReferenceNo;
        return $this;
    }

    public function setAcquirerData($acquirerData)
    {
        $this->acquirerData = $acquirerData;
        return $this;
    }

    public function setResultCd($resultCd): NicepayV2ResponseBuilder
    {
        $this->resultCd = $resultCd;
        return $this;
    }

    public function setResultMsg($resultMsg): NicepayV2ResponseBuilder
    {
        $this->resultMsg = $resultMsg;
        return $this;
    }

    public function setTXid($tXid): NicepayV2ResponseBuilder
    {
        $this->tXid = $tXid;
        return $this;
    }

    public function setReferenceNo($referenceNo): NicepayV2ResponseBuilder
    {
        $this->referenceNo = $referenceNo;
        return $this;
    }

    public function setPayMethod($payMethod): NicepayV2ResponseBuilder
    {
        $this->payMethod = $payMethod;
        return $this;
    }

    public function setAmt($amt): NicepayV2ResponseBuilder
    {
        $this->amt = $amt;
        return $this;
    }

    public function setTransDt($transDt): NicepayV2ResponseBuilder
    {
        $this->transDt = $transDt;
        return $this;
    }

    public function setTransTm($transTm): NicepayV2ResponseBuilder
    {
        $this->transTm = $transTm;
        return $this;
    }

    public function setCurrency($currency): NicepayV2ResponseBuilder
    {
        $this->currency = $currency;
        return $this;
    }

    public function setGoodsNm($goodsNm): NicepayV2ResponseBuilder
    {
        $this->goodsNm = $goodsNm;
        return $this;
    }

    public function setBillingNm($billingNm): NicepayV2ResponseBuilder
    {
        $this->billingNm = $billingNm;
        return $this;
    }

    public function setBankCd($bankCd): NicepayV2ResponseBuilder
    {
        $this->bankCd = $bankCd;
        return $this;
    }

    public function setVacctNo($vacctNo): NicepayV2ResponseBuilder
    {
        $this->vacctNo = $vacctNo;
        return $this;
    }

    public function setVacctValidDt($vacctValidDt): NicepayV2ResponseBuilder
    {
        $this->vacctValidDt = $vacctValidDt;
        return $this;
    }

    public function setVacctValidTm($vacctValidTm): NicepayV2ResponseBuilder
    {
        $this->vacctValidTm = $vacctValidTm;
        return $this;
    }

    public function setDescription($description){
        $this->description = $description;
        return $this;
    }

    public function setAuthNo($authNo){
        $this->authNo = $authNo;
        return $this;
    }

    // Build method
    public function build(): NicepayV2Response
    {
        return new NicepayV2Response($this);
    }
}