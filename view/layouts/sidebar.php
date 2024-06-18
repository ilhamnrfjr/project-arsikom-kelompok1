<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= url('') ?>">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-user-secret"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Administrator</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="<?= url('') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<li class="nav-item">
    <a class="nav-link" href="<?= url('mahasiswa') ?>">
        <i class="fas fa-fw fa-graduation-cap"></i>
        <span>Mahasiswa</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= url('dosen') ?> ">
        <i class="fas fa-fw fa-user"></i>
        <span>Dosen</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= url('matkul')?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Matkul</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?= url('jadwal')?>">
        <i class="fas fa-fw fa-list"></i>
        <span>Jadwal</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>