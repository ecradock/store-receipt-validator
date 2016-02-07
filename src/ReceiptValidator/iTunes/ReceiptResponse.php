<?php
namespace ReceiptValidator\iTunes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class ReceiptResponse
{
    /**
    * @Type("string")
    */
    protected $bid = '';

    /**
    * @Type("string")
    */
    protected $bvrs = '';

    /**
    * @Type("string")
    * @SerializedName("expires_date")
    */
    protected $expiresDate = '';

    /**
    * @Type("string")
    * @SerializedName("expires_date_formatted")
    */
    protected $expiresDateFormatted = '';

    /**
    * @Type("string")
    * @SerializedName("expires_date_formatted_pst")
    */
    protected $expiresDateFormattedPst = '';

    /**
    * @Type("string")
    * @SerializedName("item_id")
    */
    protected $itemId = '';

    /**
    * @Type("string")
    * @SerializedName("original_purchase_date")
    */
    protected $originalPurchaseDate = '';

    /**
    * @Type("string")
    * @SerializedName("original_purchase_date_ms")
    */
    protected $originalPurchaseDateMs = '';

    /**
    * @Type("string")
    * @SerializedName("original_purchase_date_pst")
    */
    protected $originalPurchaseDatePst = '';

    /**
    * @Type("string")
    * @SerializedName("original_transaction_id")
    */
    protected $originalTransactionId = '';

    /**
    * @Type("string")
    * @SerializedName("product_id")
    */
    protected $productId = '';

    /**
    * @Type("string")
    * @SerializedName("purchase_date")
    */
    protected $purchaseDate = '';

    /**
    * @Type("string")
    * @SerializedName("purchase_date_ms")
    */
    protected $purchaseDateMs = '';

    /**
    * @Type("string")
    * @SerializedName("purchase_date_pst")
    */
    protected $purchaseDatePst = '';

    /**
    * @Type("string")
    */
    protected $quantity = '';

    /**
    * @Type("string")
    * @SerializedName("transaction_id")
    */
    protected $transactionId = '';

    /**
    * @Type("string")
    * @SerializedName("unique_identifier")
    */
    protected $uniqueIdentifier = '';

    /**
    * @Type("string")
    * @SerializedName("unique_vendor_identifier")
    */
    protected $uniqueVendorIdentifier = '';

    /**
    * @Type("string")
    * @SerializedName("web_order_line_item_id")
    */
    protected $webOrderLineItemId = '';

    /**
     * @return mixed
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * @param mixed $bid
     */
    public function setBid($bid)
    {
        $this->bid = $bid;
    }

    /**
     * @return mixed
     */
    public function getBvrs()
    {
        return $this->bvrs;
    }

    /**
     * @param mixed $bvrs
     */
    public function setBvrs($bvrs)
    {
        $this->bvrs = $bvrs;
    }

    /**
     * @return mixed
     */
    public function getExpiresDate()
    {
        return $this->expiresDate;
    }

    /**
     * @param mixed $expiresDate
     */
    public function setExpiresDate($expiresDate)
    {
        $this->expiresDate = $expiresDate;
    }

    /**
     * @return mixed
     */
    public function getExpiresDateFormatted()
    {
        return $this->expiresDateFormatted;
    }

    /**
     * @param mixed $expiresDateFormatted
     */
    public function setExpiresDateFormatted($expiresDateFormatted)
    {
        $this->expiresDateFormatted = $expiresDateFormatted;
    }

    /**
     * @return mixed
     */
    public function getExpiresDateFormattedPst()
    {
        return $this->expiresDateFormattedPst;
    }

    /**
     * @param mixed $expiresDateFormattedPst
     */
    public function setExpiresDateFormattedPst($expiresDateFormattedPst)
    {
        $this->expiresDateFormattedPst = $expiresDateFormattedPst;
    }

    /**
     * @return mixed
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param mixed $itemId
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    }

    /**
     * @return mixed
     */
    public function getOriginalPurchaseDate()
    {
        return $this->originalPurchaseDate;
    }

    /**
     * @param mixed $originalPurchaseDate
     */
    public function setOriginalPurchaseDate($originalPurchaseDate)
    {
        $this->originalPurchaseDate = $originalPurchaseDate;
    }

    /**
     * @return mixed
     */
    public function getOriginalPurchaseDateMs()
    {
        return $this->originalPurchaseDateMs;
    }

    /**
     * @param mixed $originalPurchaseDateMs
     */
    public function setOriginalPurchaseDateMs($originalPurchaseDateMs)
    {
        $this->originalPurchaseDateMs = $originalPurchaseDateMs;
    }

    /**
     * @return mixed
     */
    public function getOriginalPurchaseDatePst()
    {
        return $this->originalPurchaseDatePst;
    }

    /**
     * @param mixed $originalPurchaseDatePst
     */
    public function setOriginalPurchaseDatePst($originalPurchaseDatePst)
    {
        $this->originalPurchaseDatePst = $originalPurchaseDatePst;
    }

    /**
     * @return mixed
     */
    public function getOriginalTransactionId()
    {
        return $this->originalTransactionId;
    }

    /**
     * @param mixed $originalTransactionId
     */
    public function setOriginalTransactionId($originalTransactionId)
    {
        $this->originalTransactionId = $originalTransactionId;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    /**
     * @param mixed $purchaseDate
     */
    public function setPurchaseDate($purchaseDate)
    {
        $this->purchaseDate = $purchaseDate;
    }

    /**
     * @return mixed
     */
    public function getPurchaseDateMs()
    {
        return $this->purchaseDateMs;
    }

    /**
     * @param mixed $purchaseDateMs
     */
    public function setPurchaseDateMs($purchaseDateMs)
    {
        $this->purchaseDateMs = $purchaseDateMs;
    }

    /**
     * @return mixed
     */
    public function getPurchaseDatePst()
    {
        return $this->purchaseDatePst;
    }

    /**
     * @param mixed $purchaseDatePst
     */
    public function setPurchaseDatePst($purchaseDatePst)
    {
        $this->purchaseDatePst = $purchaseDatePst;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param mixed $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return mixed
     */
    public function getUniqueIdentifier()
    {
        return $this->uniqueIdentifier;
    }

    /**
     * @param mixed $uniqueIdentifier
     */
    public function setUniqueIdentifier($uniqueIdentifier)
    {
        $this->uniqueIdentifier = $uniqueIdentifier;
    }

    /**
     * @return mixed
     */
    public function getUniqueVendorIdentifier()
    {
        return $this->uniqueVendorIdentifier;
    }

    /**
     * @param mixed $uniqueVendorIdentifier
     */
    public function setUniqueVendorIdentifier($uniqueVendorIdentifier)
    {
        $this->uniqueVendorIdentifier = $uniqueVendorIdentifier;
    }

    /**
     * @return mixed
     */
    public function getWebOrderLineItemId()
    {
        return $this->webOrderLineItemId;
    }

    /**
     * @param mixed $webOrderLineItemId
     */
    public function setWebOrderLineItemId($webOrderLineItemId)
    {
        $this->webOrderLineItemId = $webOrderLineItemId;
    }
}

