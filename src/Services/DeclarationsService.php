<?php

namespace PhpTwinfield\Services;


class DeclarationsService extends BaseService
{
  protected function WSDL(): string
  {
    return '/webservices/declarations.asmx?wsdl';
  }

  public function callGetAllSummaries(string $companyCode): \stdClass {

    $response = $this->GetAllSummaries(
      [
        'companyCode' => $companyCode
      ]
    );

    return $response;
  }

  public function callGetVatReturnAsXbrl(int $documentId, bool $isMessageIdRequired): \stdClass {

    $response = $this->GetVatReturnAsXbrl(
      [
        'documentId' => $documentId,
        'isMessageIdRequired' => $isMessageIdRequired
      ]
    );

    return $response;
  }

  public function callGetVatReturnAsXml(int $documentId): \stdClass {

    $response = $this->GetVatReturnAsXml(
      [
        'documentId' => $documentId
      ]
    );

    return $response;
  }

  public function callGetIctReturnAsXbrl(int $documentId, bool $isMessageIdRequired): \stdClass {

    $response = $this->GetIctReturnAsXml(
      [
        'documentId' => $documentId,
        'isMessageIdRequired' => $isMessageIdRequired
      ]
    );

    return $response;
  }  

  public function callGetIctReturnAsXml(int $documentId): \stdClass {

    $response = $this->GetIctReturnAsXml(
      [
        'documentId' => $documentId
      ]
    );

    return $response;
  }

  public function callGetTaxGroupVatReturnAsXml(int $documentId): \stdClass {

    $response = $this->GetTaxGroupVatReturnAsXml(
      [
        'documentId' => $documentId
      ]
    );

    return $response;
  }

  public function callGetTaxGroupVatReturnAsXbrl(int $documentId, bool $isMessageIdRequired): \stdClass {

    $response = $this->GetTaxGroupVatReturnAsXbrl(
      [
        'documentId' => $documentId,
        'isMessageIdRequired' => $isMessageIdRequired
      ]
    );

    return $response;
  }


  public function callGetVatReturnPaymentReference(int $documentId): \stdClass {
    
    $response = $this->GetVatReturnPaymentReference(
      [
        'documentId' => $documentId
      ]
    );
    return $response;
  }

  public function callSetToSent(int $documentId): \stdClass {  
    $response = $this->SetToSent(
      [
        'documentId' => $documentId
      ]
    );
    return $response;
  }

  public function callSetToApproved(int $documentId): \stdClass {  
    $response = $this->SetToSent(
      [
        'documentId' => $documentId
      ]
    );
    return $response;
  }

  public function callSetToRejected(int $documentId): \stdClass {  
    $response = $this->SetToSent(
      [
        'documentId' => $documentId
      ]
    );
    return $response;
  }

}