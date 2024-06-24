<?php

class service
{
    private $database;
    private $username;
    public function __construct(database $database,?string $username)
    {
        $this->database = $database;
        if(isset($username))
            $this->username = $username;
    }
    public function processRequest($method,$collection,?string $id): void
    {
        if($id) {
            $this->processResourceRequest($method,$collection,$id);
        }
        else
        {
            $this->processCollectionRequest($method,$collection);
        }
    }

    private function processResourceRequest($method,$collection,$id): void
    {
        switch ($collection) {
            case 'forms':
                $this->processRR_Forms($method,$id);
                break;
            case 'feedback':
                break;
            
            default:
                # code...
                break;
        }
    }

    private function processRR_Forms($method,$id): void
    {
        switch ($method)
        {
            case 'GET':
                $data = $this->getSingleForm($id);
                if(empty($data))
                {
                    http_response_code(404);
                    echo json_encode("No such resource.");
                }
                else
                    echo json_encode($data);
                break;
            default:
                http_response_code(405);
                echo json_encode("Method not supported.");
                break;
        }
    }

    private function getSingleForm($id): array
    {
        $sql_stmt = "SELECT form FROM `forms` WHERE id_form =".$id;

        $sql_result = $this->database->execute_query($sql_stmt);
        

        $row = $sql_result->fetch_assoc();

        if(empty($row['form']))
            return array();
        else 
            $data = json_decode($row['form'],true);  
        return $data;
            
    }

    private function processCollectionRequest($method,$collection): void
    {
        switch($collection)
        {
            case "forms":
                $this->processCR_Forms($method);
                break;
            case "feedbacks":
                $this->processCR_Feedbacks($method);
                break;
            case "archive":
                $this->processCR_Archive($method);
                break;
            default:
                break;
        }
    }

    private function processCR_Forms($method): void
    {
        switch ($method) {
            case "GET":
                echo json_encode($this->getAll());
                break;
        }
    }

    private function processCR_Feedbacks($method): void
    {
        switch ($method) {
            case "POST":
                $data = (array) json_decode(file_get_contents("php://input"),true);

                $response = $this->createResource($data);
                if($response)
                {
                    http_response_code(201);
                    echo json_encode($response);
                }
                else{
                    http_response_code(500);
                    echo json_encode($response);
                }
        }

    }

    private function processCR_Archive($method): void
    {
        switch ($method) {
            case "GET":

                echo json_encode($this->getArchive());
                break;
        }
    }

    private function getAll(): array
    {
        $sql_stmt = "SELECT form_name,id_form FROM `forms` where CURRENT_DATE-creation_date < 1";

        $sql_response = $this->database->execute_query($sql_stmt);

        $data = array();

        while($row = $sql_response->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;

    }

    private function createResource(array $data): bool
    {

        $sql_stmt = "INSERT INTO `feedbacks` (`id_form`, `id_feedback`, `feedback`) VALUES ('".$data['id_form']."', NULL,'".json_encode($data['feedback'])."')";

        $sql_response = $this->database->execute_query($sql_stmt);
        if($sql_response)
            return true;
        else
            return false;
    }

    private function getArchive(): array
    {
        $sql_stmt = "SELECT form_name,id_form FROM `forms` join accounts on id_user=id where username='".$this->username."'";

        $sql_response = $this->database->execute_query($sql_stmt);

        $data = array();

        while($row = $sql_response->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
}