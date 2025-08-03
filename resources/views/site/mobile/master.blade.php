<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow">

    @yield('head')

    <link rel="stylesheet" href="{{ url('assets/css/mobile-default.css') }}" type="text/css">
    <script type="text/javascript" src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/mobile-default.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/jquery.lazyload.min.js') }}"></script>
    <script>
        $(function() {
            $("img.lazyload").lazyload();
        })
    </script>

    <style>
        body {
            font-family: math;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <header>
                <h1 class="hidden">{{$settings['site_name']}}</h1>
                <div id="logo">
                    <div itemscope="" itemtype="https://schema.org/Organization" class="logoWrapper"><a itemprop="url"
                            href="/">
                            <img itemprop="logo"
                                src="{{ $settings['logo'] != '' ? sourceSetting($settings['logo']) ?? '/assets/img/logo.png' : '/assets/img/logo.png' }}"
                                width="200" height="30px" title="{{ $settings['site_name'] }}"
                                alt="{{ $settings['title'] }}"></a>
                    </div>
                </div>
            </header>

            <div id="primary-nav">
                @php
                    $icons = ['icon-thumbs-up', 'icon-verify', 'icon-eye-off', 'icon-hashtag', 'icon-views'];
                @endphp

                <ul class="menu">
                    {{-- Trang chủ --}}
                    <li>
                        <a href="{{ route('site.home') }}"
                            style="background: rgba(234, 67, 53, 0.6); color: rgb(218, 218, 218);">
                            <span class="icon icon-home">Trang chủ</span>
                        </a>
                    </li>

                    {{-- Loop genres --}}
                    @foreach ($genres as $genre)
                        @php
                            $icon = $icons[array_rand($icons)];
                        @endphp
                        <li>
                            <a title="{{ $genre->name }}" href="{{ route('site.genre', $genre->slug) }}">
                                <span class="icon {{ $icon }}">{{ $genre->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>


            <div style="background: #2b2b2b;font-size: 14px;line-height: 1.6;margin: 5px 5px 0 5px;padding: 5px;">
                Sử dụng app VPN <a href="https://1.1.1.1" target="_blank" rel="noopener noreferrer">
                    <font color="#db4437">1.1.1.1</font>
                </a> (<a href="https://1.1.1.1" target="_blank" rel="noopener noreferrer">
                    <font color="#f90">tải về</font>
                </a>) để truy cập <font color="#db4437">{{ $settings['site_name'] ?? 'MESEX' }}</font> trong trường hợp
                web bị chặn.
            </div>

            <div id="search-box">
                <form class="search" method="get">
                    <span class="icon-search"></span>
                    <input type="text" placeholder="Thể loại, diễn viên, code,..."
                        onfocus="if (this.value == 'Thể loại, diễn viên, code,...') {this.value = '';}"
                        onblur="if (this.value == '') {this.placeholder = 'Thể loại, diễn viên, code,...';}"
                        class="searchTxt">
                    <input type="submit" value="Tìm kiếm" class="searchBtn">
                </form>
            </div>
            <div id="vl-header-adx">

            </div>
        </div>

        @yield('main')

        <div id="footer">
            <footer>
                <div class="web-link">
                    <h2 id="page-title" class="breadcrumb">Liên kết</h2>

                    @if (isset($textLinks) && count($textLinks) > 0)
                        @foreach ($textLinks as $textLink)
                            <a title="Xvideo" title="{{ $textLink->title }}" href="{{ $textLink->link }}"
                                target="_blank"><span class="icon icon-xvideos">{{ $textLink->title }}</span></a>
                        @endforeach
                    @endif

                </div>

                <div class="search-history">
                    <h2 id="page-title" class="breadcrumb">Top tìm kiếm</h2>

                    <a href="/search/khong-che/" title="Khong Che">Khong Che</a>
                    @foreach ($topSearches as $search)
                        <a href="{{ route('site.search', ['keyword' => Str::slug($search->keyword)]) }}"
                            title="{{ $search->keyword }}">
                            {{ $search->keyword }}
                        </a>
                    @endforeach
                </div>

                <div class="footer-wrap">
                    <p>{{ $settings['site_name'] }} là web xem <a title="phim sex" href="{{ url('/') }}"><span
                                class="url">phim
                                sex</span></a> dành cho người lớn trên 19 tuổi, giúp bạn giải trí, thỏa mãn sinh lý,
                        dưới 19 tuổi xin vui lòng quay ra.</p>
                    <p>Trang web này không đăng tải clip sex Việt Nam, video sex trẻ em. Nội dung phim được dàn dựng từ
                        trước, hoàn toàn không có thật, người xem tuyệt đối không bắt chước hành động trong phim, tránh
                        vi phạm pháp luật.</p>
                    <p></p>
                    <div style="font-size: 12px;color: #dadada;opacity: .8;">
                        <p>© 2023 Mesex.tv</p>
                    </div>
                    <p></p>
                </div>
            </footer>
        </div>

    </div>


    <a onclick="oc()" id="bb0"
        href="https://vu88.com/khuyen-mai/the-loai/thuong-nap/?a=d4b23fc5e3051429c8baa64a9038a523&amp;utm_source=vlxxmoe&amp;utm_medium=popunder1&amp;utm_campaign=cpd&amp;utm_term=sex"
        style="opacity:0; width:1px; height: 1px;" target="_blank" rel="nofollow" data-wpel-link="external">X</a>
</body>

</html>
