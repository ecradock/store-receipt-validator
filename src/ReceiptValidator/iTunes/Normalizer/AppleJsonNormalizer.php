<?php
namespace ReceiptValidator\iTunes\Normalizer;

/**
 * Class AppleJsonNormalizer
 * @package ReceiptValidator\iTunes\Normalizer
 */
class AppleJsonNormalizer implements Normalizer
{
    /**
     * Apple produces an odd format for object serialization, so php can handle as JSON
     * this class is provided.
     *
     * @param string $contents
     * @return string
     */
    public function normalize($contents)
    {
        return preg_replace(array( '/;/', '/ = /', "/[\s]+/", '/,\}/'), array(',', ':', '', '}'), $contents);
    }
}