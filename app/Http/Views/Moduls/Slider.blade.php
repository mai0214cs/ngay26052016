<section class="slider">
    <div class="container">
        <div class="flexslider" id="mainslider">
            <ul class="slides">
                @foreach($sliders as $slider)
                <li>
                    <img src="{{imageReset($slider['image'])}}" alt="{{$slider['name']}}" />
                </li>    
                @endforeach
            </ul>
        </div>
    </div>
</section>