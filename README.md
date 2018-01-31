PHP-MediaRoom-STB-API
==============

A PHP API for Cisco Media Room STBs. This code was tested with a STB from Vodafone Portugal. It should work also with STB from Meo/Altice.


**NEEDS SOCKETS activated on php.ini**

## How to use
It's simple!
```
require 'MediaRoomStbApi.php';

$stb = new MediaRoomStbApi(192.168.1.64,8082);

$stb->stbConnect();
$stb->sendStbCommand(MediaRoomStbApi::BTN_VOLDOWN);
$stb->stbDisconnect();
```

## Example Web Interface
`remote.php` is a very crude and simple web interface using this library.

## Where is the list of commands?
Check the `MediaRoomStbApi.php` file for the commands.
