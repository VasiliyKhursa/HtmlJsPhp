function areaOfTriangle(obj)
{
	var a=1*obj.st1.value;
	var b=1*obj.st2.value;
	var c=1*obj.st3.value;
	var p=(a+b+c)/2;
	var s=Math.sqrt(p*(p-a)*(p-b)*(p-c));
	s=s.toFixed(2);
	obj.res.value=s;
}
