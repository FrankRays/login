<?php

function valid_email($email)
{
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email))
    {
      
        return false;
    }
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++)
    {
        if (!ereg("^(([A-Za-z0-9!#$%&#038;'*+/=?^_`{|}~-][A-Za-z0-9!#$%&#038;'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
            $local_array[$i]))
        {
            return false;
        }
    }
    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1]))
    { 
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2)
        {
            return false;
        }
        for ($i = 0; $i < sizeof($domain_array); $i++)
        {
            if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i]))
            {
                return false;
            }
        }
    }
    return true;
}
 
function valid_username($username, $minlength = 1, $maxlength = 100)
{
 
    $username = trim($username);
 
    if (empty($username))
    {
        return false; 
    }
    if (strlen($username) > $maxlength)
    {
        return false; 
    }
    if (strlen($username) < $minlength)
    {
 
        return false; 
    }
 
}
 
function valid_password($pass, $minlength = 7, $maxlength = 100)
{
    $pass = trim($pass);
 
    if (empty($pass))
    {
        return false;
    }
 
    if (strlen($pass) < $minlength)
    {
        return false;
    }
 
    if (strlen($pass) > $maxlength)
    {
        return false;
    }
}


?>