<?php
error_reporting(E_ERROR);

include_once 'db_class.php';
$obj=new DB_class();
$obj->DB_connect();

$tovar_dom=0;
$klient_dom=0;
$pokup_dom=0;

$obj_query_tag=new DB_oll();
if(isset($_POST['name_select']) or isset($_POST['poisk']) or isset($_POST['tovar']) or isset($_POST['tov_insert']) or isset($_POST['tov_update']) or isset($_POST['tov_delete']) or isset($_POST['sort_top']) or isset($_POST['sort_bottom']) or isset($_POST['klient']) or isset($_POST['klient_insert']) or isset($_POST['klient_update']) or isset($_POST['klient_delete']) or isset($_POST['pokup']) or isset($_POST['name_pokup_select']) or isset($_POST['tov_pokup_select']) or isset($_POST['pokup_insert']) or isset($_POST['pokup_update_delete']) or isset($_POST['pok_update_go']) or isset($_POST['pokup_delete'])) {
switch(key($_POST)) {
case name_select:
   $query="drop table pokupki_tmp";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="create table pokupki_tmp(
   up varchar(13) not null primary key,
   name varchar(50) not null,
   tel varchar(25) not null,
   adr varchar(50) not null,
   tov varchar(50) not null,
   image varchar(25) not null,
   dat date not null
   )";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   if($_POST['name_select']!='') {
      $name_select=mysqli_real_escape_string($obj->link_db, $_POST['name_select']);
      $name_select_query="name='".$name_select."' and ";
   }
   else {
      $name_select_query="";
   }
   $tel_select=mysqli_real_escape_string($obj->link_db, $_POST['tel_select']);
   $adr_select=mysqli_real_escape_string($obj->link_db, $_POST['adr_select']);
   if($_POST['tov_select']!='') {
      $tov_select=mysqli_real_escape_string($obj->link_db, $_POST['tov_select']);
      $tov_select_query="tov='".$tov_select."' and ";
   }
   else {
      $tov_select_query="";
   }
   $dat_select=mysqli_real_escape_string($obj->link_db, $_POST['dat_select']);
   $query="insert into pokupki_tmp
   select concat(user.id_user, '/', pokup.id_pokup) as up, name, tel, adr, tov, image, dat from user
   join pokup on user.id_user=pokup.id_user
   join tovar on pokup.id_tovar=tovar.id_tovar where
   ".$name_select_query."
   tel like '%".$tel_select."%' and
   adr like '%".$adr_select."%' and
   ".$tov_select_query."
   dat like '%".$dat_select."%'";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="select up, name, tel, adr, tov, image, date_format(dat, '%d.%m.%Y') from pokupki_tmp";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   break;
case sort_top:
   $query="select up, name, tel, adr, tov, image, date_format(dat, '%d.%m.%Y') from pokupki_tmp order by dat";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   break;
case sort_bottom:
   $query="select up, name, tel, adr, tov, image, date_format(dat, '%d.%m.%Y') from pokupki_tmp order by dat desc";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   break;
case poisk:
   $query="select tov from tovar order by tov";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'sel_tov_id', '<option>', '</option>', '', '', '<option>Все---</option>', '');
   $query="select name from user order by name";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'sel_name_id', '<option>', '</option>', '', '', '<option>Все---</option>', '');
   $query="drop table pokupki_tmp";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'tbody',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="create table pokupki_tmp(
   up varchar(13) not null primary key,
   name varchar(50) not null,
   tel varchar(25) not null,
   adr varchar(50) not null,
   tov varchar(50) not null,
   image varchar(25) not null,
   dat date not null
   )";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'tbody',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="insert into pokupki_tmp
   select concat(user.id_user, '/', pokup.id_pokup) as up, name, tel, adr, tov, image, dat from user
   join pokup on user.id_user=pokup.id_user
   join tovar on pokup.id_tovar=tovar.id_tovar where
   dat>'2015-01-01'";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'tbody',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="select up, name, tel, adr, tov, image, date_format(dat, '%d.%m.%Y') from pokupki_tmp";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'tbody',  '<td>', '</td>', '<tr>', '</tr>', '', '');
