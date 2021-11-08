<!---Comapre Modal--->
<div class="modal fade" id="compareModal" tabindex="-1" aria-labelledby="queryModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl">
        <div class="modal-content">
            <input type="hidden" id="propSelected">
            <div class="modal-body p-0 compare-modal">
                <div class="p-3">
                    <h2 class="f-22 mb-4">Choose College</h2>
                    <!-- Actual search box -->
                    <div class="form-group has-icon">
                        <span class="fa fa-search form-control-icon"></span>
                        <input type="text" id="compareSearch" class="form-control" placeholder="Search College">
                    </div></div>
                <div class="bg-grey">

                    <div class="row py-3 px-5" id="compareListCollege">

                    </div>
                    <div class="row p-3 pb-4">
                        <div class="col">
                            <ul class="list-unstyled ver-line-menu float-end">
                                <li class="me-2"><button class="btn site-btn-4" data-bs-dismiss="modal" aria-label="Close"> close </button></li>
                                <li><button class="btn site-btn-1 btn-sm float-end" onclick="chooseProp()"> Save </button></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@section('script')
<script>
    var myModalEl = document.getElementById('compareModal')
    myModalEl.addEventListener('shown.bs.modal', function (event) {
        console.log(event);
        $("#propSelected").val("");
        $("#propSelected").val(event.relatedTarget.attributes[2].nodeValue);
        // do something...
    })
