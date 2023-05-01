<?php

namespace Emretnrvrd\Tckn\Services\TcknVerifier;

use Exception;

class TcknApi
{
    private TcknRequest $request;

    private const URL = "https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx";
    private const HTTPHEADER =  [
        'POST /Service/KPSPublic.asmx HTTP/1.1',
        'Host: tckimlik.nvi.gov.tr',
        'Content-Type: text/xml; charset=utf-8',
        'SOAPAction: "http://tckimlik.nvi.gov.tr/WS/TCKimlikNoDogrula"',
        'Content-Length: {{length}}'
    ];
    private const XML_PATTERN =
    '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <TCKimlikNoDogrula xmlns="http://tckimlik.nvi.gov.tr/WS">
                    <TCKimlikNo>{{tckn}}</TCKimlikNo>
                    <Ad>{{name}}</Ad>
                    <Soyad>{{last_name}}</Soyad>
                    <DogumYili>{{birthyear}}</DogumYili>
                    </TCKimlikNoDogrula>
                </soap:Body>
            </soap:Envelope>
        ';



    public function __construct(TcknRequest $request)
    {
        $this->request = $request;
    }


    /**
     * Sends the HTTP request to the TCKN verification API
     * @throws Exception if an error occurs due to the API
     * @return string the API response
     */
    public function request()
    {
        try {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HEADER, FALSE);
            curl_setopt($curl, CURLOPT_URL, self::URL);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $this->getXmlData());
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHttpHeader());
            $response = curl_exec($curl);
            curl_close($curl);

            return $response;
        } catch (\Exception $e) {
            throw new Exception("An error occurred due to the API.");
        }
    }

    /**
     * Creates the XML request data for the API request
     * @return string the XML request data
     */
    private function getXmlData()
    {
        $data = [
            "{{tckn}}" => $this->request->tckn,
            "{{name}}" => $this->request->name,
            "{{last_name}}" => $this->request->lastname,
            "{{birthyear}}" => $this->request->birthyear,
        ];
        return str_replace(array_keys($data), array_values($data), self::XML_PATTERN);
    }

    /**
     * Creates the HTTP header for the API request
     * @return array the HTTP header
     */
    private function getHttpHeader()
    {
        return str_replace("{{length}}", strlen($this->getXmlData()), self::HTTPHEADER);
    }
}
