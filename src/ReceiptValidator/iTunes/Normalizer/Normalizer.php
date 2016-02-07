<?php
namespace ReceiptValidator\iTunes\Normalizer;

interface Normalizer
{
    public function normalize($contents);
}