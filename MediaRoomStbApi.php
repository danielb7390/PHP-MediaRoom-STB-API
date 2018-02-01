<?php

//This library requires sockets.
if (!extension_loaded('sockets')) {
    die('The sockets extension is not loaded.');
}

/**
 * ----------------------------------------
 * @title Media Room STB Remote API
 * @desc API to control Media Room STBs
 * @author Daniel Sousa
 * ----------------------------------------
 * */
class MediaRoomStbApi {
	
    /* Constants of the button codes */
    const BTN_BACK = 8;
    const BTN_OK = 13;
    const BTN_EXIT = 27;
    const BTN_PROG_UP = 33;
    const BTN_PROG_DOWN = 34;
    const BTN_MENU = 36;
    const BTN_LEFT = 37;
    const BTN_UP = 38;
    const BTN_RIGHT = 39;
    const BTN_DOWN = 40;
    const BTN_DELETE = 46;
    const BTN_NUMBER_0 = 48;
    const BTN_NUMBER_1 = 49;
    const BTN_NUMBER_2 = 50;
    const BTN_NUMBER_3 = 51;
    const BTN_NUMBER_4 = 52;
    const BTN_NUMBER_5 = 53;
    const BTN_NUMBER_6 = 54;
    const BTN_NUMBER_7 = 55;
    const BTN_NUMBER_8 = 56;
    const BTN_NUMBER_9 = 57;
    const BTN_SEARCH = 106;
    const BTN_GUIDE = 112;
    const BTN_FAVORITES = 113;
    const BTN_VOD = 114;
    const BTN_DVR = 115;
    const BTN_TELETEXT = 116;
    const BTN_PREV = 117;
    const BTN_RWD = 118;
    const BTN_FWD = 121;
    const BTN_NEXT = 122;
    const BTN_RED = 140;
    const BTN_GREEN = 141;
    const BTN_YELLOW = 142;
    const BTN_BLUE = 143;
    const BTN_SWITCH = 156;
    const BTN_OPTIONS = 157;
    const BTN_INFO = 159;
    const BTN_MUTE = 173;
    const BTN_VOL_DOWN = 174;
    const BTN_VOL_UP = 175;
    const BTN_STOP = 178;
    const BTN_PLAYPAUSE = 179;
    const BTN_REC = 225;
    const BTN_POWER = 233;
    /* ---------------------- */

    
    /* Private Variables */
    private $socket;
    private $ipAddress;
    private $port;
    private $connected;

    
    /**
     * The constructor, requires the IP Address and optionally the port.
     * @param string $ipAddress The IP Address of the STB0
     * @param string $port Optionally the Port. Default is 8082.
     */
    public function __construct($ipAddress, $port = 8082) {
        $this->ipAddress = $ipAddress;
        $this->port = $port;
        $this->connected = FALSE;
    }

    /**
     * The Destructor
     */
    function __destruct() {
        $this->stbDisconnect();
    }

    /**
     * Tries to connect to the STB.
     * @return boolean Successfully connected or Not
     */
    function stbConnect() {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($this->socket === FALSE) {
            $this->connected = FALSE;
            return FALSE;
        }

        $result = socket_connect($this->socket, $this->ipAddress, $this->port);
        if ($result === FALSE) {
            $this->connected = FALSE;
            return FALSE;
        }

        $hello = socket_read($this->socket, 2048, PHP_NORMAL_READ);
        if (strpos($hello, 'hello') === FALSE) {
            return FALSE;
        }

        $this->connected = TRUE;
        return TRUE;
    }

    /**
     * Sends a key to the connected STB.
     * @param string $key The key to send
     * @return boolean Success or not
     */
    function sendStbCommand($key) {
        if (!$this->connected){
            return FALSE;
        }

        //Send the key=<keynumber>\0\n command.
        socket_write($this->socket, "key=$key\0\n");

        //Receive the reply. It should be a ok
        $reply = socket_read($this->socket, 2048, PHP_NORMAL_READ);
        if (strpos($reply, 'ok') === FALSE) {
            return FALSE;
        }

        return TRUE;
    }

    /**
     * Closes the connection to the STB.
     */
    function stbDisconnect() {
        if ($this->connected) {
            socket_close($this->socket);
            $this->connected = FALSE;
        }
    }

}
