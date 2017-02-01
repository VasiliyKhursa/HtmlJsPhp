

function showMessage()
{
	alert ("Вы щелкнули по div-у");
}

function areaRectangle(obj)
{
	var a=obj.t1.value;
	var b=obj.t2.value;
	var s=a*b;

	obj.res.value=s;
}

function message(m)
{
	alert(m);
}

function showDesc(obj, n)
{
	obj.desc.value=n;
}

function delet(obj){
	 obj.desc.value=' ';
}

