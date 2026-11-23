
function menu_sub(num, flashWIDTH, flashHEIGHT, flashURL){
	if (bro == "ie"){
		document.writeln ('<div id="MenuLayer1" style="position:relative;left:0;top:0;">')
		document.writeln ('<div id="MenuLayer2" style="position:absolute;z-index:0;left:0;top:0;">')
		document.writeln ('<table width="100%" border="0" cellpadding="0" cellspacing="0">')
		document.writeln ('<tr>')
		document.writeln ('<td valign="top"><img src="'+adServer+'/common/body_center_menu_left.jpg" width="10" height="55"></td>')
		document.writeln ('<td><OBJECT classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="https://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" WIDTH='+flashWIDTH+' HEIGHT='+flashHEIGHT+'>');
		document.writeln ('<PARAM NAME=movie VALUE="'+flashURL+'">');
		document.writeln ('<PARAM NAME=wmode VALUE=transparent>');
		document.writeln ('<PARAM NAME=allowScriptAccess VALUE=always>');
		document.writeln ('<PARAM NAME=loop VALUE=true>');
    document.writeln ('<PARAM NAME=menu VALUE=false>');
		document.writeln ('<PARAM NAME=quality VALUE=high>');
		document.writeln ('<EMBED src="'+flashURL+'" loop=true wmode=transparent allowScriptAccess=always  quality=high swLiveConnect=FALSE WIDTH='+flashWIDTH+' HEIGHT='+flashHEIGHT+' TYPE="application/x-shockwave-flash" PLUGINSPAGE="https://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></EMBED>');
		document.writeln ('</OBJECT></td>');
		document.writeln ('<td valign="top" align="right"><img src="'+adServer+'/common/body_center_menu_right.jpg" width="10" height="55"></td>')
		document.writeln ('</tr>')
		document.writeln ('</table>')
		document.writeln ('</div>');
		document.writeln ('</div>');
	}else if (bro == "ne"){
		document.writeln ('<layer id="MenuLayer1" style="position:relative;left:0;top:0;">')
		document.writeln ('<layer id="MenuLayer2" style="position:absolute;z-index:0;left:0;top:0;">')
		document.writeln ('<table width="100%" border="0" cellpadding="0" cellspacing="0">')
		document.writeln ('<tr>')
		document.writeln ('<td valign="top"><img src="'+adServer+'/common/body_center_menu_left.jpg" width="10" height="55"></td>')
		document.writeln ('<td><OBJECT classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="https://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" WIDTH='+flashWIDTH+' HEIGHT='+flashHEIGHT+'>');
		document.writeln ('<PARAM NAME=movie VALUE="'+flashURL+'">');
		document.writeln ('<PARAM NAME=wmode VALUE=transparent>');
		document.writeln ('<PARAM NAME=allowScriptAccess VALUE=always>');
		document.writeln ('<PARAM NAME=loop VALUE=true>');
    document.writeln ('<PARAM NAME=menu VALUE=false>');
		document.writeln ('<PARAM NAME=quality VALUE=high>');
		document.writeln ('<EMBED src="'+flashURL+'" loop=true wmode=transparent allowScriptAccess=always  quality=high swLiveConnect=FALSE WIDTH='+flashWIDTH+' HEIGHT='+flashHEIGHT+' TYPE="application/x-shockwave-flash" PLUGINSPAGE="https://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></EMBED>');
		document.writeln ('</OBJECT></td>');
		document.writeln ('<td valign="top" align="right"><img src="'+adServer+'/common/body_center_menu_right.jpg" width="10" height="55"></td>')
		document.writeln ('</tr>')
		document.writeln ('</table>')
		document.writeln ('</layer>');
		document.writeln ('</layer>');
	}
}

function top_logo(flashWIDTH, flashHEIGHT, flashURL){
		document.writeln ('<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" WIDTH='+flashWIDTH+' HEIGHT='+flashHEIGHT+'>');
		document.writeln ('<PARAM NAME=movie VALUE="'+flashURL+'">');
		document.writeln ('<PARAM NAME=wmode VALUE=transparent>');
		document.writeln ('<PARAM NAME=loop VALUE=true>');
    document.writeln ('<PARAM NAME=menu VALUE=false>');
		document.writeln ('<PARAM NAME=allowScriptAccess VALUE=always>');
		document.writeln ('<PARAM NAME=quality VALUE=high>');
		document.writeln ('<EMBED src="'+flashURL+'" loop=true wmode=transparent allowScriptAccess=always  quality=high swLiveConnect=FALSE WIDTH='+flashWIDTH+' HEIGHT='+flashHEIGHT+' TYPE="application/x-shockwave-flash" PLUGINSPAGE="https://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></EMBED>');
		document.writeln ('</OBJECT>');
}

function top_logo2(flashWIDTH, flashHEIGHT, flashURL){
		document.writeln ('<OBJECT  classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" WIDTH='+flashWIDTH+' HEIGHT='+flashHEIGHT+'>');
		document.writeln ('<PARAM NAME=movie VALUE="'+flashURL+'">');
		document.writeln ('<PARAM NAME=wmode VALUE=transparent>');
		document.writeln ('<PARAM NAME=loop VALUE=true>');
    document.writeln ('<PARAM NAME=menu VALUE=false>');
		document.writeln ('<PARAM NAME=allowScriptAccess VALUE=always>');
		document.writeln ('<PARAM NAME=quality VALUE=high>');
		document.writeln ('<EMBED src="'+flashURL+'" loop=true wmode=transparent allowScriptAccess=always  quality=high swLiveConnect=FALSE WIDTH='+flashWIDTH+' HEIGHT='+flashHEIGHT+' TYPE="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></EMBED>');
		document.writeln ('</OBJECT>');
}

function menu_bottom(flashWIDTH, flashHEIGHT, flashURL){
		document.writeln ('<div id="MenuLayer3" style="position:relative;left:0;top:0;">')
		document.writeln ('<div id="MenuLayer4" style="position:absolute;z-index:0;left:0;top:0;">')
		document.writeln ('<table width="100%" border="0" cellpadding="0" cellspacing="0">')
		document.writeln ('<tr>')
		document.writeln ('<td><OBJECT classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="https://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" WIDTH='+flashWIDTH+' HEIGHT='+flashHEIGHT+'>');
		document.writeln ('<PARAM NAME=movie VALUE="'+flashURL+'">');
		document.writeln ('<PARAM NAME=wmode VALUE=transparent>');
		document.writeln ('<PARAM NAME=allowScriptAccess VALUE=always>');
    document.writeln ('<PARAM NAME=menu VALUE=false>');
		document.writeln ('<PARAM NAME=loop VALUE=true>');
		document.writeln ('<PARAM NAME=quality VALUE=high>');
		document.writeln ('<EMBED src="'+flashURL+'" loop=true wmode=transparent allowScriptAccess=always  quality=high swLiveConnect=FALSE WIDTH='+flashWIDTH+' HEIGHT='+flashHEIGHT+' TYPE="application/x-shockwave-flash" PLUGINSPAGE="https://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></EMBED>');
		document.writeln ('</OBJECT></td>');
		document.writeln ('</tr>')
		document.writeln ('</table>')
		document.writeln ('</div>');
		document.writeln ('</div>');
}

function FlashPara(flashWIDTH, flashHEIGHT, flashURL,flashPARA ){
		document.writeln ('<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" WIDTH='+flashWIDTH+' HEIGHT='+flashHEIGHT+'>');
		document.writeln ('<PARAM NAME=movie VALUE="'+flashURL+'">');
		document.writeln ('<PARAM NAME=loop VALUE=true>');
		document.writeln ('<PARAM NAME=allowScriptAccess VALUE=always>');
		document.writeln ('<PARAM NAME=quality VALUE=high>');
    document.writeln ('<PARAM NAME=menu VALUE=false>');
		document.writeln ('<PARAM NAME=FlashVars VALUE=' + flashPARA + '>');
		document.writeln ('<EMBED src="'+flashURL+'" loop=true wmode=transparent allowScriptAccess=always  quality=high swLiveConnect=FALSE WIDTH='+flashWIDTH+' HEIGHT='+flashHEIGHT+' TYPE="application/x-shockwave-flash" PLUGINSPAGE="https://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></EMBED>');
		document.writeln ('</OBJECT>');
}