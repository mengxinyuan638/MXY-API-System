<?php


namespace app\controller;

use app\BaseController;

use think\facade\View;

use think\Request;

use think\facade\Env;

class Indexcontr extends Base{
    public function set()//前台信息设置页面
    {   
        return view::fetch();
    }

    public function linkset()//前台信息设置页面
    {   
        return view::fetch();
    }

    public function footpage()//底部信息设置页面
    {   
        return view::fetch();
    }

    public function webmsg(){//获取web信息
        //用来获取api数据
        $data = file_get_contents("key.json");
        $data = json_decode($data,True);
        $url = $data['url'];
        $qq = $data['qq'];
        $webname = $data['webname'];
        $gg = $data['gg'];
        $tcgg = $data['tcgg'];
        $type = $data['type'];
        $tctype = $data['tctype'];
        $foot_msg = $data['foot_msg'];//获取底部信息
        $m = array("code"=>200,"msg"=>"成功","data"=>array("url"=>$url,"qq"=>$qq,"webname"=>$webname,"gg"=>$gg,"tcgg"=>$tcgg,"type"=>$type,"tctype"=>$tctype,"foot_msg"=>$foot_msg));
        $m = json_encode($m,JSON_UNESCAPED_UNICODE);
        exit($m);
    }

    public function homeedit(){
        $name = $_POST['webname'];
        $qq = $_POST['qq'];
        $url = $_POST['weburl'];
        $gg = $_POST['gg'];
        $tcgg = $_POST['tcgg'];
        $data = file_get_contents("key.json");
        $data = json_decode($data,True);
        $data['webname'] = $name;
        $data['qq'] = $qq;
        $data['url'] = $url;
        $data['gg'] = $gg;
        $data['tcgg'] = $tcgg;
        $data = json_encode($data,JSON_UNESCAPED_UNICODE);//第二个参数是防止中文乱码
        file_put_contents("key.json",$data);
        $m = array("code"=>200,"msg"=>"成功","d"=>$name);
        $m = json_encode($m,JSON_UNESCAPED_UNICODE);
        exit($m);
    }
    public function foot_msg_edit(){
        $foot_msg = $_POST['foot_msg'];
        $data = file_get_contents("key.json");
        $data = json_decode($data,True);
        $data['foot_msg'] = $foot_msg;
        $data = json_encode($data,JSON_UNESCAPED_UNICODE);//第二个参数是防止中文乱码
        file_put_contents("key.json",$data);
        $m = array("code"=>200,"msg"=>"成功");
        $m = json_encode($m,JSON_UNESCAPED_UNICODE);
        exit($m);
    }

    public function iconupload(){
        $file = $_FILES['file']; // 获取上传的文件
        $name_icon = "uploads/icon/".$_FILES["file"]["name"];
        if ($file==null) {
            exit(json_encode(array('code'=>1, 'msg'=>'未上传图片'),JSON_UNESCAPED_UNICODE));
        }
        // 获取文件后缀
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        // 判断文件是否合法
        if(!in_array($extension, array("gif","jpeg","jpg","png"))){
            exit(json_encode(array('code'=>2, 'msg'=>'上传图片不合法'),JSON_UNESCAPED_UNICODE));
        }else if(file_exists($name_icon)){
            $msg = "图片已经上传过了，不能再上传了"; 
            exit(json_encode(array('code'=>3, 'msg'=>$msg),JSON_UNESCAPED_UNICODE));
        }else{
            $env_way = Env::get("logo.way");
            $env_way2 = "WAY = ".$env_way;
            if(empty($env_way)){
                $pz = '../.env';
                $fp = file_get_contents($pz);//读取配置
                $fp2=fopen($pz,'w');
                $head = '[LOGO]';
                $name = 'WAY = uploads/icon/'. $_FILES["file"]["name"];
                fwrite($fp2,$fp."\r\n".$head."\r\n".$name);   
                fclose($fp2);
                move_uploaded_file($_FILES["file"]["tmp_name"],'uploads/icon/'. $_FILES["file"]["name"]);
                $img = "upload/icon/".$_FILES["file"]["name"];
                exit(json_encode(array('code'=>0, 'msg'=>$img),JSON_UNESCAPED_UNICODE));
            }else{
                $pz = '../.env';
                $fp = file_get_contents($pz);//读取配置
                $name = 'WAY = uploads/icon/'. $_FILES["file"]["name"];
                $fp = str_replace($env_way2,$name,$fp);
                $fp2=fopen($pz,'w');
                fwrite($fp2,$fp);   
                fclose($fp2);
                move_uploaded_file($_FILES["file"]["tmp_name"],'uploads/icon/'. $_FILES["file"]["name"]);
                $img = "upload/icon/".$_FILES["file"]["name"];
                exit(json_encode(array('code'=>0, 'msg'=>$img),JSON_UNESCAPED_UNICODE));
            }
            
        }
    }
    public function backupload(){
        $file = $_FILES['file']; // 获取上传的文件
        $name_back = "uploads/back/".$_FILES["file"]["name"];
        if ($file==null) {
            exit(json_encode(array('code'=>1, 'msg'=>'未上传图片'),JSON_UNESCAPED_UNICODE));
        }
        // 获取文件后缀
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        // 判断文件是否合法
        if(!in_array($extension, array("gif","jpeg","jpg","png"))){
            exit(json_encode(array('code'=>2, 'msg'=>'上传图片不合法'),JSON_UNESCAPED_UNICODE));
        }else if(file_exists($name_back)){
            $msg = "图片已经上传过了，不能再上传了";
            exit(json_encode(array('code'=>3, 'msg'=>$msg),JSON_UNESCAPED_UNICODE));
        }else{
            $env_imgway = Env::get("background.imgway");
            $env_way2 = "IMGWAY = ".$env_imgway;
            if(empty($env_imgway)){
                $pz = '../.env';
                $fp = file_get_contents($pz);//读取配置
                $fp2=fopen($pz,'w');
                $head = '[BACKGROUND]';
                $name = 'IMGWAY = uploads/back/'. $_FILES["file"]["name"];
                fwrite($fp2,$fp."\r\n".$head."\r\n".$name);   
                fclose($fp2);
                move_uploaded_file($_FILES["file"]["tmp_name"],'uploads/back/'. $_FILES["file"]["name"]);
                $img = "upload/back/".$_FILES["file"]["name"];
                exit(json_encode(array('code'=>0, 'msg'=>$img),JSON_UNESCAPED_UNICODE));
            }else{
                $pz = '../.env';
                $fp = file_get_contents($pz);//读取配置
                $name = 'IMGWAY = uploads/back/'. $_FILES["file"]["name"];
                $fp = str_replace($env_way2,$name,$fp);
                $fp2=fopen($pz,'w');
                fwrite($fp2,$fp);   
                fclose($fp2);
                move_uploaded_file($_FILES["file"]["tmp_name"],'uploads/back/'. $_FILES["file"]["name"]);
                $img = "upload/back/".$_FILES["file"]["name"];
                exit(json_encode(array('code'=>0, 'msg'=>$img),JSON_UNESCAPED_UNICODE));
            }
        }
    }
}