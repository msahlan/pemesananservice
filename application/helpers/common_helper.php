<?php
function dd($var)
{
    echo '<pre>';
    die(var_dump($var));
}

function send_sms($destNumber, $msg) 
{
    $url = sprintf("https://alpha.zenziva.net/apps/smsapi.php?userkey=tm624n&passkey=jayadata123&nohp=%s&pesan=%s", $destNumber, urlencode($msg));
    if (file_get_contents($url)!==FALSE){
    	return true;
    }
    return true;
}

function pronoun($jk)
{
	if (strtolower($jk)=="laki-laki"){
		return "Bapak";
	}elseif(strtolower($jk)=="perempuan"){
		return "Ibu";
	}
	return "";
}

function isJson($string)
{
	return is_string($string) && is_object(json_decode($string)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
}

function writeLog($data = "")
{
	$directory = FCPATH. 'logs/';
	$data = date("Y-m-d H:m:s").' - '.$data."\n";
	$file = $directory.'LOG'.date('Ymd').'.txt';
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
}

function get_combobox($query, $key, $value, $empty = FALSE, &$disable = ""){
	$combobox = array();
	$CI=& get_instance();
	$data = $CI->db->query($query);
	if($empty) $combobox[""] = $empty;
	if($data->num_rows() > 0){
		$kodedis = "";
		$arrdis = array();
		foreach($data->result_array() as $row){
			if(is_array($disable)){
				if($kodedis==$row[$disable[0]]){
					if(!array_key_exists($row[$key], $combobox)) $combobox[$row[$key]] = "&nbsp; &nbsp;&nbsp;".$row[$value];
				}else{
					if(!array_key_exists($row[$disable[0]], $combobox)) $combobox[$row[$disable[0]]] = $row[$disable[1]];
					if(!array_key_exists($row[$key], $combobox)) $combobox[$row[$key]] = "&nbsp; &nbsp;&nbsp;".$row[$value];
				}
				$kodedis = $row[$disable[0]];
				if(!in_array($kodedis, $arrdis)) $arrdis[] = $kodedis;
			}else{
				$combobox[$row[$key]] = $row[$value];
			}
		}
		$disable = $arrdis;
	}
	return $combobox;
}