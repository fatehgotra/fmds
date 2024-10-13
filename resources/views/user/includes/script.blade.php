<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places&callback=Function.prototype"></script><script>
    $(document).ready(function(){
        $('.showhide').click(function(){
            $('.showhide').show();
            $(this).hide();
        });

        $('.datepicker').datepicker({
            format:'dd/mm/yyyy'
        });
        
        setTimeout(() =>{
        $('select option').each((function(s){
            
            let v = $(this).parent().attr('value');
             
            if($(this).attr('value') == v && v) {
                $(this).attr('selected',true);
            }

            // if( $(this).parent().attr('data-toggle') == 'select2'){
            //     console.log($(this).parent());
            //     $(this).parent().select2('val',v);
            // }
        }))
    },500);

    $('.enable_toggle').on('change',function(e){
        if( !$(this).prop('checked') ){
      
          $('.team_enable').find('input[type="checkbox"]').prop('checked',false);
          $('.team_enable').hide();

        }
       else{
        $('.team_enable').removeClass('hidden');
          $('.team_enable').show();
       }
       
    });

     $('.mention').on('click',function(e){
        $('.unreadb').removeClass('mactive');
        $('.mention').addClass('mactive');
        $('.notification-list').find('.notify-item').not('.mnotice').addClass('hidden');
     });

     $('.unreadb').on('click',function(e){
        $('.mention').removeClass('mactive');
        $('.unreadb').addClass('mactive');
        $('.notification-list').find('.notify-item').not('.mnotice').removeClass('hidden');
     });

     $('.mcheck').on('change',function(e){
        if( $(this).prop('checked') ){
            $('.ncheck').prop('checked',true);
        } else{
            $('.ncheck').prop('checked',false);
        }
     });
    });

  

    function popModal(type,msg){
      jQuery(`#${type}-modal`).find('.fw-light').html(msg)
      jQuery(`#${type}-modal`).modal('show');
    }

    </script>
<script>
    $(".alert-dismissible").fadeTo(6000, 500).slideUp(500, function() {
        $(".alert-dismissible").slideUp(500);
    });
</script>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    
</script>
@stack('scripts')
<!-- demo app -->
{{-- <script src="{{ asset('assets/js/pages/demo.dashboard.js') }}"></script> --}}

<script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea#editor',
        height: 300,
        menubar: true,
        plugins: "advlist lists anchor autolink emoticons wordcount table image code",
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | emoticons | table | tableofcontents | link image | code',
        content_style: 'body { font-size: 0.9rem; font-weight: 400; line-height: 1.5; color:#6c757d }',

        image_title: true,
  /* enable automatic uploads of images represented by blob or data URIs*/
  automatic_uploads: true,
  /*
    URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
    images_upload_url: 'postAcceptor.php',
    here we add custom filepicker only to Image dialog
  */
  file_picker_types: 'image',
  /* and here's our custom image picker*/
  file_picker_callback: (cb, value, meta) => {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.addEventListener('change', (e) => {
      const file = e.target.files[0];

      const reader = new FileReader();
      reader.addEventListener('load', () => {
        /*
          Note: Now we need to register the blob in TinyMCEs image blob
          registry. In the next release this part hopefully won't be
          necessary, as we are looking to handle it internally.
        */
        const id = 'blobid' + (new Date()).getTime();
        const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        const base64 = reader.result.split(',')[1];
        const blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        /* call the callback and populate the Title field with the file name */
        cb(blobInfo.blobUri(), { title: file.name });
      });
      reader.readAsDataURL(file);
    });

    input.click();
  },
    });
</script>

<script>
    function initialize() {
  var input = document.getElementById('autocomplete');
  new google.maps.places.Autocomplete(input);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>