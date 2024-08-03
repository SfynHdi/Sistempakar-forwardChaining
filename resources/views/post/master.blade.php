@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-8">
                <div class="article-content p-4 bg-white shadow-sm rounded">
                    <h1 class="article-title custom-article-title">@yield('article-title')</h1>
                        <div class="article-image my-4">
                        <img src="@yield('article-image')" alt="Article Image" class="img-fluid rounded">
                    </div>
                    <div class="article-body custom-article-body">
                        @yield('article-body')
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar p-4 bg-light shadow-sm rounded">
                    <h3>Artikel Lainnya</h3>
                    @yield('sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection

