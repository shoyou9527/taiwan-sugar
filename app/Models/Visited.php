<?php

namespace App\Models;

use App\Models\User;
use App\Notifications\MessageEmail;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Visited extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'visited';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'member_id',
        'visited_id',
        'created_at'
    ];

    public $timestamps = false;


    public static function unique($array,$key_id = null, $key_create = null) {

        if(null == $key_id){
            return array_unique($array);
        }
        $keys = [];
        $ret = [];
        foreach($array as $elem){
            $arrayKey = (is_array($elem)) ? $elem[$key_id]:$elem->$key_id;
            $diff_days = Visited::getDiffDays($elem[$key_create]);
            //echo $diff_days;

            if(in_array($arrayKey,$keys) || $diff_days > 30){
                continue;
            }
            array_push($keys,$arrayKey);

            $ret[] = $elem;
        }
        return $ret;
    }

    public static function getDiffDays($value) {
        $now = Carbon::now();
        $create_time = Carbon::parse($value);
        $diff_days = $create_time->diffInDays($now);

        return $diff_days;
    }

    public static function findBySelf($uid)
    {
        return Visited::unique(Visited::where('visited_id', $uid)->distinct()->orderBy('created_at', 'desc')->get(), "member_id", "created_at");
    }
    
    //TS足跡分頁
    public static function findBySelf2($uid)
    {
        return Visited::where('visited_id', $uid)->groupBy('member_id')->orderBy('created_at', 'desc')->paginate(12);
    }

    public static function visit($member_id, $visited_id)
    {
        $visited = new Visited;
        $visited->member_id = $member_id;
        $visited->visited_id = $visited_id;
        $visited->created_at = Carbon::now();
        $visited->save();
        $curUser = User::findById($visited_id);
        if ($curUser != null && $curUser->meta_()->notifhistory !== '不通知')
        {
        // $curUser->notify(new MessageEmail($member_id, $visited_id, "瀏覽你的資料"));
        }
    }

    //TS資料庫新增瀏覽次數間隔一分鐘
    public static function visit2($member_id, $visited_id)
    {
        $now = Carbon::now();
        if(Visited::where('member_id', $member_id)->where('visited_id', $visited_id)->first() != null){
            $ct = Visited::select('created_at')->where('member_id', $member_id)
                    ->where('visited_id', $visited_id)
                    ->orderBy('created_at', 'desc')->get()->first();
            $difftime = Carbon::parse($ct->created_at)->diffInMinutes($now);
            if($difftime > 1){
                $visited = new Visited;
                $visited->member_id = $member_id;
                $visited->visited_id = $visited_id;
                $visited->created_at = $now;
                $visited->save();
                // $curUser = User::findById($visited_id);
            }
        }else{
            $visited = new Visited;
            $visited->member_id = $member_id;
            $visited->visited_id = $visited_id;
            $visited->created_at = $now;
            $visited->save();
            // $curUser = User::findById($visited_id);
        }
        // if ($curUser != null && $curUser->meta_()->notifhistory !== '不通知')
        // {
        // // $curUser->notify(new MessageEmail($member_id, $visited_id, "瀏覽你的資料"));
        // }
    }
}
