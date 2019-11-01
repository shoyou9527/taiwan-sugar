<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message_new;
use App\Models\AnnouncementRead;
use App\Http\Requests;
use App\Models\SimpleTables\banned_users;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class Message_newController extends Controller {

    // handle delete message
    public function deleteBetween(Request $request) {
        Message::deleteBetween($request->input('uid'), $request->input('sid'));

        return redirect('dashboard/chat');
    }

    public function deleteBetweenGET($uid, $sid) {
        Message::deleteBetween($uid, $sid);

        return redirect('dashboard/chat');
    }

    public function deleteAll(Request $request) {
        Message::deleteAll($request->input('uid'));

        return redirect('dashboard/chat');
    }

    public function deleteSingle(Request $request) {
        $uid = $request->input('uid');
        $sid = $request->input('sid');
        $ct_time = $request->input('ct_time');
        $content = $request->input('content');

        Message::deleteSingle($uid, $sid, $ct_time, $content);
        return redirect()->route('chatWithUser', $sid);
        //return redirect('dashboard/chat/' . $sid);
    }

    public function deleteSingleGET($uid, $sid, $ct_time, $content) {
        Message::deleteSingle($uid, $sid, $ct_time, $content);

        return redirect()->route('chatWithUser', $sid);
        //return redirect('dashboard/chat/' . $sid);
    }

    public function reportMessage(Request $request){
        Message::reportMessage($request->id, $request->content);

        return redirect()->route('chatWithUser', $request->sid)->with('message', '成功檢舉該筆訊息');
        //return redirect('dashboard/chat/' . $request->sid)->with('message', '成功檢舉該筆訊息');
    }

    public function showReportMessagePage($id, $sid) {
        $user = Auth::user();
        return view('dashboard.reportMessage')->with('id', $id)->with('sid', $sid)->with('user', $user);
    }

    public function postChat(Request $request)
    {
        $banned = banned_users::where('member_id', Auth::user()->id)
            ->whereNotNull('expire_date')
            ->orderBy('expire_date', 'asc')->get()->first();
        if(isset($banned)){
            $date = \Carbon\Carbon::parse($banned->expire_date);
            return view('errors.User-banned-with-message',
                ['banned' => $banned,
                 'days' => $date->diffInDays() + 1]);
        }
        $payload = $request->all();
        if(!isset($payload['msg'])){
            return back()->withErrors(['請勿僅輸入空白！']);
        }
        if(!Auth::user()->isVIP()){
            $m_time = Message::select('created_at')->
                where('from_id', Auth::user()->id)->
                orderBy('created_at', 'desc')->first();
            if(isset($m_time)) {
                $diffInSecs = abs(strtotime(date("Y-m-d H:i:s")) - strtotime($m_time->created_at));
                if ($diffInSecs < 60) {
                    return back()->withErrors(['您好，由於系統偵測到您的發訊頻率太高(每分鐘限一則訊息)。為維護系統運作效率，請降低發訊頻率。']);
                }
            }
        }
        Message::post(auth()->id(), $payload['to'], $payload['msg']);
        return back();
    }

    public function chatview(Request $request)
    {
        $user = $request->user();
        $m_time = '';
        if (isset($user)) {
            $isVip = $user->isVip();
            return view('new.dashboard.chat')
                ->with('user', $user)
                ->with('m_time', $m_time)
                ->with('isVip', $isVip);
        }
    }

    public function chatviewMore(Request $request)
    {
        $user_id = $request->uid;
        $data = Message_new::allSendersAJAX($user_id, $request->isVip,$request->date);
        if (isset($data)) {
            if(!empty($data['date'])){
                $date = $data['date'];
                unset($data['date']);
                //$data = array_values($data);
            }
            return response()->json(array(
                'status' => 1,
                'msg' => $data,
                'noVipCount' => Config::get('social.limit.show-chat')
            ), 200)
                ->header("Cache-Control", "no-cache, no-store, must-revalidate")
                ->header("Pragma", "no-cache")
                ->header("Last-Modified", gmdate("D, d M Y H:i:s")." GMT")
                ->header("Cache-Control", "post-check=0, pre-check=0", false)
                ->header("Expires", "Fri, 01 Jan 1990 00:00:00 GMT");
        } else {
            return response()->json(array(
                'status' => 2,
                'msg' => 'fail',
            ), 500);
        }
    }

    public function chatviewAll(Request $request)
    {
        $user_id = $request->uid;
        $data = Message::allSendersAJAX($user_id, $request->isVip);
        if (isset($data)) {
            return response()->json(array(
                'status' => 1,
                'msg' => $data
            ), 200)
                ->header("Cache-Control", "no-cache, no-store, must-revalidate")
                ->header("Pragma", "no-cache")
                ->header("Last-Modified", gmdate("D, d M Y H:i:s")." GMT")
                ->header("Cache-Control", "post-check=0, pre-check=0", false)
                ->header("Expires", "Fri, 01 Jan 1990 00:00:00 GMT");
        } else {
            return response()->json(array(
                'status' => 2,
                'msg' => 'fail',
            ), 500);
        }
    }

    public function disableNotice(Request $request)
    {
        $user_id = $request->id;
        $user = User::select('id', 'noticeRead')->where('id', $user_id)->get()->first();
        $user->noticeRead = 1;
        if ($user->save()) {
            return response()->json(array(
                'status' => 1,
                'msg' => 'ok',
            ), 200);
        } else {
            return response()->json(array(
                'status' => 2,
                'msg' => 'fail',
            ), 500);
        }
    }

    public function announceRead(Request $request)
    {
        $user_id = $request->uid;
        $announce_id = $request->aid;
        $exist = AnnouncementRead::where('user_id', $user_id)->where('announcement_id', $announce_id)->get()->first();
        if(!isset($exist)){
            $announceRead = new AnnouncementRead;
            $announceRead->user_id = $user_id;
            $announceRead->announcement_id = $announce_id;
            if ($announceRead->save()) {
                return response()->json(array(
                    'status' => 1,
                    'msg' => 'ok',
                ), 200);
            } else {
                return response()->json(array(
                    'status' => 2,
                    'msg' => 'fail',
                ), 500);
            }
        }
        return response()->json(array(
            'status' => 1,
            'msg' => 'already exists.',
        ), 200);
    }

}