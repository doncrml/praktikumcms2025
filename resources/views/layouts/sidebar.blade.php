<!-- Sidebar -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="/" class="app-brand-link">
      <span class="app-brand-logo">🚖</span>
      <span class="app-brand-text demo menu-text fw-bold">Ojek Online</span>
    </a>
  </div>

  <ul class="menu-inner py-1">
    <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
      <a href="/" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div>Dashboard</div>
      </a>
    </li>
    <li class="menu-item {{ request()->is('pengguna') ? 'active' : '' }}">
      <a href="/pengguna" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div>Data Pengguna</div>

   <li class="menu-item {{ request()->is('pengemudi') ? 'active' : '' }}">
     <a href="/pengemudi" class="menu-link">
        <i class="menu-icon tf-icons bx bx-car"></i>
        <div>Data Pengemudi</div>

  <li class="menu-item {{ request()->is('kendaraan') ? 'active' : '' }}">
     <a href="/kendaraan" class="menu-link">
        <i class="menu-icon tf-icons bx bx-car"></i>
        <div>Data kendaraan</div>

 <li class="menu-item {{ request()->is('rute') ? 'active' : '' }}">
     <a href="/rute" class="menu-link">
        <i class="menu-icon tf-icons bx bx-car"></i>
        <div>Data Rute</div>

 <li class="menu-item {{ request()->is('transaksi') ? 'active' : '' }}">
     <a href="/transaksi" class="menu-link">
        <i class="menu-icon tf-icons bx bx-car"></i>
        <div>Data transaksi</div>
      </a>
    </li>
  </ul>
</aside>
