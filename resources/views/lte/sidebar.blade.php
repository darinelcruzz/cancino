<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÚ</li>
            @if (auth()->user()->username == 'admin')
                @each('lte.items', trans('menus/admin'), 'item')
            @elseif (auth()->user()->level == 1)
                @each('lte.items', trans('menus/one'), 'item')
            @elseif (auth()->user()->level == 2)
                @each('lte.items', trans('menus/two'), 'item')
            @elseif (auth()->user()->level == 3)
                @each('lte.items', trans('menus/three'), 'item')
            @elseif (auth()->user()->level == 4)
                @each('lte.items', trans('menus/four'), 'item')
            @elseif (auth()->user()->isHelper)
                @each('lte.items', trans('menus/fivegeneral'), 'item')
            @elseif (auth()->user()->level == 5)
                @each('lte.items', trans('menus/five'), 'item')
            @elseif (auth()->user()->level == 6)
                @each('lte.items', trans('menus/six'), 'item')
            @elseif (auth()->user()->level == 7)
                @each('lte.items', trans('menus/seven'), 'item')
            @endif
        </ul>
    </section>
</aside>
