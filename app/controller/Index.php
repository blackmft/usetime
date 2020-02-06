<?php
namespace app\controller;

use app\BaseController;
use app\model\TimeDetail;
use think\Log;

class Index extends BaseController
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) 2020新春快乐</h1><p> ThinkPHP V' . \think\facade\App::version() . '<br/><span style="font-size:30px;">14载初心不改 - 你值得信赖的PHP框架</span></p><span style="font-size:25px;">[ V6.0 版本由 <a href="https://www.yisu.com/" target="yisu">亿速云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ee9b1aa918103c4fc"></think>';
    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }
    /**
     * 保存提交的时间信息
     */
    public function saveInfo()
    {
        $paramsArr = request()->param('params');
        $data = $paramsArr['data'];
        $name = $data['name'];
        $city = $data['city'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $phoneTime = $data['phoneTime'];
        $tvTime = $data['tvTime'];
        $gameTime = $data['gameTime'];
        $sportTime = $data['sportTime'];
        $studyTime = $data['studyTime'];
        $sleepTime = $data['sleepTime'];
        $outTime = $data['outTime'];

//        $name = request()->param('name');
//        $city = request()->param('city');
//        $ip = $_SERVER['REMOTE_ADDR'];
//        $phoneTime = request()->param('phoneTime');
//        $tvTime = request()->param('tvTime');
//        $gameTime = request()->param('gameTime');
//        $sportTime = request()->param('sportTime');
//        $studyTime = request()->param('studyTime');
//        $sleepTime = request()->param('sleepTime');
//        $outTime = request()->param('outTime');

        $insertData = [
            'name' => $name,
            'city' => $city,
            'ip' => $ip,
            'phonetime' => $phoneTime * 10,
            'tvtime' => $tvTime * 10,
            'gametime' => $gameTime * 10,
            'sporttime' => $sportTime * 10,
            'studytime' => $studyTime * 10,
            'sleeptime' => $sleepTime * 10,
            'outtime' => $outTime,
            'createtime' => date('Y-m-d H:i:s')
        ];
        $row = TimeDetail::create($insertData);
        $res = [];
        if($row){
            $res['code'] = 1;
            $res['msg'] = 'success';
            $res['data'] = [];
        }else{
            $res['code'] = 0;
            $res['msg'] = '存储数据失败，请查询';
        }
        return json_encode($res);
    }

    public function getInfo()
    {
        $res = [];
        $res['code'] = 1;
        $res['msg'] = 'success';
        $result = [];
        $result['time'] = '2020-02-05 13:00:00';
        $result['total'] = 1000000;
        $result['sleepTime'] = 100;
        $result['phoneTime'] = 90;
        $result['tvTime'] = 70;
        $result['studyTime'] = 60;
        $result['gameTime'] = 40;
        $result['sportTime'] = 20;
        $result['outTime'] = 5;
        $res['data'] = $result;
        return json_encode($res);
    }
}
