function bigPict()
{
	var w=document.tigr.width;
	if (w<302) {
		document.tigr.width=w+10;
		//document.tigr.src="tigrenok.jpg";
		document.tigr.src=tigr.src;
		//tigr
		setTimeout("bigPict()", 100);
	}
}

function littlePict()
{
	document.tigr.width = 102;
}

function smallPict()
{
     var w=document.tigr.width;
     if (w>102){
      document.tigr.width=w-10;
      document.tigr.src="tigrenok.jpg"
      setTimeout("smallPict()", 100)
     }
}