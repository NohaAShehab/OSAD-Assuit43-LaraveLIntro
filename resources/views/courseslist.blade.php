

<h1> Hello world </h1>

{{$name}}


<h1> Use blade template engine to display content</h1>

<h1> If condition </h1>
@if (count($courses) === 1)
    I have one course!
@elseif (count($courses) > 1)
    I have multiple courses!
@else
    I don't have any courses!
@endif

<h1> Foreach loop </h1>
@foreach($courses as $course)
        <li> {{$course}}</li>
@endforeach

