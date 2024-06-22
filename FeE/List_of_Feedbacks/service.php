<?php

class service
{
    private $database;

    public function __construct(database $database)
    {
        $this->database = $database;
    }

    public function processRequest($method,$id_form): void
    {
        switch ($method)
        {
            case 'GET':
                echo json_encode($this->getFeedbacks($id_form));
                break;
            default:
                http_response_code(405);
                echo json_encode("Method not supported");
                break;
        }
    }

    private function getFeedbacks($id_form): array
    {
        $sql_stmt = "SELECT feedback FROM `feedbacks` WHERE id_form=".$id_form;

        $sql_response = $this->database->execute_query($sql_stmt);

        $data = array();

        while($row = $sql_response->fetch_assoc())
        {
            $data[] = json_decode($row['feedback'],true);
        }

        return $data;
    }
}