<?php

/**
 * Class error
 *
 * @todo modify the class content that it will become usable
 */

/**
 * Task1 class
 */
class Task1 implements Serializable
{
    private $data;

    public function addData($data) {
        $this->data[] = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function serialize() {
        return serialize($this->data);
    }

    public function unserialize($serialized){

    }

}

$task1 = new Task1;
$task1->addData('some data');
$task1->addData('some data 2');
$task1->addData('some data 3');
$string = $task1->serialize();

if($string === 'a:3:{i:0;s:9:"some data";i:1;s:11:"some data 2";i:2;s:11:"some data 3";}') {
    $params['solvedErrors']['the class error'] = true;
}

