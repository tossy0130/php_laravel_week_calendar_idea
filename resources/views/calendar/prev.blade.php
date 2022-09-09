@extends('layouts.app')

@section('title', 'calendar_TOP')

@section('content')


@isset($num)
<p>
   <a href="{{ route('calendar.prev' , $num) }}">
    テスト
   </a>
</p>
@else
<p>
   <a href="{{ route('calendar.prev') }}">
    テスト
   </a>
</p>
@endisset


<div>
    @foreach($arr_day as $day)
        <p>
            {{ $day }}
        </p>
    @endforeach
</div>

@endsection