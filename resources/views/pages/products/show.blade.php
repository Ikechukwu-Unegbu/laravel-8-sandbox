@extends('layouts.layouts')


@section('head')

@endsection

@section('content')
<form method="POST" action="/products">
  @csrf 
@if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="container">
  <script>
      fetch('/pro/1')
.then(data => {
// return data.json();
console.log(data.body)
})
// .then(product => {
// console.log(product);
// });

fetch('/pro/1')
.then(data => {
return data.json();
})
.then(post => {
console.log(post);
});
  </script>
</div>
@endsection