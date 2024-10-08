<!doctype html>
<html @php(language_attributes())>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @php(do_action('get_header'))
        @php(wp_head())
    </head>

    <body @php(body_class())>
        @php(wp_body_open())

        <div id="app">
            <a class="sr-only focus:not-sr-only" href="#main">
                {{ __('Skip to content') }}
            </a>

            @include('navigation.header.standard', [
                'header' => $header,
            ])

            <main id="main" class="main">
                @yield('content')
            </main>

            @include('sections.footer')

            <div data-modal-portal>

            </div>
        </div>

        @php(do_action('get_footer'))
        @php(wp_footer())
    </body>
</html>
