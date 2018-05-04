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
        $bricks[$i]->setLevel($request->request->get('difficulty') - $i);
    }

    foreach($bricks as $brick){
        $stacks[0]->addBrick($brick);
    }

    $board = new Board($stacks, $bricks);

    $session->set('board', serialize($board));

    $params = generateParams($board, $session);
}else{  
    $board = unserialize($session->get('board'));

    $params = generateParams($board, $session);
}


function generateParams(Board $board, $session){
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
            $params['game']['stacks'][$counter] = array();
            for($i = 0; $i < $session->get('difficulty'); $i++){
                $used = false;
                foreach($bricks as $brick){
                    if($brick->getPosition()[1] == $i){
                        if($brick->getLevel() == 1){
                            $params['game']['stacks'][$counter][$i] = array('size' => $brick->getSize(), 'selectable' => true);
                        }else{
                            $params['game']['stacks'][$counter][$i] = array('size' => $brick->getSize());
                        }
                        $used = true;
                    }
                }
                if(!$used){
                    $params['game']['stacks'][$counter][$i] = array('size' => 0);
                }
            }
        }else{
            $params['game']['stacks'][$counter] = array();
            for($i = 0; $i < $session->get('difficulty'); $i++){
                array_push($params['game']['stacks'][$counter], array('size' => 0));
            }
        }
        $counter++;
    }

    return $params;
}
