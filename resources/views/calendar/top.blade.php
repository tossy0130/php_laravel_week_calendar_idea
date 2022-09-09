@extends('layouts.app')

@section('title', 'calendar_TOP')

@section('content')

@isset($get_prev)
    {{ $get_prev += 7 }}
    {{ $num = $get_prev }}
    a
@else
    {{ $num = 7 }}
    b
@endisset

<p>
   <a href="{{ route('calendar.top') }}?prev={{ $num }}">
    テスト
   </a>
</p>

<div>
    @foreach($arr_day as $day)
        <p>
            {{ $day }}
        </p>
    @endforeach
</div>
@endsection