
@extends('layout.app')

@section('content')
  @include ('partials.hero')
  @include ('partials.profil-summary')
  @include ('partials.berita-summary', ['latestNews' => $latestNews])
  @include ('partials.kegiatan-summary' )

@endsection
