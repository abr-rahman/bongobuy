<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@props(['title' => null])

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <title>{{ $title === null ? config('app.name') : $title . ' | ' . config('app.name') }}</title> --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('uploads/logo/fave-logo.jpg.png') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    {{--
    <link rel="stylesheet" href="/asset/plugins/daterangepicker/daterangepicker.css"> --}}
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/toastr/toastr.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
    @stack('css')

    @vite(['resources/css/app.css'])

    <link rel="stylesheet" href="{{ asset('asset/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">

    <link rel="stylesheet" href="{{ asset('asset/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <style>
        .select2-container .select2-selection--single {
            height: 35px;
            padding: 5px;
        }
        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da;
        }
        .tox-statusbar {
            display: none !important;
        }
        .card-body {
            background: #f1f1f1 !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            border: 1px solid #645d5d;
            border-radius: 4px !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
            color: #000 !important;
        }
        .select2-container--default .select2-search--inline .select2-search__field {
           display: none !important;
        }
        .tox-tinymce {
            height: 78vh !important;
            font-size: 11px !important;
        }

        .tox-notification.tox-notification--in.tox-notification--warning {
            display: none !important;
        }
        .jconfirm .jconfirm-box .jconfirm-buttons button.btn-default {
            background-color: #1ba552 !important;
            float: inline-end !important;
            color: #fff !important;
        }
        .brand-color{
            color: #ff9900 !important;
        }

        .ck-content .image-inline {
            margin: 0 4px;
            vertical-align: middle;
            border-radius: 12px;
        }
        .ck-content .image-inline img {
            width: 24px;
            max-height: 24px;
            min-height: 24px;
            filter: grayscale(100%);
        }

        /* Defining the custom content styles for the images
        placed on the side of the editing area. */
        .ck-content .image.image-side {
            float: right;
            margin-right: -200px;
            margin-left: 50px;
            margin-top: -50px;
        }
        .ck-content .image.image-side img {
            width: 360px;
            height: 360px;
        }

        /* Defining the custom content styles for the images
        placed on the editor margins. */
        .ck-content .image-inline.image-margin-left,
        .ck-content .image-inline.image-margin-right {
            position: absolute;
            margin: 0;
            top: auto;
        }
        .ck-content .image-inline.image-margin-left {
            left: calc( -12.5% - var(--icon-size) / 2 );
        }
        .ck-content .image-inline.image-margin-right {
            right: calc( -12.5% - var(--icon-size) / 2 );
        }
        .ck-content .image-inline.image-margin-left img,
        .ck-content .image-inline.image-margin-right img {
            filter: none;
        }

        /* Defining the custom content styles for the image captions. */
        .ck-content .image > figcaption {
            z-index: 1;
            position: absolute;
            bottom: 20px;
            left: -20px;
            font-style: italic;
            border-radius: 41px;
            background-color: #ffffffe8;
            color: #1138b0;
            padding: 5px 12px;
            font-size: 13px;
            box-shadow: 0 0 18px #1a1a1a26
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200;300;400;500;600;700&display=swap">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts._nav')
        @include('layouts._left-sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="py-2">
                    @yield('section')
                    {{-- {{ $slot }} --}}
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        @include('layouts._footer')
        @include('layouts._right-sidebar')

        <form id="deleted_form" method="post">
            @csrf
            @method('DELETE')
        </form>
        <div class="modal fade" tabindex="-1" id="modal"></div>

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('layouts._javascript')
    @stack('js')
    @stack('datatable')
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector('#editor'),{
            ckfinder: {
                uploadUrl: '{{route('admin.ck-editor-image.upload').'?_token='.csrf_token()}}',
            }
        })
        .catch( error => { } );
        ClassicEditor
        .create( document.querySelector('#editor'), {
        image: {
        styles: {
            options: [ {
                name: 'side',
                icon: sideIcon,
                title: 'Side image',
                className: 'image-side',
                modelElements: [ 'imageBlock' ]
            }, {
                name: 'margin-left',
                icon: leftIcon,
                title: 'Image on left margin',
                className: 'image-margin-left',
                modelElements: [ 'imageInline' ]
            }, {
                name: 'margin-right',
                icon: rightIcon,
                title: 'Image on right margin',
                className: 'image-margin-right',
                modelElements: [ 'imageInline' ]
            },
            {
                name: 'inline',
                icon: inlineIcon
            }, {
                name: 'block',
                title: 'Centered image',
                icon: centerIcon
            } ]
        },
        toolbar: [ {
            name: 'imageStyle:icons',
            title: 'Alignment',
            items: [
                'imageStyle:margin-left',
                'imageStyle:margin-right',
                'imageStyle:inline'
            ],
            defaultItem: 'imageStyle:margin-left'
        }, {
            name: 'imageStyle:pictures',
            title: 'Style',
            items: [ 'imageStyle:block', 'imageStyle:side' ],
            defaultItem: 'imageStyle:block'
        }, '|', 'toggleImageCaption', 'linkImage'
        ]
            }
        } )
        .then( /* ... */ )
        .catch( /* ... */ );

        // document.querySelectorAll('.editor').forEach(function(element) {
        //     ClassicEditor
        //         .create(element, {
        //             ckfinder: {
        //                 uploadUrl: '{{ route('admin.ck-editor-image.upload') . '?_token=' . csrf_token() }}',
        //             },
        //             image: {
        //                 styles: {
        //                     options: [{
        //                             name: 'side',
        //                             icon: sideIcon,
        //                             title: 'Side image',
        //                             className: 'image-side',
        //                             modelElements: ['imageBlock']
        //                         },
        //                         {
        //                             name: 'margin-left',
        //                             icon: leftIcon,
        //                             title: 'Image on left margin',
        //                             className: 'image-margin-left',
        //                             modelElements: ['imageInline']
        //                         },
        //                         {
        //                             name: 'margin-right',
        //                             icon: rightIcon,
        //                             title: 'Image on right margin',
        //                             className: 'image-margin-right',
        //                             modelElements: ['imageInline']
        //                         },
        //                         {
        //                             name: 'inline',
        //                             icon: inlineIcon
        //                         },
        //                         {
        //                             name: 'block',
        //                             title: 'Centered image',
        //                             icon: centerIcon
        //                         }
        //                     ]
        //                 },
        //                 toolbar: [{
        //                         name: 'imageStyle:icons',
        //                         title: 'Alignment',
        //                         items: [
        //                             'imageStyle:margin-left',
        //                             'imageStyle:margin-right',
        //                             'imageStyle:inline'
        //                         ],
        //                         defaultItem: 'imageStyle:margin-left'
        //                     },
        //                     {
        //                         name: 'imageStyle:pictures',
        //                         title: 'Style',
        //                         items: ['imageStyle:block', 'imageStyle:side'],
        //                         defaultItem: 'imageStyle:block'
        //                     },
        //                     '|',
        //                     'toggleImageCaption',
        //                     'linkImage'
        //                 ]
        //             }
        //         })
        //         .then(/* ... */)
        //         .catch(/* ... */);
        // });

    </script>

</body>

</html>
