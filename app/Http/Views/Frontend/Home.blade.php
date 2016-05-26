@extends('Frontend.master')
@section('header')
<title>SimpleOne - A Responsive Html5 Ecommerce Template</title>
<meta name="description" content="">
<meta name="author" content="">
@endsection
@section('content')
{{-- Trình diễn ảnh --}}
@include('Moduls.Slider', ['sliders'=>$ModulsSlider]);

<!-- Slider End-->

<!-- Section Start-->
<section class="container otherddetails">
    <div class="otherddetailspart">
        <div class="innerclass free">
            <h2>Free shipping</h2>
            All over in world over $200 </div>
    </div>
    <div class="otherddetailspart">
        <div class="innerclass payment">
            <h2>Easy Payment</h2>
            Payment Gatway support </div>
    </div>
    <div class="otherddetailspart">
        <div class="innerclass shipping">
            <h2>24hrs Shipping</h2>
            Free For UK Customers </div>
    </div>
    <div class="otherddetailspart">
        <div class="innerclass choice">
            <h2>Over 5000 Choice</h2>
            50,000+ Products </div>
    </div>
</section>
<!-- Section End-->
{{-- Sản phẩm nổi bật --}}
@include('Moduls.ProductFeatured', ['products'=>$ModulProductFeature]);
<!-- Featured Product-->
{{-- Sản phẩm mới --}}
@include('Moduls.ProductNew', ['products'=>$ModulProductNew]);

<!-- Latest Product-->

@endsection