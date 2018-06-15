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
        $bricks[$i] = new Brick($request->request->get('difficulty')-$i, [0, $i]);
        $stacks[$i] = new Stack($i);
        $bricks[$i]->setLevel($request->request->get('difficulty')-$i-1);
    }

    foreach($bricks as $brick){
        $stacks[0]->addBrick($brick);
    }

    $board = new Board($stacks, $bricks);

    $session->set('board', serialize($board));

    $params = generateParams($board, $session);
}else if($request->query->get('fromStackId') != null){
    $board = unserialize($session->get('board'));

    $stacks = $board->getStacks();
    foreach($stacks as $stack){
        if($stack->getPosition() == $request->query->get('fromStackId')){
            $brick = $stack->getTopLevel();
            
            if($request->query->get('direction') == "right"){
                $board->moveToRight($brick, $request->query->get('steps'));
            }else{
                $board->moveToLeft($brick, $request->query->get('steps'));
            }
        }
    }
    $session->set('board', serialize($board));
    $params = generateParams($board, $session);
    if(count($stacks[(int)$session->get('difficulty')-1]->getBricks()) == (int)$session->get('difficulty')){
        $params['game']['successful'] = true;
        header("location: /swisskills/vorbereitungsaufgaben/work/part_one/task2");
        exit();
    }
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
            $briks = $stack->getBricks();
            $params['game']['stacks'][$counter] = array();
            $numbrOfBricks = count($briks);
            $isSelected = true;
            for($i = $session->get('difficulty')-1; $i >= 0; $i--){
                if(isset($briks[$i])){
                    if($isSelected){
                        array_push($params['game']['stacks'][$counter], array('size' => $briks[$i]->getSize(), 'selectable' => true));
                        $isSelected = false;
                    }else{
                        array_push($params['game']['stacks'][$counter], array('size' => $briks[$i]->getSize()));
                    }
                }else{
                    array_push($params['game']['stacks'][$counter], array('size' => 0));
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

    // $counter = 0;
    // foreach($board->getStacks() as $stack){
    //     if($stack->hasBricks()){
    //         $bricks = $stack->getBricks();
    //         $params['game']['stacks'][$counter] = array();
    //         for($i = 0; $i < $session->get('difficulty'); $i++){
    //             $used = false;
    //             foreach($bricks as $brick){
    //                 echo $brick->getPosition()[0]. " " . $brick->getPosition()[1] . " " . $brick->getLevel().  "<br>";
    //                 if($brick->getPosition()[1] == $i){
    //                     if($brick->getLevel() == 1){
    //                         $params['game']['stacks'][$counter][$i] = array('size' => $brick->getSize(), 'selectable' => true);
    //                     }else{
    //                         $params['game']['stacks'][$counter][$i] = array('size' => $brick->getSize());
    //                     }
    //                     $used = true;
    //                 }
    //             }
    //             if(!$used){
    //                 $params['game']['stacks'][$counter][$i] = array('size' => 0);
    //             }
    //         }
    //     }else{
    //         $params['game']['stacks'][$counter] = array();
    //         for($i = 0; $i < $session->get('difficulty'); $i++){
    //             array_push($params['game']['stacks'][$counter], array('size' => 0));
    //         }
    //     }
    //     $counter++;
    // }

    return $params;
}
