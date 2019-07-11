<?php

namespace PhpTwinfield\ApiConnectors;

use PhpTwinfield\Enums\Services;
use PhpTwinfield\Services\DeclarationsService;

class DeclarationsApiConnector extends BaseApiConnector
{

  /**
   * @param string $officeCode
   * @return array List of summaries about declarations.
   */
  public function getAllSummaries(string $companyCode): array {
    $response = $this->getDeclarationsService()->callGetAllSummaries($companyCode);

    if(isset($response->vatReturn->DeclarationSummary)) {
      return $response->vatReturn->DeclarationSummary;
    }

    return [];
  }

  public function getVatReturnAsXbrl(int $documentId, bool $isMessageIdRequired = false) {
    $response = $this->getDeclarationsService()->callGetVatReturnAsXbrl($documentId, $isMessageIdRequired);
    dd($response);
    return $response;
  }

  public function getVatReturnAsXml(int $documentId): ?string  {
    $response = $this->getDeclarationsService()->callGetVatReturnAsXml($documentId);
    if(isset($response->vatReturn) && isset($response->vatReturn->any)) {
      return $response->vatReturn->any;
    }
    return $response;
  }

  public function getVatReturnAsArray(int $documentId): array {
    $xmlString = $this->getVatReturnAsXml($documentId);
    if(!is_null($xmlString)) {
      $xml = simplexml_load_string($xmlString, 'SimpleXMLElement', LIBXML_NOCDATA);
      $json = json_encode($xml);
      return json_decode($json, true);
    }
    return [];
  }

  public function getIctReturnAsXbrl(int $documentId, bool $isMessageIdRequired = false) {
    $response = $this->getDeclarationsService()->callGetIctReturnAsXbrl($documentId, $isMessageIdRequired);
    dd($response);
    return $response;
  }

  public function getIctReturnAsXml(int $documentId) {
    $response = $this->getDeclarationsService()->callGetIctReturnAsXml($documentId);
    dd($response);
    return $response;
  }  

  public function getTaxGroupVatReturnAsXbrl(int $documentId, bool $isMessageIdRequired = false) {
    $response = $this->getDeclarationsService()->callGetTaxGroupVatReturnAsXbrl($documentId, $isMessageIdRequired);
    dd($response);
    return $response;
  }

  public function getTaxGroupVatReturnAsXml(int $documentId) {
    $response = $this->getDeclarationsService()->callGetTaxGroupVatReturnAsXml($documentId);
    dd($response);
    return $response;
  }

  public function getTaxGroupVatReturnPaymentReference(int $documentId) {
    $response = $this->getDeclarationsService()->callGetTaxGroupVatReturnPaymentReference($documentId);
    dd($response);
    return $response;
  }

  public function getVatReturnPaymentReference(int $documentId) {
    $response = $this->getDeclarationsService()->callGgetVatReturnPaymentReference($documentId);
    dd($response);
    return $response;
  }

  public function setToSent(int $documentId) {
    $response = $this->getDeclarationsService()->callSetToSent($documentId);
    return $response;
  }

  public function setToApproved(int $documentId) {
    $response = $this->getDeclarationsService()->callSetToApproved($documentId);
    return $response;
  }

  public function setToRejected(int $documentId) {
    $response = $this->getDeclarationsService()->callSetToRejected($documentId);
    return $response;
  }

  /**
   * @throws Exception
   */
  protected function getDeclarationsService(): DeclarationsService
  {
    return $this->connection->getAuthenticatedClient(Services::DECLARATIONS());
  }
}