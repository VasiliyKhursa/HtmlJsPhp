function numword(obj) {
	var t=obj.textin.value;
	var s=obj.slovo.value;
	var m=s.length;
	var res=0;
	var i=0;
	while (i < t.length-1)
  	{
  		var ch=t.substr(i,m)
		if (ch==s){
			res+=1;
			i=i+m
		}
		else
			i++
	}
  obj.res.value=res
}
