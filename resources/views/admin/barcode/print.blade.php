{{-- @extends('layouts.admin-master')
@section('section')
        <div class="print_template hidden">
            <table>
                <tr style="display: flex; justify-content: center; flex-wrap: wrap; grid-gap: 15px;">
                    @foreach ($qrcodes as $code)
                    <td>
                        <div style="max-width: 80px; margin-top: 20px; margin-left: -5px;">
                            <img style="width: 80px; height: 55px;" src="{{ asset('qr/full-qr.png') }}" alt="">
                            <p style="margin-top: -47.1px; margin-left: 49px; margin-right: 15px;">{{ QrCode::margin(1)->size(21)->generate($baseUrl.$code->barcode_number) }}</p>
                        </div>
                    </td>
                    @endforeach
                </tr>
            </table>
        </div>
@endsection --}}
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="display: flex; justify-content: center;">
        @foreach ($qrcodes as $code)
        <div style="width: 80px; height: 55px; background-color: #faa919; border-radius: 20px; padding: 10px; margin: 10px;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; ">
                <div style="border-right: 1px solid #000; padding-right: 10px; display: grid; justify-content: center;">
                    <h1 style="font-size: 20px; font-weight: 700; text-align: center; line-height: normal;">24</h1>
                    <h4 style="font-size: 14px; text-align: center; line-height: normal;">Month</h4>
                </div>
                <div style="padding-left: 10px;">
                    <div class="qr-code" style="width: 20px; height: 20px; display: block; background-color: #fff; border-radius: 10px; ">{{ QrCode::margin(1)->size(21)->generate($baseUrl.$code->barcode_number) }}</div>
                    <p style="text-align: center; font-weight: 600; font-size: 14px">SCAN TO</p>
                    <p style="text-align: center; font-size: 12px">Register</p>
                </div>
            </div>
            <div style="display: flex; justify-content: center; padding-top: 10px;">
                <img src="{{ asset('frontend/images/Logo-For-QR.png') }}" alt="logo">
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>
@push('js')
    <script src="{{ asset('asset/print_this/printThis.js') }}"></script>
    <script>
        window.onload = function(e) {
            e.preventDefault();
            var body = $('.print_template').html();
            var header = $('.heading_area').html();
            $(body).printThis({
                debug: false,
                importCSS: true,
                importStyle: true,
                removeInline: false,
                printDelay: 800,
                header: null,
                footer: null,
            });
        };
    </script>
@endpush
