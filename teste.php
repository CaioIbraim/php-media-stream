<?php 

// here you can chech your sessions
 
function flush_buffers(){
    ob_end_flush();
    ob_flush();
    flush();
    ob_start();
}


if(!isset($_GET['ext'])){
	header('HTTP/1.1 400 Bad Request');
	return;
}else{
	if (!isset($_GET['ext']) || $_GET['ext'] == 'mp4') {
	 $path = dirname(__FILE__) . '/video/b.mp4';
	} else {
	 header('HTTP/1.1 400 Bad Request');
	 return;
	}

	$filename = "video/b.mp4";
	if (is_file($filename)) {
	    header('Content-Type: video/x-mp4');
	    header("Content-Disposition: attachment; filename=b.mp4");
	    $fd = fopen($filename, "rb");
	    ob_start();
	    ob_get_contents();
	    while(!feof($fd)) {
	        echo fread($fd, 5 * 5);
	        flush_buffers();
	        }
	    fclose ($fd);
	   
	    exit();
	}
}


 



?>