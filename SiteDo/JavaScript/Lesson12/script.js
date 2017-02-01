function proverka(obj) {
    var k;
    var users = new Array("Artem", "Irina", "Sergey", "Boris", "Olga", "Viktor");
    var n=obj.name.value;
    for (var i=0; i<=users.length-1; i++){
      if (users[i]==n)
      {k=0; break}
    }
    if (k==0){alert("Это имя присутствует в массиве.")}
    else {alert("Такого имени в массиве нет.")}
}
