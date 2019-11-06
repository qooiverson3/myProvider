<?php
/*
 * encrypt by RSA key & base64
 * @version v1.0, @date 2019/11/06
 * @author wesley_lai
 *
 * openssl genrsa -out priv.pem 1024    //產生私鑰
 * openssl rsa -in priv.pem -pubout -out pub.pem    //產生公鑰
 */
class encrypt_base64{
    protected $fp,$fread_result,$encryString,$decryString,$de_base64;

    //加密
    public function encry($input_str){
        $get_key = openssl_get_publickey($this->fread_result);
        openssl_public_encrypt($input_str,$this->encryString,$get_key);
        return $this;
    }

    //解密
    public function decry(){
        $get_key = openssl_get_privatekey($this->fread_result);
        openssl_private_decrypt($this->decryString,$this->de_base64,$get_key);
        return $this->de_base64;
    }

    //read file
    public function open_file($key){
        $this->fp = fopen($key,'r');
        $this->fread_result = fread($this->fp, 8192);
        return $this;
    }

    //close file
    public function close_file(){
        fclose($this->fp);
        return $this;
    }

    public function base_64_encode(){
        return base64_encode($this->encryString);
    }

    public function base_64_decode($input){
        $this->decryString = base64_decode($input);
        return $this;
    }
}

$result = new encrypt_base64;

//加密
$e = $result->open_file('../pub.pem')->close_file()->encry('test12345')->base_64_encode();

//解密
$d = $result->open_file('../priv.pem')->close_file()->base_64_decode($e)->decry();

header("Content-Type:text/html; charset=utf-8");
echo "加密後:<br>{$e}<hr>解密後：<br>{$d}";
