<?php

//Require "access_token" and "task_id"
if (!empty($_GET['access_token']) && !empty($_GET['task_id'])) {

    //Assign "access_token" and "task_id"
    $access_token = $_GET['access_token'];
    $task_id = $_GET['task_id'];

    //curl section pulled from https://clickup.com/api under "Reference" -> "Tasks" -> "Get Task"
    $ch = curl_init();

    //Added dynamic "$task_id"
    curl_setopt($ch, CURLOPT_URL, "https://api.clickup.com/api/v2/task/$task_id/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    //Added dynamic "$access_token"
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: $access_token",
        "Content-Type: application/json"
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    //Get the custom fields information from the task
    $custom_fields = json_decode($response)->custom_fields;

    //Build a tidier array from JSON purposes
    $fields = array();

    //loop through clickup fields and create tidy array
    foreach ($custom_fields as $field) {
        $fields[$field->name] = $field->value;
    }

    //return tidy array as json for zapier
    print_r(json_encode($fields));
} else {
    //Message if URL parameters are missing
    echo 'Parameters "access_token" and "task_id" are required.';
}