break;
case tovar:
   $dirr='/home/localhost/www/img/tmp/tmp/';
   $masdir=scandir($dirr);
   foreach($masdir as $masdirr) {
      unlink("$dirr/$masdirr");
   }
   $dirr='/home/localhost/www/img/tmp/';
   $masdir=scandir($dirr);
   foreach($masdir as $masdirr) {
      unlink("$dirr/$masdirr");
   }
   $tovar_dom=1;
   $query="select id_tovar, tov, image, image_b from tovar order by tov";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'tbody_tovar',  '<td onmouseover=\'kursor_start(this);\' onmouseout=\'kursor_end(this);\'>', '</td>', "<tr style=\'cursor:pointer;\' onclick=\'tov_update_delete(this);\'>", '</tr>', '', '');
break;
case tov_insert:
   $tovar_dom=1;
   $tov_pole_insert=mysqli_real_escape_string($obj->link_db, $_POST['tov_pole']);
   $tov_img_insert=mysqli_real_escape_string($obj->link_db, $_POST['tov_img']);
   $tov_img_insert_=mysqli_real_escape_string($obj->link_db, $_POST['tov_img_img']);
   $query="insert into tovar(tov) values('".$tov_pole_insert."')";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="select max(id_tovar) as itog from tovar";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '', '', '', '', '', '', '');
   $scet=$obj_query_tag->row_db[0]['itog'];
   $scet_insert=intval($scet);
   if($_POST['tov_img']!='img/nofoto.jpg') {
   $img_name_new='img/m'.$scet_insert.'.jpg';
   $img_name_new_b='img/b'.$scet_insert.'.jpg';
   rename('/home/localhost/www/'.$tov_img_insert_, '/home/localhost/www/'.$img_name_new_b);
   rename('/home/localhost/www/'.$tov_img_insert, '/home/localhost/www/'.$img_name_new);
   $query="update tovar set image='".$img_name_new."', image_b='".$img_name_new_b."' where id_tovar=".$scet_insert;
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="select id_tovar, tov, image, image_b from tovar order by tov";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td onmouseover="kursor_start(this);" onmouseout="kursor_end(this);">', '</td>', '<tr style="cursor:pointer;" onclick="tov_update_delete(this);">', '</tr>', '', '');
   }
   else {
   $query="update tovar set image='img/nofoto.jpg', image_b='img/nofoto_b.jpg' where id_tovar=".$scet_insert;
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="select id_tovar, tov, image, image_b from tovar order by tov";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td onmouseover="kursor_start(this);" onmouseout="kursor_end(this);">', '</td>', '<tr style="cursor:pointer;" onclick="tov_update_delete(this);">', '</tr>', '', '');
   }

break;
case tov_update:
   $tovar_dom=1;
   $tov_pole_update=mysqli_real_escape_string($obj->link_db, $_POST['tov_pole']);
   $tov_img_update=mysqli_real_escape_string($obj->link_db, $_POST['tov_img']);
   $tov_img_update_=mysqli_real_escape_string($obj->link_db, $_POST['tov_img_img']);
   $tov_img_update0=mysqli_real_escape_string($obj->link_db, $_POST['tov_img0']);
   $tov_img_update0_=mysqli_real_escape_string($obj->link_db, $_POST['tov_img_img0']);
   $id_pole_update=(int)$_POST['id_pole'];
   if($_POST['tov_img']!='img/nofoto.jpg') {
   $tovar_dom=11;
   $sll=mt_rand(1,1000);
   $img_name_new='img/m'.$id_pole_update.$sll.'.jpg';
   $img_name_new_b='img/b'.$id_pole_update.$sll.'.jpg';
   rename('/home/localhost/www/'.$tov_img_update, '/home/localhost/www/'.$img_name_new);
   rename('/home/localhost/www/'.$tov_img_update_, '/home/localhost/www/'.$img_name_new_b);
   if($tov_img_update0!='img/nofoto.jpg') {
   unlink('/home/localhost/www/'.$tov_img_update0);
   unlink('/home/localhost/www/'.$tov_img_update0_);
   }
   $query="update tovar set tov='".$tov_pole_update."', image='".$img_name_new."', image_b='".$img_name_new_b."' where id_tovar=".$id_pole_update;
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="select id_tovar, tov, image, image_b from tovar order by tov";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td onmouseover="kursor_start(this);" onmouseout="kursor_end(this);" style="height:75px;">', '</td>', '<tr style="cursor:pointer;" onclick="tov_update_delete(this);">', '</tr>', '', '');

echo '<script>';
echo 'var mas_rtr=document.getElementById("tbody_tovar").getElementsByTagName("tr");
for(var i=0; i<mas_rtr.length; i++) {
   if(mas_rtr[i].childNodes[0].textContent=='.$id_pole_update.') {
      var img_cahe=mas_rtr[i].childNodes[2].getElementsByTagName("img");
      for(var j=0; j<img_cahe.length; j++) {
         img_cahe[j].setAttribute("name", "'.$id_pole_update.$sll.'");

      }
   }
}';
echo '</script>';
}
else {
   $query="update tovar set tov='".$tov_pole_update."', image='img/nofoto.jpg',  image_b='img/nofoto_b.jpg' where id_tovar=".$id_pole_update;
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="select id_tovar, tov, image, image_b from tovar order by tov";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td onmouseover="kursor_start(this);" onmouseout="kursor_end(this);" style="height:75px;">', '</td>', '<tr style="cursor:pointer;" onclick="tov_update_delete(this);">', '</tr>', '', '');
}

