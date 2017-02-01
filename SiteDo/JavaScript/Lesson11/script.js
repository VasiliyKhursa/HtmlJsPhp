
function nTime(obj) {
    var t=new Date();
    var h=t.getHours();
    var m=t.getMinutes();
    var s=t.getSeconds();
    var result=h+":"+m+":"+s;
    obj.res.value=result;
}


function tData(obj) {
    var s;
    var t=new Date();
    var y=t.getFullYear();
    var d=t.getDate();
    var mon=t.getMonth();
    switch (mon)
    {
      case 0: s="января"; break;
      case 1: s="февраля"; break;
      case 2: s="марта"; break;
      case 3: s="апреля"; break;
      case 4: s="мае"; break;
      case 5: s="июня"; break;
      case 6: s="июля"; break;
      case 7: s="августа"; break;
      case 8: s="сентября"; break;
      case 9: s="октября"; break;
      case 10: s="ноября"; break;
      case 11: s="декабря"; break;
    }
    var result=d+" "+s+" "+y;
    obj.res2.value=result;
}



/*
	var t=new Date();
    var y=t.setYear(2010);
    var d=t.setDate(6);
    var mon=t.setMonth(11);

    var t=new Date("Feb,10,1975 17:45:10");

    var t=new Date("Feb,10,1975");

    var t=new Date(75, 1, 10, 17, 45, 10);

    var t=new Date(75, 1, 10);

*/
