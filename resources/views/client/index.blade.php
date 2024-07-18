@extends('client.layouts.master')
@section('nav')
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="has-children active">
              <a href="index.html">Home</a>
              <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
                <li class="has-children">
                  <a href="#">Sub Menu</a>
                  <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="has-children">
              <a href="about.html">About</a>
              <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
              </ul>
            </li>
            <li><a href="shop.html">Shop</a></li>
            <li class="has-children">
                <a href="#">Catalogue</a>
                <ul class="dropdown">
                    @foreach ($catelogues as $catelogue)
                        <li><a href="#">{{$catelogue->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="#">New Arrivals</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>
      </nav>
@endsection

@section('catelogues')
<div class="site-section site-blocks-2">
  <div class="container">
    <div class="row">
      @foreach ($catelogues as $catelogue)
        {{-- <li><a href="#">{{$catelogue->name}}</a></li> --}}
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
          <a class="block-2-item" href="#">
            <figure class="image">
              <img src="{{asset(Storage::url($catelogue->cover))}}" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <span class="text-uppercase">Collections</span>
              <h3>{{$catelogue->name}}</h3>
            </div>
          </a>
        </div>
      @endforeach

    </div>
  </div>
</div>
@endsection