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
		<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
		<script type="text/javascript" src="js/jquery.maphilight-1.3.1.min.js"></script>
		<!--https://github.com/kemayo/maphilight-->
	</head>
	<body>
		<img id="remoteImg" src="remote.png" usemap="#remoteImgMap">
		<map name="remoteImgMap">
			<area shape='circle' coords='92,39,12' href='#' alt='Power Button' data-id="<?=MediaRoomStbApi::BTN_POWER?>" />
			<area shape='circle' coords='27,72,12' href='#' alt='Number 1' data-id="<?=MediaRoomStbApi::BTN_NUMBER_1?>"/>
			<area shape='circle' coords='59,72,12' href='#' alt='Number 2' data-id="<?=MediaRoomStbApi::BTN_NUMBER_2?>"/>
			<area shape='circle' coords='91,72,12' href='#' alt='Number 3' data-id="<?=MediaRoomStbApi::BTN_NUMBER_3?>"/>
			<area shape='circle' coords='27,101,12' href='#' alt='Number 4' data-id="<?=MediaRoomStbApi::BTN_NUMBER_4?>"/>
			<area shape='circle' coords='59,101,12' href='#' alt='Number 5' data-id="<?=MediaRoomStbApi::BTN_NUMBER_5?>"/>
			<area shape='circle' coords='91,101,12' href='#' alt='Number 6' data-id="<?=MediaRoomStbApi::BTN_NUMBER_6?>"/>
			<area shape='circle' coords='27,130,12' href='#' alt='Number 7' data-id="<?=MediaRoomStbApi::BTN_NUMBER_7?>"/>
			<area shape='circle' coords='59,130,12' href='#' alt='Number 8' data-id="<?=MediaRoomStbApi::BTN_NUMBER_8?>"/>
			<area shape='circle' coords='91,130,12' href='#' alt='Number 9' data-id="<?=MediaRoomStbApi::BTN_NUMBER_9?>"/>
			<area shape='circle' coords='27,160,12' href='#' alt='Delete' data-id="<?=MediaRoomStbApi::BTN_DELETE?>"/>
			<area shape='circle' coords='59,160,12' href='#' alt='Number 0' data-id="<?=MediaRoomStbApi::BTN_NUMBER_0?>"/>
			<area shape='circle' coords='91,160,12' href='#' alt='Channel Switch' data-id="<?=MediaRoomStbApi::BTN_SWITCH?>"/>
			<area shape="poly" coords="74,207,78,199,76,194,71,189,47,189,43,192,39,199,43,207,49,209,72,209" href="#" alt='Info' data-id="<?=MediaRoomStbApi::BTN_INFO?>">
			<area shape='polygon' coords='46,219,61,218,74,220,84,225,73,240,57,235,43,239,34,225' href='#' alt='Menu' data-id="<?=MediaRoomStbApi::BTN_MENU?>"/>
			<area shape='polygon' coords='31,253,28,267,11,267,11,254,17,242,23,234,31,226,43,242' href='#' alt='Guide' data-id="<?=MediaRoomStbApi::BTN_GUIDE?>"/>
			<area shape='polygon' coords='86,226,96,235,103,247,108,265,90,266,88,257,83,247,75,240' href='#' alt='VOD' data-id="<?=MediaRoomStbApi::BTN_VOD?>"/>
			<area shape='polygon' coords='109,268,106,283,97,296,86,307,75,293,83,285,88,277,90,268' href='#' alt='DVR' data-id="<?=MediaRoomStbApi::BTN_DVR?>"/>
			<area shape='polygon' coords='35,287,42,293,32,309,19,294,13,283,10,269,28,269,29,276' href='#' alt='Back' data-id="<?=MediaRoomStbApi::BTN_BACK?>"/>
			<area shape='polygon' coords='84,308,74,313,60,315,45,313,34,310,44,295,60,298,74,295' href='#' alt='Exit' data-id="<?=MediaRoomStbApi::BTN_EXIT?>"/>
			<area shape='polygon' coords='45,258,45,241,58,237,75,242,75,263,67,254,59,251,49,254' href='#' alt='Up' data-id="<?=MediaRoomStbApi::BTN_UP?>"/>
			<area shape='polygon' coords='55,283,63,282,73,275,74,292,62,296,54,295,45,293,45,275' href='#' alt='Down' data-id="<?=MediaRoomStbApi::BTN_DOWN?>"/>
			<area shape='polygon' coords='33,254,43,243,43,271,43,291,37,285,29,269' href='#' alt='Left' data-id="<?=MediaRoomStbApi::BTN_LEFT?>"/>
			<area shape='polygon' coords='85,253,88,267,84,282,76,291,76,276,76,276,76,268,76,243' href='#' alt='Right' data-id="<?=MediaRoomStbApi::BTN_RIGHT?>"/>
			<area shape='circle' coords='59,267,14' href='#' alt='OK' data-id="<?=MediaRoomStbApi::BTN_OK?>"/>
			<area shape='circle' coords='24,341,12' href='#' alt='Volume Up' data-id="<?=MediaRoomStbApi::BTN_VOL_UP?>"/>
			<area shape='circle' coords='24,371,12' href='#' alt='Volume Down' data-id="<?=MediaRoomStbApi::BTN_VOL_DOWN?>"/>
			<area shape='circle' coords='59,371,12' href='#' alt='Mute' data-id="<?=MediaRoomStbApi::BTN_MUTE?>"/>
			<area shape='circle' coords='59,341,12' href='#' alt='Options' data-id="<?=MediaRoomStbApi::BTN_OPTIONS?>"/>
			<area shape='circle' coords='94,341,12' href='#' alt='Program Up' data-id="<?=MediaRoomStbApi::BTN_PROG_UP?>"/>
			<area shape='circle' coords='94,371,12' href='#' alt='Program Down' data-id="<?=MediaRoomStbApi::BTN_PROG_DOWN?>"/>
			<area shape='circle' coords='22,411,12' href='#' alt='Stop' data-id="<?=MediaRoomStbApi::BTN_STOP?>"/>
			<area shape='circle' coords='59,411,15' href='#' alt='Play Pause' data-id="<?=MediaRoomStbApi::BTN_PLAYPAUSE?>"/>
			<area shape='circle' coords='96,411,12' href='#' alt='Record' data-id="<?=MediaRoomStbApi::BTN_REC?>"/>
			<area shape='circle' coords='21,442,12' href='#' alt='Previous' data-id="<?=MediaRoomStbApi::BTN_PREV?>"/>
			<area shape='circle' coords='46,442,12' href='#' alt='Rewind' data-id="<?=MediaRoomStbApi::BTN_RWD?>"/>
			<area shape='circle' coords='72,442,12' href='#' alt='Fast Forward' data-id="<?=MediaRoomStbApi::BTN_FWD?>"/>
			<area shape='circle' coords='97,442,12' href='#' alt='Next' data-id="<?=MediaRoomStbApi::BTN_NEXT?>"/>
		</map>
		<script type="text/javascript">
			$(function() {
				$('#remoteImg').maphilight();
			});
			
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
