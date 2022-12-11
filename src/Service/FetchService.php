<?php

namespace Kamran\Phptest\Service;

use Exception;

class FetchService
{
    private ApiClient $apiClient;
    private DBService $dbService;

    public function __construct(ApiClient $apiClient, DBService $dbService)
    {
        $this->apiClient = $apiClient;
        $this->dbService = $dbService;
    }

    public function extractAndStoreData()
    {
        $this->extractAndStoreUsers();
        $this->extractAndStorePosts();
    }

    private function extractAndStoreUsers()
    {
        //Make a guzzle call to endpoint
        $response = $this->apiClient->get('https://gorest.co.in/public/v2/users');

        if ($response->getStatusCode() === 200) {
            $arrayResponse = json_decode($response->getBody()->getContents(), true);
        } else {
            throw new Exception ('No response from guzzle request.');
        }

        //Insert into database
        $this->dbService->addUsers($arrayResponse);
    }

    private function extractAndStorePosts()
    {
        //Make a guzzle call to endpoint
        $response = $this->apiClient->get('https://gorest.co.in/public/v2/posts');
        if ($response->getStatusCode() === 200) {
            $arrayResponse = json_decode($response->getBody()->getContents(), true);
        } else {
            throw new Exception ('No response from guzzle request.');
        }

        //Insert into database
        $this->dbService->addPosts($arrayResponse);
    }
}