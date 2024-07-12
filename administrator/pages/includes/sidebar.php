<aside id="leftsidebar" class="sidebar">
	<!-- Menu -->
	<div class="menu">
		<ul class="list">
			<li class="header">MENU UTAMA</li>
			<li <?php if($page == "dashboard") echo ("class='active'"); ?>>
				<a href="../../module=dashboard">
					<i class="material-icons">dashboard</i>
					<span>Dashboard</span>
				</a>
			</li>
			<li <?php if($page == "profil-bpbd" || $page == "profil-pejabat" || $page == "visi-misi" || $page == "kontak" || $page == "struktur-organisasi") echo ("class='active'"); ?>>
				<a href="javascript:void(0);" class="menu-toggle">
					<i class="material-icons">view_list</i>
					<span>Data Informasi</span>
				</a>
				<ul class="ml-menu">
					<li <?php if($page == "profil-bpbd") echo ("class='active'"); ?>>
						<a href="../../pages/profil/module=profil-bpbd">
							<span>Profil BPBD</span>
						</a>
					</li>
					<li <?php if($page == "profil-pejabat") echo ("class='active'"); ?>>
						<a href="../../pages/profil/module=profil-pejabat">
							<span>Profil Pejabat</span>
						</a>
					</li>
					<li <?php if($page == "struktur-organisasi") echo ("class='active'"); ?>>
						<a href="../../pages/struktur/module=struktur-organisasi">
							<span>Struktur Organisasi</span>
						</a>
					</li>
					<li <?php if($page == "visi-misi") echo ("class='active'"); ?>>
						<a href="../../pages/visi-misi/module=visi-misi">
							<span>Visi & Misi</span>
						</a>
					</li>
					<li <?php if($page == "kontak") echo ("class='active'"); ?>>
						<a href="../../pages/kontak/module=kontak-kami">
							<span>Kontak</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="header">URUSAN</li>
			<li <?php if($page == "kebencanaan") echo ("class='active'"); ?>>
				<a href="../../pages/bencana/module=kebencanaan">
					<i class="material-icons">book</i>
					<span>Data Kebencanaan</span>
				</a>
			</li>
			<li <?php if($page == "edukasi") echo ("class='active'"); ?>>
				<a href="../../pages/edukasi/module=edukasi-bencana">
					<i class="material-icons">tv</i>
					<span>Data Edukasi Bencana</span>
				</a>
			</li>
			<li <?php if($page == "berita") echo ("class='active'"); ?>>
				<a href="../../pages/berita/module=berita">
					<i class="material-icons">date_range</i>
					<span>Data Berita</span>
				</a>
			</li>
			<li class="header">LAINNYA</li>
			<li <?php if($page == "jenis-bencana") echo ("class='active'"); ?>>
				<a href="../../pages/jenis/module=jenis-bencana">
					<i class="material-icons">layers</i>
					<span>Jenis Bencana</span>
				</a>
			</li>
			<li <?php if($page == "jabatan") echo ("class='active'"); ?>>
				<a href="../../pages/jabatan/module=jabatan">
					<i class="material-icons">group</i>
					<span>Jabatan</span>
				</a>
			</li>
			<li <?php if($page == "kategori") echo ("class='active'"); ?>>
				<a href="../../pages/kategori/module=kategori">
					<i class="material-icons">chrome_reader_mode</i>
					<span>Kategori</span>
				</a>
			</li>
			<li <?php if($page == "tahun") echo ("class='active'"); ?>>
				<a href="../../pages/tahun/module=tahun">
					<i class="material-icons">event</i>
					<span>Tahun</span>
				</a>
			</li>
			<li>
				<a href="pages/jabatan/module=jabatan">
					<i class="material-icons">directions_walk</i>
					<span>Jabatan</span>
		</ul>
	</div>
	<!-- #Menu -->
	<!-- Footer -->
	<div class="legal">
		<div class="copyright">
			&copy; 2024 <a href="javascript:void(0);">Database BPBD Kota Tasikmalaya</a>.
		</div>
	</div>
	<!-- #Footer -->
</aside>