break;
case tov_delete:
   $tovar_dom=1;
   $id_pole_delete=(int)$_POST['id_pole'];
   $query="delete from tovar where id_tovar=".$id_pole_delete;
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   unlink('/home/localhost/www/img/m'.$id_pole_delete.'.jpg');
   unlink('/home/localhost/www/img/b'.$id_pole_delete.'.jpg');
   $query="select id_tovar, tov, image, image_b from tovar order by tov";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td onmouseover="kursor_start(this);" onmouseout="kursor_end(this);">', '</td>', '<tr style="cursor:pointer;" onclick="tov_update_delete(this);">', '</tr>', '', '');
break;
case klient:
   $klient_dom=1;
   $query="select id_user, name, tel, adr from user order by name";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'tbody_klient',  '<td>', '</td>', '<tr style=\'cursor:pointer;\' onmouseover=\'kursor_start(this);\' onmouseout=\'kursor_end(this);\' onclick=\'klient_update_delete(this);\'>', '</tr>', '', '');
break;
case klient_insert:
   $klient_dom=1;
   $klient_name_insert=mysqli_real_escape_string($obj->link_db, $_POST['klient_name_pole']);
   $klient_tel_insert=mysqli_real_escape_string($obj->link_db, $_POST['klient_tel_pole']);
   $klient_adr_insert=mysqli_real_escape_string($obj->link_db, $_POST['klient_adr_pole']);
   $query="insert into user(name, tel, adr) values('".$klient_name_insert."','".$klient_tel_insert."','".$klient_adr_insert."')";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="select id_user, name, tel, adr from user order by name";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr style="cursor:pointer;" onmouseover="kursor_start(this);" onmouseout="kursor_end(this);" onclick="klient_update_delete(this);">', '</tr>', '', '');
break;
case klient_update:
   $klient_dom=1;
   $klient_name_insert=mysqli_real_escape_string($obj->link_db, $_POST['klient_name_pole']);
   $klient_tel_insert=mysqli_real_escape_string($obj->link_db, $_POST['klient_tel_pole']);
   $klient_adr_insert=mysqli_real_escape_string($obj->link_db, $_POST['klient_adr_pole']);
   $id_pole_update=(int)$_POST['id_pole'];
   $query="update user set name='".$klient_name_insert."', tel='".$klient_tel_insert."', adr='".$klient_adr_insert."' where id_user=".$id_pole_update;
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="select id_user, name, tel, adr from user order by name";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr style="cursor:pointer;" onmouseover="kursor_start(this);" onmouseout="kursor_end(this);" onclick="klient_update_delete(this);">', '</tr>', '', '');
break;
case klient_delete:
   $klient_dom=1;
   $id_pole_delete=(int)$_POST['id_pole'];
   $query="delete from user where id_user=".$id_pole_delete;
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="select id_user, name, tel, adr from user order by name";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '',  '<td>', '</td>', '<tr style="cursor:pointer;" onmouseover="kursor_start(this);" onmouseout="kursor_end(this);" onclick="klient_update_delete(this);">', '</tr>', '', '');
break;
case pokup:
   $query="select name from user order by name";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'sel_name_id_pokup', '<option>', '</option>', '', '', '<option>Выберите---</option>', '');
   $query="select tov from tovar order by tov";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'sel_tov_id_pokup', '<option>', '</option>', '', '', '<option>Выберите---</option>', '');
   $query="select day from day order by day";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'day_pokup_id', '<option>', '</option>', '', '', '', '');
   $query="select month from month order by month";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'month_pokup_id', '<option>', '</option>', '', '', '', '');
   $query="select yar from yar order by yar";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'yar_pokup_id', '<option>', '</option>', '', '', '', '');
