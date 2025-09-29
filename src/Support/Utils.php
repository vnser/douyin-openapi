<?php

declare(strict_types=1);

namespace vring\DouyinOpenapi\Support;

use Psr\Http\Message\ResponseInterface;

class Utils
{
    public static function arrayToJson(array $params): string
    {
        return json_encode($params, 320);
    }

    public static function jsonResponseToArray(ResponseInterface $response): ?array
    {
        return json_decode($response->getBody()->getContents(), true);
    }

    public static function rsaDecryptData($privateKey, $encryptedData): string
    {
          $encrypted = base64_decode($encryptedData);
// 私钥解密
        openssl_private_decrypt($encrypted, $decrypted, $privateKey, OPENSSL_PKCS1_PADDING);
        return $decrypted;
//        return sha1($secret . $timestamp . $nonce . $body);
    }
}
