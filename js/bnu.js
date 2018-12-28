function setActivePage()
{
	var filename=location.href;
	var startPos=filename.lastIndexOf("/")+1;
	var endPos=filename.indexOf("?");
	if(endPos<0){//没有问号
		endPos=filename.length;
	}
	filename=filename.slice(startPos,endPos);
	
	$('ul li a').each(function(){
		if($(this).attr("href")==filename){
			$(this).addClass("active");
		}
	});
}