break;
case name_pokup_select:
   $name_pokup_sel=mysqli_real_escape_string($obj->link_db, $_POST['name_pokup_select']);
   $query="select tel from user where name='".$name_pokup_sel."'";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'tel_pole_pokup_id', '', '', '', '', '', '');
   $query="select adr from user where name='".$name_pokup_sel."'";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'adr_pole_pokup_id', '', '', '', '', '', '');
   $query="select id_user from user where name='".$name_pokup_sel."'";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'name_id', '', '', '', '', '', '');
break;
case tov_pokup_select:
   $tov_pokup_sel=mysqli_real_escape_string($obj->link_db, $_POST['tov_pokup_select']);
   $query="select id_tovar from tovar where tov='".$tov_pokup_sel."'";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'tov_id', '', '', '', '', '', '');
   $query="select image from tovar where tov='".$tov_pokup_sel."'";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'pokup_img', '', '', '', '', '', '');
break;
case pokup_insert:
   $name_id_pokup=intval($_POST['name_id']);
   $tov_id_pokup=intval($_POST['tov_id']);
   $dat_pokup=mysqli_real_escape_string($obj->link_db, $_POST['dat_pokup_ins']);
   $query="insert into pokup(id_user, id_tovar, dat) values(".$name_id_pokup.",".$tov_id_pokup.",'".$dat_pokup."')";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '', '', '', '', '', '', '');
   $query="select max(id_pokup) as itog from pokup";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '', '', '', '', '', '', '');
   $pokup_id_pokup=$obj_query_tag->row_db[0]['itog'];
   ?>
   <script>
   var spis=document.getElementById("spisok").getElementsByTagName("li");
   spis[0].setAttribute("style", "color:royalblue; font-weight:bold;");
   spis[3].setAttribute("style", "color:teal; font-weight:normal;");
   var name_id_pokup_js=<?php echo $name_id_pokup; ?>;
   var pokup_id_pokup_js=<?php echo $pokup_id_pokup; ?>;
   jquery_send('#okno', 'post', 'db_poisk.php', ['poisk', 'name_id_pokup', 'pokup_id_pokup'], ['', name_id_pokup_js, pokup_id_pokup_js]);
   </script>
   <?php
