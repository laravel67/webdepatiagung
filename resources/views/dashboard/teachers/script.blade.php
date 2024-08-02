@push('js')
    <script src="{{ asset('backend/js/select2.min.js') }}"></script>
    <script>
        // Sluggble
        const name=document.querySelector('#name');
        const slug=document.querySelector('#slug');
        name.addEventListener('keyup', function(){
        fetch('/mapels/slug?name=' +name.value)
        .then(response=> response.json())
        .then(data=> slug.value=data.slug)
        })
        // Preview Image
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
        // Select 2
        $(document).ready(function() {
        $('.mapels').select2();
        });
    </script>
@endpush