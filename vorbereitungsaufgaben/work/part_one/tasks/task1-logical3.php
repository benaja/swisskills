<?php

/**
 * Message Error
 *
 * @todo fix the logical error in class
 *       only modify the MessageManager class
 */


/**
 * MessageManager class
 */
class MessageManager {

    private static $manager;

    private $messages = array();

    private function __construct() {}

    /**
     * get the current manager
     */
    public static function getMessageManager() {
        if (!self::$manager) {
            self::$manager = new self;
        }

        return self::$manager;
    }

    /**
     * add a new message
     *
     * @param string $from
     * @param string $msg
     */
    public function addMessage($msg) {
        $this->messages[] = $msg;
    }

    /**
     * get the last message
     *
     * @return array
     */
    public function getLastMessage() {
        return $this->messages[count($this->messages)-1];
        // return array_pop($this->messages);
    }

    /**
     * get all messages
     *
     * @return array
     */
    public function getAllMessages() {
        return $this->messages;
    }

    /**
     * count messages
     *
     * @return int
     */
    public function countMessages() {
        return count($this->messages);
    }
}

// add dummy messages
$manager = MessageManager::getMessageManager();
$manager->addMessage('A message of person A');
$manager->addMessage('A message of person B');
$manager->addMessage('A message of person C');
$manager->addMessage('An other message of person B');
$manager->addMessage('An other message of person C');



// get all messages for some other awesome functionality
$allMessages = $manager->getAllMessages();

// get last message for a message dashboard
$lastMessage = $manager->getLastMessage();


if (5 === $manager->countMessages() && $lastMessage === 'An other message of person C') {
    $params['solvedErrors']['the message error'] = true;
}
