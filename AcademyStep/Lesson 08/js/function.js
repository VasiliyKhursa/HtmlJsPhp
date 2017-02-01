function azazaza ()
{
	for (var i=1; i<=3; i++) {
    	document.getElementById("abc" + i).style.fontSize = i + "0pt";
	}
}

function poimay()
{
	var h=Math.round(Math.random()*1200);
	var w=Math.round(Math.random()*800);


	document.getElementById('blok').style.left = h+"px";
    document.getElementById('blok').style.top = w+"px";
}


function losungs()
{
	los1.innerHTML="<b> Лозунг1 </b>";
	los2.innerText="<b> Лозунг2 </b>";
}

function spanFunction()
{
	span1.innerHTML="<input type='button' name='azaza' value='кнопка'> ";
}

function vivod()
{
	for (var i=1; i<=3;i++){
    	document.write('<span style="font-size:' + i + '0px;"> Абзац</span> <br>');
	}

}

var mas1 = new Array();
mas[0] = "Polo";

var mas2 = new Array("BMW", "Polo");

var mas3 = ["BMW", "Polo"];

function simvol100()
{
    var t = tex.innerHTML;

    var t100=t.substr(0,100);


	var a = t.substr(100, 1);
	var j = 100;

	while(a!=" "){
		t100+=a;
		j++;
		a=t.substr(j,1);
	}
    //document.write(t100 + '<br>');
	document.write(a + '<br>');
}