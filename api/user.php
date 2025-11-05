<?php

if(security_is_logged_in())
{

    $data = array(
        'message' => 'User retrieved successfully.',
        'error' => false, 
        'user' => $_SESSION['user'],
    );

}
else
{

    $data = array(
        'message' => 'User not logged in.',
        'error' => true, 
    );

}