<header id="mainHead" class="navbar navbar-expand-lg navbar-dark bg-green" style="background-color: #25bb00;">
    <div class="container">
        <div class="d-flex align-items-end">
            <div class="text-center mr-3">
                <img src="{{ asset('logo_depati_aguung.png') }}" alt="" class="img-fluid" width="150">
            </div>
            <div class="header-text">
                <h4 class="text-light d-md-block d-none"> {{ __('Yayasan Pondok Pesantren Salafiyah') }}</h4>
                <h4 class="text-light d-md-block d-none">{{ __('DEPATI AGUNG') }}</h4>
                <a style="text-decoration: underline" href="https://maps.app.goo.gl/UhmFQ9JcG2ft8JCq8"
                    class="text-light"><small>Desa Pulau Raman, Muara Siau, Merangin Regency, Jambi 37371,
                        Indonesia.</small> </a>
            </div>
        </div>
    </div>
</header>
<nav id="mainNav" class="navbar navbar-expand-lg navbar-dark bg-green">
    <div class="container-lg">
        <a class="navbar-brand d-md-none" href="#">{{ __('YPPS DEPATI AGUNG') }}</a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item mx-lg-3 {{ Request::is('/*') ? 'active':'' }}">
                    <a class="nav-link" href="{{ route('home') }}">{{ __('Beranda') }}</a>
                </li>
                <li
                    class="nav-item dropdown mx-lg-3 {{ Request::is('profile/sambutan*','profile/identitas*', 'profile/struktural*','profile/sejarah*', 'profile/visi-misi*') ? 'active':'' }}">
                    <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">{{ __('Profile') }}</a>
                    <div class="dropdown-menu bg-green">
                        <a class="dropdown-item text-light {{ Request::is('profile/sambutan*') ? 'bg-dark': '' }}"
                            href="{{ route('sambutan') }}">{{ __('Kata Sambutan') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('profile/identitas*') ? 'bg-dark': '' }}"
                            href="{{ route('identitas') }}">{{ __('Identitas') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('profile/struktural*') ? 'bg-dark': '' }}"
                            href="{{ route('struktur') }}">
                            {{ __('Struktur Organisasi') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('profile/sejarah*') ? 'bg-dark': '' }}"
                            href="{{ route('sejarah') }}">{{ __('Sejarah') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('profile/visi-misi*') ? 'bg-dark': '' }}"
                            href="{{ route('visi') }}">{{ __('Visi & Misi') }}
                        </a>
                    </div>
                </li>
                <li class="nav-item mx-lg-3 {{ Request::is('berita*') ? 'active':'' }}">
                    <a class="nav-link" href="{{ route('posts') }}">{{ __('Berita') }}</a>
                </li>
                <li
                    class="nav-item dropdown mx-lg-3 {{ Request::is('akademik/kurikulum*', 'akademik/sarana-prasarana*','akademik/biografi*') ? 'active':'' }}">
                    <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">{{ __('Akademik') }}</a>
                    <div class="dropdown-menu bg-green">
                        <a class="dropdown-item text-light {{ Request::is('akademik/kurikulum*') ? 'bg-dark': '' }}"
                            href="{{ route('kurikulum') }}">{{ __('Kurikulum') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('akademik/sarana-prasarana*') ? 'bg-dark': '' }}"
                            href="{{ route('sarana') }}">
                            {{ __('Sarana Prasarana') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('akademik/biografi') ? 'bg-dark': '' }}"
                            href="{{ route('biografi') }}">{{ __('Biografi Guru') }}
                        </a>
                    </div>
                </li>
                <li
                    class="nav-item dropdown mx-lg-3 {{ Request::is('prestasi/akademik*', 'prestasi/nonakademik*', 'prestasi/santri*') ? 'active':'' }}">
                    <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">{{ __('Prestasi') }}</a>
                    <div class="dropdown-menu bg-green">
                        <a class="dropdown-item text-light {{ Request::is('prestasi/akademik') ? 'bg-dark': '' }}"
                            href="{{ route('akademik') }}">{{ __('Akademik') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('prestasi/nonakademik') ? 'bg-dark': '' }}"
                            href="{{ route('nonakademik') }}">
                            {{ __('Non Akademik') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('prestasi/santri') ? 'bg-dark': '' }}"
                            href="{{ route('students.prestasi') }}">
                            {{ __('Prestasi Santri') }}
                        </a>
                    </div>
                </li>
                <li
                    class="nav-item dropdown mx-lg-3 {{ Request::is('kesiswaan/ekstrakulikuler*', 'kesiswaan/album*', 'kesiswaan/persada') ? 'active':'' }}">
                    <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">{{ __('Kesiswaan') }}</a>
                    <div class="dropdown-menu bg-green">
                        <a class="dropdown-item text-light {{ Request::is('kesiswaan/ekstrakulikuler*') ? 'bg-dark': '' }}"
                            href="{{ route('lifeskill') }}">
                            {{ __('Ekstra Kulikuler') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('kesiswaan/persada') ? 'bg-dark': '' }}"
                            href="{{ route('persada') }}">
                            {{ __('Organinasasi Santri') }}
                        </a>
                        <a class="dropdown-item text-light {{ Request::is('kesiswaan/album') ? 'bg-dark': '' }}"
                            href="{{ route('album') }}">
                            {{ __('Album') }}
                        </a>
                    </div>
                </li>
                <li class="nav-item mx-lg-3">
                    <a class="nav-link" href="{{ route('ppdb.home') }}">{{ __('PPDB') }}</a>
                </li>
                @can('admin')
                <li class="nav-item mx-lg-3">
                    <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
                @endcan
                @can('user')
                <li class="nav-item mx-lg-3">
                    <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
                @endcan
                @can('siswa')
                <li class="nav-item mx-lg-3">
                    <a class="nav-link" href="{{ route('ppdb.profile') }}">{{ __('Data Pendaftaran') }}</a>
                </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>
<script>
    window.addEventListener('scroll', function() {
        var head = document.getElementById('mainHead');
        var nav = document.getElementById('mainNav');
        
        var headBounding = head.getBoundingClientRect();
        if (headBounding.bottom <= 0) {
            nav.classList.add('fixed-top');
        } else {
            nav.classList.remove('fixed-top');
        }
    });
</script>