break;
case pokup_update_delete:
   $simvol=strpos($_POST['pokup_update_delete'], '/');
   $use=strstr($_POST['pokup_update_delete'], '/', true);
   $pok=substr($_POST['pokup_update_delete'], $simvol+1);
   $use=intval($use);
   $pok=intval($pok);
   $query="select name from user order by name";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'sel_name_id_pokup', '<option>', '</option>', '', '', '', '');
   $query="select tov from tovar order by tov";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'sel_tov_id_pokup', '<option>', '</option>', '', '', '', '');
   $query="select day from day order by day";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'day_pokup_id', '<option>', '</option>', '', '', '', '');
   $query="select month from month order by month";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'month_pokup_id', '<option>', '</option>', '', '', '', '');
   $query="select yar from yar order by yar";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'yar_pokup_id', '<option>', '</option>', '', '', '', '');
   $query="select user.id_user as id_use, name, tel, adr, tovar.id_tovar as id_tov, tov, image, pokup.id_pokup as id_pok, substring(dat,9,2) as day_substr, substring(dat,6,2) as month_substr, substring(dat,1,4) as yar_substr from user
   join pokup on user.id_user=pokup.id_user
   join tovar on pokup.id_tovar=tovar.id_tovar where
   user.id_user=".$use." and pokup.id_pokup=".$pok;
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'left', '', '', '', '', '', '');
break;
case pok_update_go:
   $pok_id_update=(int)$_POST['pok_id'];
   $name_id_update=(int)$_POST['name_id_new'];
   $tov_id_update=(int)$_POST['tov_id_new'];
   $dat_update=mysqli_real_escape_string($obj->link_db, $_POST['dat_new']);
   $query="update pokup set id_user=".$name_id_update.", id_tovar=".$tov_id_update.", dat='".$dat_update."' where id_pokup=".$pok_id_update;
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '', '', '', '', '', '', '');
   $query="select max(id_pokup) as itog from pokup";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '', '', '', '', '', '', '');
   $pokup_id_pokup=$obj_query_tag->row_db[0]['itog'];
   ?>
   <script>
   var spis=document.getElementById("spisok").getElementsByTagName("li");
   spis[0].setAttribute("style", "color:royalblue; font-weight:bold;");
   var name_id_pokup_js=<?php echo $name_id_update; ?>;
   var pokup_id_pokup_js=<?php echo $pok_id_update; ?>;
   jquery_send('#okno', 'post', 'db_poisk.php', ['poisk', 'name_id_pokup', 'pokup_id_pokup'], ['', name_id_pokup_js, pokup_id_pokup_js]);
   </script>
   <?php
break;
case pokup_delete:
   $pok_id_delete=(int)$_POST['pok_id'];
   $query="delete from pokup where id_pokup=".$pok_id_delete;
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, '', '', '', '', '', '', '');
   ?>
   <script>
   var spis=document.getElementById("spisok").getElementsByTagName("li");
   spis[0].setAttribute("style", "color:royalblue; font-weight:bold;");
   jquery_send('#okno', 'post', 'db_poisk.php', ['poisk'], []);
   </script>
   <?php
break;
}
$obj->DB_close();
}
else {
   $query="select tov from tovar order by tov";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'sel_tov_id', '<option>', '</option>', '', '', '<option>Все---</option>', '');
   $query="select name from user order by name";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'sel_name_id', '<option>', '</option>', '', '', '<option>Все---</option>', '');
   $query="drop table pokupki_tmp";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'tbody',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="create table pokupki_tmp(
   up varchar(13) not null primary key,
   name varchar(50) not null,
   tel varchar(25) not null,
   adr varchar(50) not null,
   tov varchar(50) not null,
   image varchar(25) not null,
   dat date not null
   )";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'tbody',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="insert into pokupki_tmp
   select concat(user.id_user, '/', pokup.id_pokup) as up, name, tel, adr, tov, image, dat from user
   join pokup on user.id_user=pokup.id_user
   join tovar on pokup.id_tovar=tovar.id_tovar where
   dat>'2015-01-01'";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'tbody',  '<td>', '</td>', '<tr>', '</tr>', '', '');
   $query="select up, name, tel, adr, tov, image, date_format(dat, '%d.%m.%Y') from pokupki_tmp";
   $obj_query_tag->Query_Dom_oll($obj->link_db, $query, 'tbody',  '<td>', '</td>', '<tr>', '</tr>', '', '');
$obj->DB_close();
}

?>

<script>
if(<?php echo $tovar_dom; ?>>0) {
var mas_rtr=document.getElementById("tbody_tovar").getElementsByTagName("tr");
for(var i=0; i<mas_rtr.length; i++) {
   mas_rtr[i].childNodes[0].setAttribute("style", "visibility:hidden;");
   mas_rtr[i].childNodes[3].setAttribute("style", "visibility:hidden;");
}
}

if(<?php echo $klient_dom; ?>>0) {
var mas_rtr=document.getElementById("tbody_klient").getElementsByTagName("tr");
for(var i=0; i<mas_rtr.length; i++) {
   mas_rtr[i].childNodes[0].setAttribute("style", "visibility:hidden;");
}
}
</script>