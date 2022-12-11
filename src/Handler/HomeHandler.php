<?php

namespace Kamran\Phptest\Handler;

use Kamran\Phptest\Interfaces\HandlerInterface;
use Kamran\Phptest\Service\DBService;
use Kamran\Phptest\Service\FetchService;
use Kamran\Phptest\Service\ValidationService;

class HomeHandler implements HandlerInterface
{
    private FetchService $fetchService;
    private ValidationService $validationService;
    private DBService $dbService;

    public function __construct(FetchService $fetchService, ValidationService $validationService, DBService $dbService)
    {
        $this->fetchService = $fetchService;
        $this->validationService = $validationService;
        $this->dbService = $dbService;
    }

    public function handle()
    {
        $gender = $_GET['gender'] ?? '';
        $status = $_GET['status'] ?? '';
        $fetchFromApi = isset($_GET['fetchFromApi']) && $_GET['fetchFromApi'] === 'yes';
        if ($fetchFromApi) {
            $this->fetchService->extractAndStoreData();
        }

        $isGenderValid = $this->validationService->validateGender($gender);
        $isStatusValid = $this->validationService->validateStatus($status);
        if ($isGenderValid && $isStatusValid) {
            //fetch from DB
            $output = $this->dbService->getPosts($gender, $status);
            $totalWordCount = 0;
            $count = count($output);
            foreach ($output as $item) {
                $totalWordCount += str_word_count($item['body']);
            }
            $average = $totalWordCount / $count;

            return json_encode(['average' => $average]);
        }
        return json_encode(['error' => 'Not valid inputs']);
    }
}