<?php

if (!isset($_SESSION)) {
    session_start();
}

function get_state()
{
    return serialize([$_SESSION['hand'], $_SESSION['board'], $_SESSION['player']]);
}

function set_state($state)
{
    list($a, $b, $c) = unserialize($state);
    $_SESSION['hand'] = $a;
    $_SESSION['board'] = $b;
    $_SESSION['player'] = $c;
}
function getPreviousMove($state)
    {
        var_dump($state);
        $state->prepare('SELECT * FROM moves WHERE id = ?');
        return $state->get_result()->fetch_array();
    }

function DeleteMove($state, $lastMoveId){
    $query = 'DELETE FROM moves WHERE id = ' . intval($lastMoveId);
    $state->query($query);
}

return new mysqli('app-db', 'root', '', 'hive');
