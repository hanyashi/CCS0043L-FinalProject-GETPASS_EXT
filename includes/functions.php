<?php
function generateTransactionCode()
{
    return uniqid("transaction_", false);
}

function getLocalIp()
{
    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    @socket_connect($sock, "8.8.8.8", 53);
    @socket_getsockname($sock, $local_ip);
    socket_close($sock);
    return $local_ip ?? 'localhost';
}
?>