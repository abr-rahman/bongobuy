@extends('frontend.layouts.master_frontend')
@push('css')
<style>
    .warranty-img{
        display: grid;
        grid-template-columns: 1fr 1fr;
        justify-content: center;
        grid-gap: 10px;
        padding: 0 5px
    }
    .warranty-img img{
        width: 100%;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 768px){
    .warranty-img{
        grid-template-columns: 1fr;
    }
    }
</style>
@endpush
@section('section')
<div class="relative">
    <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
    <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
        <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
           HOW TO CLAIM WARRANTY</h2>
    </div>
</div>
<div class="mx-auto md:container py-10 ">
    <div class="w-full mx-auto">
        <div class="warranty-img">
            <img src="{{ asset('frontend/images/Claim1.jpg') }}" alt="Snow">
            <img src="{{ asset('frontend/images/Claim2.jpg') }}" alt="Snow">
        </div>
    </div>
</div>
@endsection