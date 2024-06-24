<?php

spl_autoload_register(function ($class) {
    require __DIR__ . "/$class.php";
});
class service_ie
{
    public function processRequest($method,$username): void
    {
        switch ($method)
        {
            case 'GET':
                echo json_encode($this->Export($username));
                break;
            case 'POST':
                echo json_encode($this->Import($username));
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

    private function Import($username)
    {
        $file_content_array = (array) json_decode(file_get_contents("php://input"),true);

        foreach($file_content_array['forms'] as $key => $form)
        {
            $result = $this->Import_addForm($username,$form);

            if ($result['status'] == 'YES') {
                continue;
            } else {
                return "Error submitting form: " . $result['message'];
            }
        }

        return "OK";
    }

    private function Import_addForm($username,$formData): array
    {
        $url = "http://localhost/FeE/Form_adder/submit_form.php"; 
        $data = [
            'username' => $username,
            'form' => $formData
        ];

        $options = [
            'http' => [
                'header' => "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => json_encode($data),
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return json_decode($result, true);
    }
}