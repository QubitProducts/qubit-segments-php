<?php
namespace QubitSegments;

use GuzzleHttp\Client;
use QubitSegments\SegmentMemberships;
use GuzzleHttp\Exception\RequestException;

class Segments {
  private $client;
  private $baseUrl;
  private $propertyId;
  private $requestSettings;

  function __construct ($propertyId) {
    $this->propertyId = $propertyId;
    $this->client = new Client();
    $this->baseUrl = "https://stash.qubitproducts.com/stash/v1.1/kv/get/$propertyId/public/current-memberships-";
    $this->requestSettings = [
      'timeout' => 4
    ];
  }

  public function getSegmentMembershipsForVisitor ($visitorId) {
    $url = $this->getStashUrlForVisitor($visitorId);

    try {
      $response = $this->client->request('GET', $url, $this->requestSettings);

      return $this->getSegmentMembershipsFromResponse($response);
    } catch (RequestException $e) {
      return $this->getNullSegmentMemberships();
    }
  }

  public function getSegmentMembershipsForVisitorAsync ($visitorId) {
    $url = $this->getStashUrlForVisitor($visitorId);
    $request =$this->client->requestAsync('GET', $url, $this->requestSettings);

    return $request->then(
      function ($response) {
        return $this->getSegmentMembershipsFromResponse($response);
      },
      function ($e) {
        return $this->getNullSegmentMemberships();
      }
    );
  }

  private function getStashUrlForVisitor ($visitorId) {
    return "{$this->baseUrl}{$visitorId}";
  }

  private function getSegmentMembershipsFromResponse ($response) {
    try {
      $body = json_decode($response->getBody()->getContents(), true);
      $status = $body["status"]["code"];

      if ($status == 200) {
        $data = json_decode($body["data"], true);
        $segments = $data["segments"];

        return new SegmentMemberships($segments);
      }
    } catch (Exception $e) { }

    return $this->getNullSegmentMemberships();
  }

  private function getNullSegmentMemberships () {
    return new SegmentMemberships(json_decode("{}", true));
  }
}
