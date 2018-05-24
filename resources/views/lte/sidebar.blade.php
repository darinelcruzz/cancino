<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENÚ</li>

      @if (auth()->user()->level == 1)
          @each('lte.items', trans('menus/one'), 'item')
      @elseif (auth()->user()->level == 4)
          @each('lte.items', trans('menus/five'), 'item')
      @endif

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
