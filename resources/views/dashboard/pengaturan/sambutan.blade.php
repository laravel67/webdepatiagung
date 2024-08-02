<form class="mt-3" action="{{ route('pengaturan.sambutan') }}" method="post" enctype="multipart/form-data">
    @csrf
    <x-input-text-area name="body" :value="old('body', $sambutan ? $sambutan->body : '')">
        {{ __('Tulis Sambutan Pimpinan PPS Depati Agung') }}
    </x-input-text-area>

    <x-input type="file" name="image" onchange="previewImage()" accept="image/*">
        {{ __('Foto/Gambar') }}
    </x-input>
    <x-btn-form></x-btn-form>
    <img id="previewContainer" class="mt-3 img-fluid" width="300"
        src="{{ $sambutan && $sambutan->image ? asset('storage/'.$sambutan->image) : '' }}">
</form>

@push('js')
<script>   
    function previewImage(){
        const image=document.querySelector('#image');
        const imgPreview=document.querySelector('#previewContainer');
        imgPreview.style.display='block';
        const oFReader= new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload=function(oFREvent){
            imgPreview.src=oFREvent.target.result;
        }
    }
</script>
@endpush