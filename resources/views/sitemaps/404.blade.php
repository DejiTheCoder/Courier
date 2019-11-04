@extends('layouts.app')
@section('title', '404 Error')
@section('content')
<div class=logisco-page-wrapper id=logisco-page-wrapper>
    <div class=logisco-not-found-wrap id=logisco-full-no-header-wrap>
        <div class=logisco-not-found-background></div>
        <div class="logisco-not-found-container logisco-container">
            <div class=logisco-header-transparent-substitute></div>
            <div class="logisco-not-found-content logisco-item-pdlr">
                <h1 class="logisco-not-found-head">404</h1>
                <h3 class="logisco-not-found-title logisco-content-font">You look lost</h3>
                <div class=logisco-not-found-caption>Sorry, we couldn&#039;t find the page you&#039;re looking
                    for.</div>
                <form role=search method=get class=search-form action=index.html>
                    <input type=text class="search-field logisco-title-font" placeholder="Type Keywords..." value
                        name=s>
                    <div class=logisco-top-search-submit><i class="fa fa-search"></i></div>
                    <input type=submit class=search-submit value=Search>
                </form>
                <div class=logisco-not-found-back-to-home><a href="index.html">Or Back To Homepage</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection