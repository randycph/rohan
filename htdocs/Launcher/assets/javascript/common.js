/**
 * @author kim bokhee
 */

$(function(){
	var objEvent = $('.event'),
		objEventBnr = $(objEvent).children('.bnr').children('li'),
		objEventNav = $('<ul class="nav"></ul>'),
		objItemmall = $('.itemmall'),
		objItemmallBnr = $(objItemmall).children('.bnr').children('li'),
		aniItemmallCurr = 1,
		aniItemmallTimer = 2000,
		aniItemmall;

	for (var i=0; i < objEventBnr.length; i++) {
		$(objEventNav).append($('<li>' + (i + 1) + '</li>').click({i:i}, function(e){
			$(objEventBnr).hide();
			$(objEventNav).children().removeClass('on');
			$(objEventBnr).eq(e.data.i).show();
			$(this).addClass('on');
		}));
	};
	$(objEventBnr[0]).show();
	$(objItemmallBnr[0]).show();
	$(objEventNav).children().eq(0).addClass('on');
	$(objEvent).append(objEventNav);
	
	aniItemmall = setInterval(function(){
		if(aniItemmallCurr >= objItemmallBnr.length) aniItemmallCurr = 0;
		$(objItemmallBnr).hide();
		$(objItemmallBnr[aniItemmallCurr]).fadeIn('fast');
		aniItemmallCurr++;
	}, aniItemmallTimer);
});