<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="langDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        @switch(session()->get('locale'))
        @case('en')
        <img src="{{ asset('storage/lang_en.png') }}" alt="en" style="width: 20px;height:13px" />
        @break
        @case('fr')
        <img src="{{ asset('storage/lang_fr.png') }}" alt="fr" style="width: 20px;height:13px" />
        @break
        @default
        <img src="{{ asset('storage/lang_en.png') }}" alt="en" style="width: 20px;height:13px" />
        @endswitch

    </a>
    <ul class="dropdown-menu" aria-labelledby="langDropdown">
        <li><a class="dropdown-item" href="/change-locale/fr"><img src="{{ asset('storage/lang_fr.png') }}" alt="fr" />
                Français</a></li>
        <li><a class="dropdown-item" href="/change-locale/en"><img src="{{ asset('storage/lang_en.png') }}" alt="en" />
                English</a></li>
    </ul>
</li>