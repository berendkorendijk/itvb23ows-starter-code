<?php

use PHPUnit\Framework\TestCase;
require_once 'app/util.php';
require_once 'app/undo.php';

class bug_tests extends TestCase
{
    public function testAvailablePosition()
    {
        $player = 1;
        $board = ["0,0"=>[[0,"Q"]],"0,1"=>[[1,"Q"]],"0,-1"=>[[0,"B"]]];
        $to = ["0,0", "0,2", "2,2"];
        $hand = [["Q"=>0,"B"=>1,"S"=>2,"A"=>3,"G"=>3],["Q"=>0,"B"=>2,"S"=>2,"A"=>3,"G"=>3]];

        $this->assertEquals(false, AvailablePosition($board, $hand[$player],$player, $to[2]));
        $this->assertEquals(false, AvailablePosition($board, $hand[$player],$player, $to[0]));
        $this->assertEquals(true, AvailablePosition($board, $hand[$player],$player, $to[1]));
        $this->assertNotEquals(false, AvailablePosition($board, $hand[$player],$player, $to[1]));
    
    }

    public function UndoFirstTry(){
        session_start();
        unset($_SESSION["last_move"]);

        $this->assertSame("You must play first", $_SESSION['error']);
    }

}