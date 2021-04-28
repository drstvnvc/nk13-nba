@extends('layouts.app')

@section('title', $team->name)

@section('content')
<h2>{{$team->name}}</h2>

<div>Email: {{$team->email}}</div>
<div>Address: {{$team->address}}</div>
<div>City: {{$team->city}}</div>

<h5>Players</h5>
<ul>
  @forelse($team->players as $player)
    <li>
      <a href="{{route('player', [ 'player' => $player ])}}">{{$player->first_name}} {{$player->last_name}}</a>
    </li>
  @empty
    <span>No players</span>
  @endforelse
</ul>
@endsection
