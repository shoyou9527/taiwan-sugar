<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PagesController;
use App\Services\UserService;
use App\Services\VipLogService;
use Illuminate\Http\Request;
use DB;

class Common extends Controller {
    public function get_message(Request $request){

        $Table = 'short_message';
        $checkCode = str_pad(rand(0, pow(10, 5) - 1), 5, '0', STR_PAD_LEFT);
        $username = '54666024';
        $password = 'zxcvbnm';
        $Mobile   = $request->get('mobile','0926307756');


        $check_repeat_during = $this->check_repeat_during($Mobile);
        // dd($check_repeat_during);
        if($check_repeat_during['code']!='600'){
            $smbody = "您的驗證碼為$checkCode,此驗證碼5分鐘內有效。";
            $smbody = mb_convert_encoding($smbody, "BIG5", "UTF-8");
            // $ReturnResultUrl = 'http://localsugargarden.org/Common/get_message/'; //回傳傳送狀態的網址
            $msg_info = [
                            'mobile' => $Mobile,
                            'checkcode' => $checkCode,
                            'createdate' =>date("Y-m-d H:i:s")
                        ];
            $result = DB::table($Table)->insert(
                        $msg_info    
                    );
            $Data = array(
            "username" =>$username, //三竹帳號
            "password" => $password, //三竹密碼
            "dstaddr" =>$Mobile, //客戶手機
            "DestName" => '客戶', //對客戶的稱謂 於三竹後台看的時候用的
            "smbody" =>$smbody, //簡訊內容
            // "response" =>$ReturnResultUrl, //回傳網址
            // "ClientID" => $ClientID //使用者代號
            );
            $dataString = http_build_query($Data);
            $url = "http://smexpress.mitake.com.tw:9600/SmSendGet.asp?$dataString";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            if($result){
                $data = array(
                    'code'     => '200',
                    'msg_info' => $msg_info,  
                );
            }else{
                $data = array(
                    'code'     => '400',
                    'msg_info' => '失敗，請再寄送一次驗證碼',
                );
            }
            
        }else{
            $data = array(
                'code'     => '600',
                'msg_info' => '五分鐘內不可重複傳送'
            );
        }
        return json_encode($data);
    }

    public function checkcode_during(Request $request)
    {
        $now_time    = strtotime('now');
        $checkcode = $request->get('checkcode','FFFF');
        $data = DB::table('short_message')->where('checkcode', $checkcode)->first();
        // dd($request);
        if($now_time-300<strtotime($data->createdate)){
            /*驗鄭成功更新資料庫*/
            $data = array(
                'code'=>'200',
                'msg' =>'此驗證碼可用',
            );
        }else{
            $data = array(
                'code'=>'400',
                'msg' =>'此驗證碼已過期',
            );
        }
        if($checkcode!='FFFF'){
            return json_encode($data, JSON_UNESCAPED_UNICODE);
        }else{
            return json_encode(['error','沒有收到驗證碼'], JSON_UNESCAPED_UNICODE);
        }
    }

    public function check_repeat_during($Mobile)
    {
        // $phone = $request->get('phone');
        $now_time    = strtotime('now');
        $data = DB::table('short_message')->where('mobile', $Mobile)->first();
        if($now_time-300<=strtotime($data->createdate)){
            $data = array(
                'code'=>'600',
                'msg' =>'五分鐘內不可重複傳送',
            );
        }else{
            $data = array(
                'code'=>'200',
                'msg' =>'',
            );
        }
        return $data;
    }

    public function get_exif()
    {
        $now_time    = strtotime('now');
        // $avatar_name = $request->get('avatar_name');
        // $avatar_path = $request->get('avatar_path','');//需為絕對路徑
        $avatar_path = url('/new/images/0123456/0123.jpg');
        // $avatar_path = url($avatar_path);
        $exif = exif_read_data($avatar_path, 'IFD0');
        // echo $exif===false ? "No header data found.<br />\n" : "Image contains headers<br />\n";
        // dd($exif);
        if(empty($exif)){
            $msg = '沒有EXIF資訊';
            $data = array(
                'code'=>'600',
                'msg' =>$msg
            );
            echo  json_encode($data, JSON_UNESCAPED_UNICODE);
        }else{
            // "Image contains headers";
            $exif = exif_read_data($avatar_path);
            dd($exif);
            // echo "test2.jpg:<br />\n";
            $exif_data = array();
            foreach ($exif as $key => $section) {
                foreach ($section as $name => $val) {
                    // array_push($exif_data)
                    $exif_data[$name] = $val;
                }
            }
            // dd($exif_data);
            /*判斷照片是否在十分鐘內*/
            if($now_time-600<strtotime($exif_data['DateTimeOriginal'])){
                $data = array(
                    'code'=>'200',
                    'msg'=>'此照片可以使用'
                );
            }else{
                $data = array(
                    'code'=>'400',
                    'msg'=>'此照片過期或非您的個人手機現在拍的照片，請再拍一張照片，並在十分鐘內上傳'
                );
            }

            echo  json_encode($data, JSON_UNESCAPED_UNICODE);
        } 
        
    }

