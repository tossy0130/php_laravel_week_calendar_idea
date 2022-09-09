<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Carbon\CarbonImmutable;

class CalendarController extends Controller
{
    //
    public function top(Request $request)
    {

        $get_prev = $request->input('prev');

        if (empty($get_prev)) {

            // === 今日を取得
            $carbon_today = new Carbon('today');
            $format = 'YYYY-MM-DD';

            // === 現在時刻取得
            $dt = new Carbon();
            $dt = Carbon::setLocale('ja');
            $dt = Carbon::now()->format('n月j日');

            $arr_day[0] = $carbon_today->today()->isoFormat($format);

            for ($i = 0; $i < 7; $i++) {
                $arr_day[$i] = $carbon_today->copy()->addDay($i)->isoFormat($format);
            }

            return view('calendar.top', [
                'dt' => $dt, 'arr_day' => $arr_day,
                'get_prev' => $get_prev
            ]);
        } else {

            // === 今日の日付を取得
            $carbon_today = new Carbon('today');
            $format = 'YYYY-MM-DD';

            // === 現在時刻 取得
            $dt_time = new Carbon();
            $dt_time = Carbon::setLocale('ja');
            $dt_time = Carbon::now()->format('n月j日');

            $arr_day[0] = $carbon_today->subDays($get_prev)->isoFormat($format);

            for ($i = 0; $i < 7; $i++) {
                $arr_day[$i] = $carbon_today->copy()->subDays($i)->isoFormat($format);
            }

            return view(
                'calendar.top',
                [
                    'dt_time' => $dt_time, 'arr_day' => $arr_day,
                    'get_prev' => $get_prev
                ]
            );
        }
    }

    public function prev(Request $request)
    {
        $get_prev = $request->input('prev');

        return view('calendar.top', [
            'get_prev' => $get_prev
        ]);


        /*
        if (isset($get_prev)) {

            // === 今日を取得
            $carbon_today = new Carbon('today');
            $format = 'YYYY-MM-DD';

            $cd = $carbon_today->subDay($get_prev);

            // === 現在時刻取得
            $dt = new Carbon();
            $dt = Carbon::setLocale('ja');
            $dt = Carbon::now()->format('n月j日');

            $arr_day[0] = $cd->today()->isoFormat($format);

            for ($i = 0; $i < 7; $i++) {
                $arr_day[$i] = $cd->copy()->addDay($i)->isoFormat($format);
            }

            return view('calendar.top', ['dt' => $dt, 'arr_day' => $arr_day]);
        } else {

            // === 今日を取得
            $carbon_today = new Carbon('today');
            $format = 'YYYY-MM-DD';

            // === 現在時刻取得
            $dt = new Carbon();
            $dt = Carbon::setLocale('ja');
            $dt = Carbon::now()->format('n月j日');

            $arr_day[0] = $carbon_today->today()->isoFormat($format);

            for ($i = 0; $i < 7; $i++) {
                $arr_day[$i] = $carbon_today->copy()->addDay($i)->isoFormat($format);
            }
            

            return view('calendar.top', ['dt' => $dt, 'arr_day' => $arr_day,
            'get_prev' => $get_prev]);
        }

        */
    }
}
