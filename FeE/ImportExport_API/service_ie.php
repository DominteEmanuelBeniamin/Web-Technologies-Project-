<?php

spl_autoload_register(function ($class) {
    require __DIR__ . "/$class.php";
});
class service_ie
{
    public function processRequest($method,?string $username): void
    {
        switch ($method)
        {
            case 'GET':
                echo json_encode($this->Export($username));
                break;
            case 'POST':
                //IMPORT
                break;
            default:
                http_response_code(405);
                echo json_encode("Method not supported");
                break;
        }
    }

    private function Export($username): array
    {
        $forms = $this->Export_getForms($username);

        $data = [
            'forms' => $forms
        ];

        return $data;
    }

    private function Export_getForms($username): array
    {
        $sql_stmt = "SELECT form from forms join accounts on id_user=id where username='".$username."'";

        $database = new database();

        $sql_response = $database->execute_query($sql_stmt);

        $data = array();

        while($row = $sql_response->fetch_assoc())
        {
            $data[] = json_decode($row['form'],true);
        }

        return $data;
    }
}