    public function upload_img(Request $request)
    {

        // $userService = new UserService;
        // $vipLogService = new VipLogService;
        // $PC = new PagesController;
        // $PC->save_img2($userService, $vipLogService);
        $this->save_img($request);
    }
    

    public function save_img($request)
    {
        // dd($request);
        $common = new Common();
        // dd($common->get_exif('/new/images/test05.jpg'));
        $user=$request->user();
        $user_id = $user->id;
        // $data = json_decode($request->data);
        // dd($data);
        $member_pics = $request->name;
        // dd($member_pics);
        // dd($member_pics);
        $pic_infos = $request->reader;
        // dd($member_pics);

        //VER.1
        // $this->base64_image_content($pic_infos[0], '/public/new/img/Member');
        // define('UPLOAD_PATH', '/new/img/Member/');
        // $img = str_replace('data:image/png;base64,', '', $pic_infos[0]);
        // $img = str_replace(' ', '+', $img);
        // $data = base64_decode($img);
        // $file = UPLOAD_PATH;
        // // dump($file);
        // dd($data, $file);
        // $success = file_put_contents('icon_010.txt', '12345');
        // $output = ($success) ? '<img src="'. $file .'" alt="Canvas Image" />' : '<p>Unable to save the file.</p>';
        // dd($output);


        //VER.2

        // $file = base64_decode($pic_infos[0]);
        // // dd($file);
        //             $folderName = '/public/new/img/Member/';
        //             $safeName = str_random(10).'.'.'png';
        //             $destinationPath = $folderName;
        //             // dd($safeName);
        //             file_put_contents($safeName, $file);

        //save new file path into db
        // $userObj->profile_pic = $safeName;
        $data = array(
            'code'=>'200',
        );

        // if(count($member_pics)==0){
        //     $data = array(
        //         'code'=>'600'
        //     );
        //     // dd('123');
        // }else{
            // dd('456');
            //VER.3
            // for($i=0;$i<count($member_pics);$i++){
                // dump($i);
                $pic_count = DB::table('member_pic')->where('member_id', $user->id)->count();
                if($pic_count>=6){
                    $data = array(
                        'code'=>'400',
                    );
                    // break;
                }
                $now = date("Ymdhis", strtotime(now()));
                $image = $pic_infos;  // your base64 encoded
// dd($image);
                // $image = str_replace('data:image/png;base64,', '', $image);
                // $image = str_replace(' ', '+', $image);
                // $imageName = str_random(10).'.'.'png';
                list($type, $image) = explode(';', $image);
                list(, $image)      = explode(',', $image);
                $image = base64_decode($image);
                \File::put(public_path(). '/Member_pics' .'/'. $user->id.'_'.$now.$member_pics, $image);



                DB::table('member_pic')->insert(
                    array('member_id' => $user->id, 'pic' => '/Member_pics'.'/'.$user->id.'_'.$now.$member_pics, 'isHidden' => 0, 'created_at'=>now(), 'updated_at'=>now())
                );


            // }
            $is_vip = $user->isVip();



            if(($pic_count+1)>=4 && $is_vip==0 &&$user->engroup==2){

                $isVipCount = DB::table('member_vip')->where('member_id',$user->id)->count();
                if($isVipCount==0){
                    DB::table('member_vip')->insert(array('member_id'=>$user->id,'active'=>1, 'free'=>1));
                }else{
                    DB::table('member_vip')->where('member_id',$user->id)->update(['active'=>1, 'free'=>1]);
                }


                $data = array(
                    'code'=>'800'
                );
            }

            
        // }


       


        /*設第一張照片為大頭貼*/
        $avatar = DB::table('member_pic')->where('member_id', $user_id)->orderBy('id', 'asc')->get()->first();
        if(is_null($avatar)){
            $avatarPic = '';
        }else{
            $avatarPic = $avatar->pic;
        }
        DB::table('user_meta')->where('user_id', $user_id)->update(['pic'=>$avatarPic]);



        // dd($data);
        // foreach($member_pics as $key=>$member_pic){

        //     DB::table('member_pic')->insert(
        //         array('member_id' => $user->id, 'pic' => date("Ymdhis", strtotime(now())).$member_pic, 'isHidden' => 0, 'created_at'=>now(), 'updated_at'=>now())
        //     );
        // }
        echo json_encode($data);
    }

    

}
?>