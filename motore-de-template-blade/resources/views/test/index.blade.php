@extends('test.base') <!-- Extend the 'base' layout -->

@section('title', 'Title') <!-- Define content for the 'title' yield section -->

@section('content')
    <h1>Welcome to My Page</h1>

    <!-- {{"te<strong>st</strong>"}} <br>
    <?="te<strong>st</strong>" ?> -->


    @foreach($tables as $table)
<article>
  <h3>{{$table->test}}</h3>
  <p>
    {{$table->name}}
  </p>
  <p>
    {{$table->content}}
  </p>
  <p>
  </p>
</article>
{{$tables->links()}}
@endforeach

@endsection

