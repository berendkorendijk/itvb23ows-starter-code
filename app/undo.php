<?php

if (!isset($_SESSION)) {
    session_start();
}
    if(isset($_SESSION['last_move'])){
        $db = include 'database.php';
        $stmt = $db->prepare('SELECT * FROM moves WHERE id = '.$_SESSION['last_move']);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_array();
        if ($result !== null) {
            DeleteMove($db, $_SESSION['last_move']);
    
            $_SESSION['last_move'] = $result['previous_id'];
        } else {
            $_SESSION['error'] = "No previous move found";
        }
        
        if($result['previous_id'] == null){
            $_SESSION['error'] = "No previous move found, please restart or play";
        }
        else{
        $stmt2 = $db->prepare('SELECT * FROM moves WHERE id = '.$result[5]);
        $stmt2->execute();
        $result2 = $stmt2->get_result()->fetch_array();
        set_state($result2['state']);
        }
    }       
    else{
        $_SESSION['error'] = "You must play first";
    }

header('Location: index.php');
