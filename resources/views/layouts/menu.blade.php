@if(auth() -> user() -> level == 'siswa' || auth() -> user() -> level == 'guru')
<a href="/dashboard" class="nav_link"> 
    <i class='bx bxs-dashboard nav_icon'></i> 
    <span class="nav_name">Dashboard</span> 
</a>
@endif

@if(auth() -> user() -> level == 'siswa')
<a href="/statistik" class="nav_link"> 
    <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
    <span class="nav_name">Statistika</span> 
</a>

<a href="/kategori" class="nav_link"> 
    <i class='bx bxs-category-alt nav_icon' size='lg'></i> 
    <span class="nav_name">Pelanggaran</span> 
</a>

<a href="/pelanggaran" class="nav_link"> 
    <i class='bx bx-receipt nav_icon' size='lg'></i> 
    <span class="nav_name">Kategori</span> 
</a>
@endif

@if(auth() -> user() -> level == 'guru')
<a href="/input-pelanggaran" class="nav_link"> 
    <i class='bx bx-check-circle nav_icon'></i> 
    <span class="nav_name">Input Pelanggaran</span> 
</a>
@endif