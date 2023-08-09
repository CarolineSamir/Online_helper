<!--notification js -->
<script src="{{asset('public/syndron')}}/plugins/notifications/js/lobibox.min.js"></script>
<script src="{{asset('public/syndron')}}/plugins/notifications/js/notifications.min.js"></script>
<script src="{{asset('public/syndron')}}/plugins/notifications/js/notification-custom-script.js"></script>
<!--app JS-->
<script>


    window.onload = function() {
        @if(session('error'))
            error("{!! session('error') !!}");
        @endif

        @if(session('success'))
            success("{!! session('success') !!}");
        @endif

        @if(session('info'))
            info("{!! session('info') !!}");
        @endif

        @if(session('info'))
            defaults("{!! session('info') !!}");
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                error("{{$error}}");
            @endforeach
        @endif
    };


    function error(msg) {
        Lobibox.notify('error', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'right button',
            showClass: 'rollIn',
            hideClass: 'rollOut',
            icon: 'bx bx-x-circle',
            img: '{{asset('public/syndron/images/bots/bot-red.png')}}',
            size: 'mini',
            msg: msg
        });
    }

    function success(msg) {
        Lobibox.notify('success', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'right button',
            showClass: 'rollIn',
            hideClass: 'rollOut',
            icon: 'bx bx-check-circle',
            img: '{{asset('public/syndron/images/bots/bot-green.png')}}',
            size: 'mini',
            msg: msg
        });
    }

    function info(msg) {
        Lobibox.notify('info', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'right button',
            showClass: 'rollIn',
            hideClass: 'rollOut',
            icon: 'bx bx-info-circle',
            size: 'mini',
            msg: msg
        });
    }

    function defaults(msg) {
        Lobibox.notify('default', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'right button',
            showClass: 'rollIn',
            hideClass: 'rollOut',
            size: 'mini',
            msg: msg
        });
    }




</script>
