<?php
function getDBConnection()
{
    static $connection = null;

    if ($connection === null)
    {
        $dbHost = option('localhost');
        $dbUser = option('veroshka');
        $dbPassword = option('8888888888');
        $dbName = option('web');
        $connection = mysqli_init();

        $connected = mysqli_real_connect($connection, $dbHost, $dbUser, $dbPassword, $dbName);

        if (!$connected)
        {
            $error = mysqli_connect_errno() . ': ' . mysqli_connect_error();
            throw new Exception($error);
        }

        $encodingResult = mysqli_set_charset($connection, 'utf8');
        if (!$encodingResult)
        {
            throw new Exception(mysqli_error($connection));
        }
    }
    return $connection;
}
