<?php
use PHPUnit\Framework\TestCase;
require 'app/util.php';

class TestTiles extends TestCase{
    public function GrasshoperHorizontalMoveTest(){
      
        $board = [
            '0,0' => [[0, 'Q']],  
            '0,1' => [[1, 'Q']],  
            '-2,0' => [[0, 'G']],  
            '0,2' => [[1, 'G']]
        ];

        $this->assertTrue(Grasshopper('-2,0', '1,0', $board));
    }
    
    public function testDiagonalMove()
    {
        $board = [
            '0,0' => [[0, 'Q']],  
            '0,1' => [[1, 'Q']],  
            '-1,0' => [[0, 'S']],  
            '0,2' => [[1, 'S']],
            '-1,-1' => [[0, 'G']],  
            '0,3' => [[1, 'S']],
        ];

        $this->assertTrue(Grasshopper('-1,-1', '-1,1', $board));
    }

    public function testMoveSamePosition(){
        $board = [
            '0,0' => [[0, 'Q']],  
            '0,1' => [[1, 'Q']],  
            '-1,0' => [[0, 'G']],  
            '0,2' => [[1, 'G']],
        ];
        echo'test run';
        $this->assertTrue(Grasshopper('-1,0','1,0',$board));
        $this->assertNull(Grasshopper('-1,0','-1,0',$board));
        $this->assertTrue(Grasshopper('-2,0','1,0',$board));
        $this->assertFalse(Grasshopper('-2,0','1,1',$board));
    }
    
    public function InvalidMoveTest()
    {
        $board = [
            '0,0' => [[0, 'Q']],  
            '0,1' => [[1, 'Q']],  
            '-1,0' => [[0, 'G']], 
            '-2,0' => [[1, 'A']], 
            '-2,0' => [[0, 'G']],
            '0,2' => [[1, 'A']],
        ];
        $this->assertFalse(Grasshopper('-1,0', '0,1', $board));
        $this->assertFalse(Grasshopper('-1,0', '0,8', $board));
        $this->assertFalse(Grasshopper('-2,0', '0,2', $board));
    }
}