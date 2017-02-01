
var win;

function wind(){
  win = window.open('','win1','width=200, height=200, top=200, left=500, toolbar=1, menubar=1, scrollbars=1');
  win.focus();
}

function scree(){
  win.resizeTo(screen.width,screen.height);
  win.moveTo(0,0);
  win.focus();
}

function textwright(tex){
  if(win) {
    if (win.opener){
      win.document.write(tex);
      win.focus();
    }
    else { alert('Win close')}
  }
  else { alert('Win no')}
}

function clos(tex){
    if(win) {
    if (!win.closed){
      win.close();
    }
    else { alert('Win close')}
  }
  else { alert('Win no')}
}