var selected = "";
$(document).ready(function(){
$.ajax({
    type: "GET",
    url: "{{route('search-college-api')}}",
    data: {'search': ""},
    success: function (data) {
        $("#compareListCollege").html("");
        for (var i = 0; i < data.length; i++) {
            $("#compareListCollege").append("<div class=\"col-md-6 custom-radio\">\n "+
            "<div class=\"row m-1 py-2 bg-white border-color col-list-card\" data-slug=\""+data[i].seo[0].permalink+"\">\n "+
            "<div class=\"col-2 text-center px-1\">\n" +
            "<span class=\"circle align-middle\">\n"+
            "<i class=\"fas fa-check-circle\"></i>\n"+
            "</span>\n"+
            "</div>\n"+
            "<div class=\"col-2 px-1\" for=\"flexRadioDefault1\">\n"+
            "<div class=\"logo position-relative\">\n"+
            "<div class=\"d-inline-block prop-logo\">\n"+
            "<img src=\"{{env('MEDIA_URL')}}property/"+data[i].id+"/logo/"+data[i].logo+"-md.webp\" class=\"p-2\" alt=\"\"> \n"+
            "</div></div></div><div class=\"col-7\" for=\"flexRadioDefault1\">\n"+
            "<div class=\"prop-info\">\n"+
            "<p class=\"f-14 pcolor mb-1 text-truncate\" style=\"max-width:300px;\">"+data[i].name+"</p>\n"+
            "<p class=\"f-12 mb-1\"><i class=\"fas fa-map-marker-alt\" aria-hidden=\"true\"></i> "+data[i].location.cities.name+", "+data[i].location.states.name+"</p>\n"+
            "<div class=\"row\"><div class=\"col-8\"><p class=\"f-14 pcolor mb-1 text-truncate\" style=\"max-width: 200px;\"> "+data[i].courses[0].streams[0].name+"</p><\/div><div class=\"col-4\"><p class=\"f-14 pcolor mb-1\"><i class=\"fas fa-rupee-sign\" aria-hidden=\"true\"></i> "+data[i].courses[0].price+"</p><\/div><\/div>\n"+
            "</div></div></div></div>");
            if(i > 4){
                break;
            }
        }
    }
});
});
$("#compareSearch").keyup(function () {
var text = $(this).val();
$.ajax({
    type: "GET",
    url: "{{str_replace('http','https',route('search-college-api'))}}",
    data: {'search': text},
    success: function (data) {
        $("#compareListCollege").html("");
        for (var i = 0; i < data.length; i++) {
            $("#compareListCollege").append("<div class=\"col-md-6 custom-radio\">\n "+
            "<div class=\"row m-1 py-2 bg-white border-color col-list-card\" data-slug=\""+data[i].seo[0].permalink+"\">\n "+
            "<div class=\"col-2 text-center px-1\">\n" +
            "<span class=\"circle align-middle\">\n"+
            "<i class=\"fas fa-check-circle\"></i>\n"+
            "</span>\n"+
            "</div>\n"+
            "<div class=\"col-2 px-1\" for=\"flexRadioDefault1\">\n"+
            "<div class=\"logo position-relative\">\n"+
            "<div class=\"d-inline-block prop-logo\">\n"+
            "<img src=\"{{env('MEDIA_URL')}}property/"+data[i].id+"/logo/"+data[i].logo+"-md.webp\" class=\"p-2\" alt=\"\"> \n"+
            "</div></div></div><div class=\"col-7\" for=\"flexRadioDefault1\">\n"+
            "<div class=\"prop-info\">\n"+
            "<p class=\"f-14 pcolor mb-1 text-truncate\" style=\"max-width:300px;\">"+data[i].name+"</p>\n"+
            "<p class=\"f-12 mb-1\"><i class=\"fas fa-map-marker-alt\" aria-hidden=\"true\"></i> "+data[i].location.cities.name+", "+data[i].location.states.name+"</p>\n"+
            "<div class=\"row\"><div class=\"col-8\"><p class=\"f-14 pcolor mb-1 text-truncate\" style=\"max-width: 200px;\"> "+data[i].courses[0].streams[0].name+"</p><\/div><div class=\"col-4\"><p class=\"f-14 pcolor mb-1\"><i class=\"fas fa-rupee-sign\" aria-hidden=\"true\"></i> "+data[i].courses[0].price+"</p><\/div><\/div>\n"+
            "</div></div></div></div>");
            // $("#compareListCollege").append("<div class=\"col-md-6 custom-radio\"><div class=\"row m-1 py-2 bg-white\"><div class=\"col-2 text-center px-1\"><input class=\"form-check-input\" type=\"radio\" name=\"flexRadioDefault\" value=\""+data[i].seo[0].permalink+"\" id=\"flexRadioDefault1\"><\/div><div class=\"col-2 px-1\" for=\"flexRadioDefault1\"><div class=\"logo position-relative\"><div class=\"d-inline-block prop-logo\"><img src=\"{{env('MEDIA_URL')}}property/"+data[i].id+"/logo/"+data[i].logo+"-md.webp\" class=\"p-2\" alt=\"\"><\/div><\/div><\/div><div class=\"col-7\" for=\"flexRadioDefault1\"><div class=\"prop-info\"><p class=\"f-14 pcolor mb-1 d-inline-block text-truncate\" style=\"max-width: 300px;\">"+data[i].name+"<\/p><p class=\"f-12 mb-1\"><i class=\"fas fa-map-marker-alt\" aria-hidden=\"true\"><\/i> "+data[i].location.cities.name+", "+data[i].location.states.name+"<\/p><div class=\"row\"><div class=\"col-8\"><p class=\"f-14 pcolor mb-1 text-truncate\" style=\"max-width: 200px;\"> "+data[i].courses[0].streams[0].name+"</p><\/div><div class=\"col-4\"><p class=\"f-14 pcolor mb-1\"><i class=\"fas fa-rupee-sign\" aria-hidden=\"true\"></i> "+data[i].courses[0].price+"</p><\/div><\/div><\/div><\/div><\/div><\/div>");
            if(text == "" && i > 4){
                break;
            }
        }
    }
});
});

$(document).on('click', '.col-list-card', function () {
$("#compareListCollege .col-list-card").removeClass("active")
$(this).addClass("active");
selected = "";
selected = $(this).data("slug");
// alert($(this).data("slug"));
});

function removeProp(id){
var url = window.location.href;
var split = url.split('-vs-');
split.splice(id,1);
window.location.href = split.join('-vs-');
}
function chooseProp(){
var prop = $('#propSelected').val();
if(selected != ""){
    window.location.href = "{{route('compare',['properties'=>null])}}/"+prop+"-vs-"+selected+"";
}
}
</script>
@endsection