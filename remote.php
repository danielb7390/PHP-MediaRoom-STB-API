<?php
	require 'MediaRoomStbApi.php';
	
	//Is this a POST? If yes, send the key using the library.
	if( isset($_POST['key']) ){
		$stb = new MediaRoomStbApi('192.168.1.64',8082);
		$stb->stbConnect();
		$stb->sendStbCommand($_POST['key']);
		$stb->stbDisconnect();
		die;
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Remote Control Sample</title>
	</head>
	<body>
		<img src="remote.png" usemap="#remoteMap">
		<map id="remoteMap" name="remoteMap">
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_POWER?>" alt="Power Button" coords="151,23,172,44" href="#"/>
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_NUMBER_1?>" alt="Number 1" coords="100,51,118,68" href="#"/>
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_NUMBER_2?>" alt="Number 2" coords="127,51,144,68" href="#"/>
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_NUMBER_3?>" alt="Number 3" coords="152,50,171,70" href="#"/>
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_NUMBER_4?>" alt="Number 4" coords="99,74,120,93" href="#"/>
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_NUMBER_5?>" alt="Number 5" coords="126,73,145,94" href="#"/>
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_NUMBER_6?>" alt="Number 6" coords="151,76,172,93" href="#"/>
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_NUMBER_7?>" alt="Number 7" coords="99,98,118,116" href="#"/>
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_NUMBER_8?>" alt="Number 8" coords="125,97,143,116" href="#"/>
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_NUMBER_9?>" alt="Number 9" coords="150,98,171,116" href="#"/>
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_DELETE?>" alt="Delete" coords="99,121,119,139" href="#"/>
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_NUMBER_0?>" alt="Number 0" coords="125,122,145,139" href="#"/>
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_SWITCH?>" alt="Channel Switch" coords="151,119,170,139" href="#"/>
			<!--<area shape="rect" data-id="INTERACTIVE" alt="" coords="96,153,118,171" href="#"/>-->
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_INFO?>" alt="Info" coords="123,149,147,171" href="#"/>
			<!--<area shape="rect" data-id="APPS" alt="" coords="155,151,169,170" href="#"/>-->
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_MENU?>" alt="Menu" coords="124,177,151,189" href="#"/>
			<area shape="poly" data-id="<?=MediaRoomStbApi::BTN_GUIDE?>" alt="TV Guide" coords="97,210,109,181,120,193,108,210" href="#"/>
			<area shape="poly" data-id="<?=MediaRoomStbApi::BTN_VOD?>" alt="VOD" coords="163,216,146,189,160,180,175,209,176,208" href="#"/>
			<area shape="poly" data-id="<?=MediaRoomStbApi::BTN_DVR?>" alt="DVR" coords="158,247,144,231,164,216,172,217" href="#"/>
			<area shape="poly" data-id="<?=MediaRoomStbApi::BTN_BACK?>" alt="Back" coords="111,244,92,209,108,210,119,242" href="#"/>
			<area shape="rect" data-id="<?=MediaRoomStbApi::BTN_EXIT?>" alt="Exit" coords="120,241,152,253" href="#"/>
			<area shape="poly" data-id="<?=MediaRoomStbApi::BTN_UP?>" alt="Up" coords="127,204,124,197,134,193,147,196,143,205,135,203" href="#"/>
			<area shape="poly" data-id="<?=MediaRoomStbApi::BTN_DOWN?>" alt="Down" coords="128,228,123,240,137,240,146,236,142,227,136,229" href="#"/>
			<area shape="poly" data-id="<?=MediaRoomStbApi::BTN_RIGHT?>" alt="Right" coords="156,227,145,223,148,215,147,210,156,206,159,216" href="#"/>
			<area shape="poly" data-id="<?=MediaRoomStbApi::BTN_LEFT?>" alt="Left" coords="124,221,113,223,112,215,115,204,124,208,122,215" href="#"/>
			<area shape="circle" data-id="<?=MediaRoomStbApi::BTN_OK?>" alt="OK" coords="135,217,10" href="#"/>
			<area shape="circle" data-id="<?=MediaRoomStbApi::BTN_VOL_UP?>" alt="Volume Up" coords="106,276,10" href="#"/>
			<area shape="circle" data-id="<?=MediaRoomStbApi::BTN_OPTIONS?>" alt="Options" coords="137,275,10" href="#"/>
			<area shape="circle" data-id="<?=MediaRoomStbApi::BTN_PROG_UP?>" alt="Program Up" coords="164,276,10" href="#"/>
			<area shape="circle" data-id="<?=MediaRoomStbApi::BTN_VOL_DOWN?>" alt="Volume Down" coords="106,299,9" href="#"/>
			<area shape="circle" data-id="<?=MediaRoomStbApi::BTN_MUTE?>" alt="Mute" coords="134,299,10" href="#"/>
			<area shape="circle" data-id="<?=MediaRoomStbApi::BTN_PROG_DOWN?>" alt="Program Down" coords="163,300,10" href="#"/>
			<area shape="circle" data-id="<?=MediaRoomStbApi::BTN_STOP?>" alt="Stop" coords="102,329,6" href="#"/>
			<area shape="circle" data-id="<?=MediaRoomStbApi::BTN_PLAYPAUSE?>" alt="Play Pause" coords="135,328,11" href="#"/>
			<area shape="circle" data-id="<?=MediaRoomStbApi::BTN_REC?>" alt="Record" coords="164,332,7" href="#"/>
			<area shape="circle" data-id="<?=MediaRoomStbApi::BTN_PREV?>" alt="Previous" coords="102,354,9" href="#"/>
			<area shape="circle" data-id="<?=MediaRoomStbApi::BTN_RWD?>" alt="Rewind" coords="124,355,7" href="#"/>
			<area shape="circle" data-id="<?=MediaRoomStbApi::BTN_FWD?>" alt="Fast Forward" coords="143,356,8" href="#"/>
			<area shape="circle" data-id="<?=MediaRoomStbApi::BTN_NEXT?>" alt="Next" coords="165,355,6" href="#"/>
		</map>
		<script>
			window.onclick = function (e) {
				if (e.target.localName == 'area') {
					console.log(e.target.dataset.id);
					sendKey(e.target.dataset.id);
				}
			}
			
			function sendKey(key) {
				var http = new XMLHttpRequest();
				http.open("POST", "", true);
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				http.send("key=" + key);
			}
		</script>
	</body>
</html>
