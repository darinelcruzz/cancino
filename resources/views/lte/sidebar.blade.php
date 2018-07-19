<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÚ</li>
            @if (auth()->user()->username == 'cheko')
                @each('lte.items', trans('menus/sergio'), 'item')
            @elseif (auth()->user()->username == 'admin')
                @each('lte.items', trans('menus/admin'), 'item')
            @elseif (auth()->user()->level == 1)
                @each('lte.items', trans('menus/one'), 'item')
            @elseif (auth()->user()->level == 2)
                @each('lte.items', trans('menus/two'), 'item')
            @elseif (auth()->user()->level == 4)
                @each('lte.items', trans('menus/four'), 'item')
            @elseif (auth()->user()->level == 5)
                @each('lte.items', trans('menus/five'), 'item')
            @endif
        </ul>
    </section>
</aside>
