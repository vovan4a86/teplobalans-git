<!DOCTYPE html>
<html lang="ru-RU">

@include('blocks.head')

<body class="no-scroll">
@if(isset($h1))
    <h1 class="v-hidden">{{ $h1 }}</h1>
@endif
<div class="preloader">
    <div class="preloader__loader"></div>
    <script type="text/javascript">
        window.addEventListener('load', () => {document.querySelector('body').classList.remove('no-scroll');document.querySelector('.preloader').classList.add('unactive')});
    </script>
</div>

{!! Settings::get('counters') !!}

@include('blocks.header')
@include('blocks.mob_nav')

<main>
    @yield('content')
</main>

@include('blocks.footer')
@include('blocks.mobile')
@include('blocks.popups')

<div class="v-hidden" id="company" itemprop="branchOf" itemscope itemtype="https://schema.org/Corporation"
     aria-hidden="true" tabindex="-1">
    {!! Settings::get('schema.org') !!}
</div>

@if(isset($admin_edit_link) && strlen($admin_edit_link))
    <div class="adminedit">
        <div class="adminedit__ico"></div>
        <a href="{{ $admin_edit_link }}" class="adminedit__name" target="_blank">Редактировать</a>
    </div>
@endif
</body>
</html>
