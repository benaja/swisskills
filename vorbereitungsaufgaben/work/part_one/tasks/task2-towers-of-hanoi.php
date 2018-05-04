<?php

use Assert\Assertion;
use SM2014\TOH\Entity\Board;
use SM2014\TOH\Entity\Brick;
use SM2014\TOH\Entity\Stack;

echo "<br>";

// program the functionality here
$params;

if($request->request->get('name') != null){
    $session->set('name', $request->request->get('name'));
    $session->set('difficulty', $request->request->get('difficulty'));

    $bricks = array();
    $stacks = array();
    for($i = 0; $i < $request->request->get('difficulty'); $i++){
        $bricks[$i] = new Brick($i + 1, [0, $i]);
        $stacks[$i] = new Stack($i);
    }

    foreach($bricks as $brick){
        $stacks[0]->addBrick($brick);
    }

    $board = new Board($stacks, $bricks);

    $session->set('board', serialize($board));

    $params = array(
        'game' => array(
            'flash'  => false,
            'stacks' => array(
                array(
                    array('size' => 1, 'selectable' => true),
                    array('size' => 2),
                    // the selectable param has to be set
                    // for all bricks that can be moved
                    array('size' => 3),
                ),
                array(
                    array('size' => 0),
                    // the selectable param has to be set
                    // for all bricks that can be moved
                    array('size' => 0),
                    array('size' => 0),
                ),
                array(
                    array('size' => 0),
                    array('size' => 0),
                    array('size' => 0),
                ),
            ),
        ),
    );

    $session->set('params', $params);
}


function generateParams(Board $board){
    $params = array(
        'game' => array(
            'flash' => false,
            'stacks' => array()
        )
    );

    $counter = 0;
    foreach($board->getStacks() as $stack){
        if($stack->hasBricks()){
            $bricks = $stack->getBricks();
            for($i = 0; $i < $session->get('difficulty'); $i++){
                foreach($bricks as $brick){
                    if($brick->getPosition()[1] == $i){
                        
                    }
                }
            }
        }else{
            $params['game']['stacks'][$counter] = array(
                array('size' => 0),
                array('size' => 0),
                array('size' => 0),
            );
        }
        $params['game']['stacks'][$counter] = 0;
    }
}
