<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-tachometer'></i> <span>Overview</span></a></li>
            <li><a href="/calls"><i class='fa fa-phone'></i> <span>Calls</span></a></li>
	    <li><a href="/contacts"><i class='fa fa-users'></i> <span>Contacts</span></a></li>
	    <li><a href="/addContact"><i class="fa fa-volume-control-phone"></i><span>Add Contact</span></a></li>
	    <li><a href="/lastCall"><i class="fa fa-bullhorn"></i><span>Last Call</a></li>	    
            </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
