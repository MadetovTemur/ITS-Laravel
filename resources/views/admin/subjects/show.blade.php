@use('Carbon\Carbon')

<a href="{{ route('admin.subject.index')  }}">back</a>


<h1>NAME: {{ $subject->name }}</h1>
<h1>DISCRIPTION: {{ $subject->discription }}</h1>

<p>create at {{ $subject->created_at->format('Y-m-d') }}</p>
<p>update at {{ Carbon::parse( $subject->updated_at->format('Y-m-d H:i'))->diffForHumans() }}</p>
{{-- https://www.teknowize.com/articles/web-articles/date-time-format-in-laravel#gsc.tab=0 --}}

<a href="{{ route('admin.subject.edit', $subject->id) }}">edit</a>
