<?php
function curl($url,$params = array(),$is_coockie_set = false)
{
if(!$is_coockie_set){
/* STEP 1. let?s create a cookie file */
$ckfile = tempnam ("/tmp", "CURLCOOKIE");
 /* STEP 2. visit the homepage to set the cookie properly */
$ch = curl_init ($url);
curl_setopt ($ch, CURLOPT_COOKIEJAR, $ckfile);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec ($ch);
}
$str = ''; $str_arr= array();
foreach($params as $key => $value)
{
$str_arr[] = urlencode($key)."=".urlencode($value);
}
if(!empty($str_arr))
$str = '?'.implode('&',$str_arr);

/* STEP 3. visit cookiepage.php */

$Url = $url.$str;
$ch = curl_init ($Url);
curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec ($ch);
return $output;
}
function Translate($word,$conversion = 'fr_to_es')
{
$word = urlencode($word);
echo $word;
echo "<br><br><br>";
echo $conversion;
$arr_langs = explode('_to_', $conversion);
$url='http://translate.google.com/translate_a/t?client=t&text='.$word.'&hl="'.$arr_langs[0].'"&sl="'.$arr_langs[1].'"&tl="'.$arr_langs[0].'"&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';
echo $url;
echo "<br><br><br>";
$name_en = curl($url);
$name_en = explode('"',$name_en);
return  $name_en[1];
}
 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<form name="" method="post">
<label>Traduction</label><br />
<select name="langueorgine">
<option value="fr" <?php if (isset($_POST['langueorgine']) && ($_POST['langueorgine']=='fr')){ echo "selected='selected'"; }?>>Francais</option> <!--Vous pouvez rajouter d'autres langues !-->
<option value="en" <?php if (isset($_POST['langueorgine']) && ($_POST['langueorgine']=='en')){ echo "selected='selected'"; }?>>English</option>
<option value="ar" <?php if (isset($_POST['langueorgine']) && ($_POST['langueorgine']=='ar')){ echo "selected='selected'"; }?>>Arabe</option>
<option value="es" <?php if (isset($_POST['langueorgine']) && ($_POST['langueorgine']=='es')){ echo "selected='selected'"; }?>>Español</option>
</select>
 
<select name="languetraduite">
<option value="fr" <?php if (isset($_POST['languetraduite']) && ($_POST['languetraduite']=='fr')){ echo "selected='selected'"; }?>>Francais</option> <!--Vous pouvez rajouter d'autres langues !-->
<option value="en" <?php if (isset($_POST['languetraduite']) && ($_POST['languetraduite']=='en')){ echo "selected='selected'"; }?>>English</option>
<option value="ar" <?php if (isset($_POST['languetraduite']) && ($_POST['languetraduite']=='ar')){ echo "selected='selected'"; }?>>Arabe</option>
<option value="es" <?php if (isset($_POST['languetraduite']) && ($_POST['languetraduite']=='es')){ echo "selected='selected'"; }?>>Español</option>
</select>
			<textarea name="traduire"  rows="8"><?php if (isset($_POST['traduire'])) echo $_POST['traduire'] ; ?></textarea><br />
			<input class="btn btn-primary" name="ok" type="submit"   value="Traduire" />
</form>
 
<?php
		 $chaine="";
	if (isset($_POST['traduire'])){
                   $chaine=$_POST['traduire'];
      	 }
		 $langueorgine="fr";
	if (isset($_POST['langueorgine'])){
                   $langueorgine=$_POST['langueorgine'];
				   echo "Langue orgine :".$langueorgine;
      	 }
		 $languetraduite="en";
	if (isset($_POST['languetraduite'])){
                   $languetraduite=$_POST['languetraduite'];
				   echo "<br> Langue traduite :".$languetraduite;
      	 }
/* STEP 4. IMPLEMENTATION */
echo "<br><br>";
echo  Translate($chaine, $langueorgine.'_to_'.$languetraduite);
echo "<br><br><br>";
?>
</body>
</html>