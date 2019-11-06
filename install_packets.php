<?php
/*
 * 套件安裝類別
 * 安裝套件相關方法
 * @version v1.0 date:2019/11/05
 * @author Wesley
 */
class service_install{
    /*
     * @param array $response 執行exec回傳值
     * @param string $cmd_str 欲執行exec command line
     * @param string $pass ssh password
     */
    protected $response,$cmd_str,$pass = '';

    // 檢查傳入資料是否為json format
    public function checkInputFormatIsJson($d){
        return is_string($d) && is_array(json_decode($d,1))?true:false;
    }

    // exec command
    public function exec_cmd(){
        $sh = exec("{$this->cmd_str}",$this->response);
        return $this;
    }

    /*
     * @param string $host_ip 欲執行ansible vm ip
     * @param string $m 欲執行ansible模組
     * @param string $m_arg 欲執行ansibel module arg
     */
    public function ansible_cmd($host_ip,$m,$m_arg){
        $this->cmd_str = "ansible all -i '{$host_ip},' -m {$m} -a '{$m_arg}' -u sys-admin -s -e 'ansible_ssh_pass={$this->pass} ansible_sudo_pass={$this->pass}'";
        return $this;
    }

    //return response
    public function ret_shell_out_msg(){
        return $this->response;
    }

    // print json result
    public function print_result($r){
        header('Content-type:application/json');
        echo json_encode($r);
    }
}

/*
 *  執行安裝套件
 *
 *  @param object $install 套件安裝類別
 *  @param
 */
$install = new service_install;

// step 1. check method is post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //接收任何型態的資料
    $get_data = file_get_contents('php://input');

    // step 2. check input data is json format
    if ($install->checkInputFormatIsJson($get_data)) {
        $data = json_decode($get_data, 1);

        $result = ['status' => true, 'msg' => 'is json format', 'data' => $data];
    } else {
        $result = ['status' => false, 'msg' => 'is not json format'];
    }

    $install->print_result($result);
}else{
    $install->print_result(
        ['status'=>false,'msg'=>'request method illegal']
    );
}
