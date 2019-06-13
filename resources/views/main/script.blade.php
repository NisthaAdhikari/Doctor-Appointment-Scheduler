
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>



<!--  <script type="text/javascript" src="{{ asset('public/nepalidatepicker/nepali.datepicker.v2.2.min.js') }}"></script> -->

<script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/summernote.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>




<script type="text/javascript">
    $(function () {   //changging status
       

        /*customer search */
        var infoDiv   = $('.infoDiv');
        var changeStatus = $('.changeStatus');
        changeStatus.on('click', function(e){
           e.preventDefault();
           var status = $(this).data('status');
           var url    = $(this).data('url');
           var id     = $(this).data('id');
           console.log(url);
           var data = {id:id, status:status};
           if (confirm("Are you sure you want to change status")) {
           $.ajax({
                'type' : 'GET',
                'url'  : url,
                'data' : data,
                 dataType: 'json',
                success:function(response){
                 infoDiv.addClass('alert alert-success').append(response.message);
                  setTimeout(location.reload.bind(location), 1500);
                }
           }).fail(function (response){
            alert(response.message);
           });
         }
         return false;
        });
        /*deleting cde*/
        $(".deleteMe").click(function(e) {
            var url = $(this).data('url');
            var name = $(this).data('name');
            var infoDiv   = $('.infoDiv');
          if (confirm("Are you sure you want to  delete  " + name +'?')) {
            $.ajax({
                    'type' : "GET",
                    'url'  : url,
                    success:function(response){
                      console.log(response.message);
                      if (response.success == true) {
                         infoDiv.addClass('alert alert-success').append(response.message);
                      }else{
                        infoDiv.addClass('alert alert-danger').append(response.message);
                      }
                     setTimeout(location.reload.bind(location), 1500);
                    }
                });
            }
            return false;
            e.preventDefault();
        });
       $('.client-info').fadeOut('3000');
       

       //select two
       // $('.sysSelect2').select2();
       // $('.select2Tbl').select2();
       
       //input place holder
       $('input').focus(function(){
         placeholder = $(this).attr('placeholder');
         if(placeholder != undefined){
           $(this).parent().prepend('<span class="input-placeholder">'+placeholder+'</span>');
         }
       });
       $('input').blur(function(){
         $(this).parent().find('.input-placeholder').remove();
       });

       //dats table formating
       $('#example1').DataTable({
         dom: 'frt',
       });

       $('#example1 tr').click(function(){
        $(this).toggleClass('changeTableRow');
       });
    });// closing

      function displayImage(input, divId, append=false){
        var divId = divId,
            _btn = '<button type="button" id="deleteButton" class="btn btn-danger" onclick="removeImage()"><span class="glyphicon glyphicon-trash"></button>';

         if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+divId)
                    .attr('src', e.target.result).css('width','150px');
            };
            reader.readAsDataURL(input.files[0]);

          if(append) {
              // $('#image').after(_btn);
              $('.imageSection').html(_btn);
          }
        }
      }

    $(document).on("click", "#deleteButton", function(){
        //wheretobuy
        $('#imageUpload').val("");
        $('#imageUpload1').val("");
        $('#imageUpload2').val("");
        $('#image').attr('src',"").css('width','0px');
        $('#image1').attr('src',"").css('width','0px');
        $('.imageSection').html("");
        // $('.dlt').html("");

        //product
        $('#colorImage').attr('src',"").css('width','0px');
        $('#colorImage1').attr('src',"").css('width','0px');
    });

      // function removeImage() {
      //     alert();
      //
      // }

      function goBack() {
           window.history.go(0);
      }

      $('.summernote').summernote({
                         height: 200,
                         toolbar: [
                         ['style', ['style']],
                         ['font', ['bold', 'italic', 'underline', 'clear']],
                         ['fontname', ['fontname']],
                         ['color', ['color']],
                         ['para', ['ul', 'ol', 'paragraph']],
                         ['height', ['height']],
                         ['table', ['table']],
                         ['insert', ['link', 'picture', 'hr']],
                         ['view', ['fullscreen', 'codeview', 'help']]
                       ]
                     });
</script>
