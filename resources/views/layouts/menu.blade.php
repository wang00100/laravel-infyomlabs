<li class="side-menus {{ Request::is('home*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>统计面板</span>
    </a>
</li>

<li class="side-menus {{ Request::is('cats*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('cats.index') }}"><i class="fas fa-th-large"></i><span data-name="Cats" >分类</span></a>
</li>

<li class="side-menus {{ Request::is('staff*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('staff.index') }}"><i class="fas fa-user"></i><span data-name="Staff" >作者</span></a>
</li>

<li class="side-menus {{ Request::is('pros*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('pros.index') }}"><i class="fas fa-shopping-bag"></i><span data-name="Pros" >系列课程</span></a>
</li>

<li class="side-menus {{ Request::is('tags*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('tags.index') }}"><i class="fas fa-tag"></i><span data-name="Tags" >关键词</span></a>
</li>

<li class="side-menus {{ Request::is('chapters*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('chapters.index') }}"><i class="fas fa-file"></i><span data-name="Chapters" >章节</span></a>
</li>
