<?php

class Quotes extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

    }


    // this function will redirect to book service page
    function index()
    {
        $this->subscribe();
    }

    // this function to load service book page
    function subscribe()
    {
        $this->load->view('site_subscribe');
    }

    /**
     * Create New Notification
     *
     * Creates adjacency list based on item (id or slug) and shows leafs related only to current item
     *
     * @param int $user_id Current user id
     * @param string $title Current title
     *
     * @return string $response
     */
    function send_message(){
        $message = $this->input->post("message");
        $user_id = $this->input->post("user_id");
        $content = array(
            "en" => "$message"
        );

        $fields = array(
            'app_id' => "ab5428db-ba2b-4abe-9422-18e03a6ebc69",
            'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => "$user_id")),
            'contents' => $content
        );

        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
            'Authorization: Basic NGM0Mzk5YjMtNTQzMi00OTkwLTkyY2EtMTI1MzNhODBmZjgz'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
       return $response;
    }

}
/* End of file news.php */
/* Location: ./application/controllers/Services.php */