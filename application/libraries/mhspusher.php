<?php

require_once __DIR__ . '/../../vendor/autoload.php';

class mhspusher {
    private $pusher;

    public function __construct() {
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        
        $this->pusher = new Pusher\Pusher(
            'dab0a4d19551e57e6fb4',
            'b5ab2901beecc714b996',
            '1733836',
            $options
        );
    }

    public function triggerEvent($channel, $event, $data) {
        if ($this->pusher !== null) {
            return $this->pusher->trigger($channel, $event, $data);
        } else {
            return false; // Or handle the case when pusher is not properly instantiated
        }
    }
}
?>
