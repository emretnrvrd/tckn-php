<?php

namespace Emretnrvrd\Tckn\Services\TcknVerifier;

class TcknVerifier {

    private TcknRequest $request;


     /**
     *
     * @param string $name Ad
     * @param string $lastname Soyad
     * @param int $birthyear Doğum Yılı
     * @param int $tckn TCKN
     * @return void
     */
    public function __construct(string $name, string $lastname, int $birthyear, int $tckn)
    {
        $this->request = new TcknRequest($name, $lastname, $birthyear, $tckn);
    }


    /**
     * Verify the TCKN
     *
     * @return bool Verify Result
     */
    public function verify(): bool
    {
        $api = new TcknApi($this->request);
        $response = $api->request();

        return $this->deserialize($response);
    }

    /**
     * Deserialize to SOAP message and result.
     *
     * @param string $response SOAP Response
     * @return bool Deserialized Result
     */
    private function deserialize(string $response): bool
    {
        $cleanedResponse = strip_tags($response);
        return $cleanedResponse === "true";
    }
}
