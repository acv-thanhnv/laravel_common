@extends('layouts.app')
<div id="app">
    <passport-clients></passport-clients>
    <passport-authorized-clients></passport-authorized-clients>
    <passport-personal-access-tokens></passport-personal-access-tokens>
</div>
<script src="{{asset('js/app.js')}}"></script>


