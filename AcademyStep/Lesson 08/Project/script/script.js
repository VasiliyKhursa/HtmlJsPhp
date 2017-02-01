function mouseOutFunc(){
	document.getElementById('forma_error').style.visibility='visible';

	var textIn = loginInp.value;
//	spanError.innerHTML=textIn;
    passInp.value = "azazaz";
//	loginInp.value = "azazaz";
//	forma_error.value = "";


	var text = new String("а, б, в, г, д, е, ё, ж, з, и, й, к, л, м, н, о, п, р, с, т, у, ф, х, ц, ч, ш, щ, ъ, ы, ь, э, ю, я");
    var array = [];
	array = text.split(", ");

	spanError.innerHTML = array[32];






   //	var regexp = /^[а-я]+$/i;
	var regexp2 = /^[а-я]+$/ig;
	var regexptest = /^[a-zA-Z0-9]+$/;
 	var regexptest2 = /^[a-z\d]+$/i;


 /*

//		if(text2.match(regexp)) {
//		if(regexp.test(text2)) {
		if(text2.search(parrent) != -1) {
			// если есть вхлждение символа, значит ошибка - выведем
			alert("RUS = " + text2.search(parrent));
    	}

*/


/*
       if ( !/^[a-zA-Z0-9]+$/.test(str) ) return false;
    return true;




return /^[a-z\d]+$/i.test(str);
 */



	var regexp = /[а-я]/i; 				// флаг i - неважно большие буквы или маленькие
	var text2 = loginInp.value;			// loginInp - поле с текстом
		if(text2.search(parrent) != -1) {
			// если есть вхождение символа (метод возвращает число 0-...), значит есть русские символы - выведем
			alert("RUS = " + text2.search(parrent));
    	}




}

function mouseInFunc(){
	document.getElementById('forma_error').style.visibility='hidden';
//	loginInp.value = "111111";
}