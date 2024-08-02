<x-main>
   <div class="row">
        <div class="col-md-7">
            <h6 class="border-bottom"><i class="fa-solid fa-pen"></i> Buat Pengguna Baru</h6>
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <x-input name="name" type="text">{{ __('Nama Lengkap') }}</x-input>
                <x-input name="username" type="text">{{ __('Username') }}</x-input>
                <x-input name="email" type="email">{{ __('Alamat Email') }}</x-input>
                <x-input name="phone" type="text">{{ __('Kontak/Telpone') }}</x-input>
                <x-input-select name="role" :defaultOptions="[
                            ['value' => 'admin', 'label' => 'Administrator'],
                            ['value' => 'user', 'label' => 'User'],
                        ]">{{ __('Role') }}
                </x-input-select>
                <x-btn-form/>
            </form>
        </div>
        <x-image-draw/>
        @include('dashboard.saranas.script')
    </div> 
</x-main>