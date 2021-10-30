  $(document).ready(function(){

        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
            return false;
        };

        if(getUrlParameter('compare1') != "") {
            var name =  $(".collegename").find("td:eq(0)");
            var aff =  $(".affiliate").find("td:eq(0)");
            var address =  $(".address").find("td:eq(0)");
            var state =  $(".state").find("td:eq(0)");
            var city =  $(".city").find("td:eq(0)");
            var course =  $(".course").find("td:eq(0)");
            var button =  $(".buttontr").find("td:eq(0)");
            $.ajax({
                type: "GET",
                url: "/get_college_details",
                data: "id=" + getUrlParameter('compare1'),
                async: false,
                success: function (response) {
                    $("#compareoneDIV").addClass('d-none');
                    // $("#table-compareone").html("");
                    // var verified = "Not Verified";
                    // if (response[0].verified == 1) {
                    //     verified = "Verified";
                    // }
                    var featured = "";
                    var review = 0;
                    if(response[0].featured == 1){
                        featured = "<div class=\"ribbon\"><span>featured</span></div>";
                    }
                    if(response[0].reviews != null){
                        review = response[0].reviews;
                    }
                    $("#compareOneShow").html("  <div class=\"college-info-1\">\n" +
                        "                                <div class=\"cover-img position-relative box\" style=\"background:url('/property/"+response[0].id+"/gallery/featured/"+response[0].image[0].featured+"');background-size:cover;\">\n" +
                        "                                   "+featured+" <a href=\"/college-in-"+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+"\"><div class=\"college-info-logo position-absolute bottom-0 start-0 px-2 pb-1 m-2\"><img src=\"/property/"+response[0].id+"/logo/"+response[0].logo+"\" alt=\"\"></div>\n" +
                        "                                    </a>\n" +
                        "                                    <div class=\"position-absolute top-0 end-0\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                        "                                </div>\n" +
                        "\n" +
                        "                            </div>\n" +
                        "                            <p><a href=\"/college-in-"+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+"\" class='text-truncate' style=\"max-width: 300px;display: inline-block\" title='"+response[0].name+"'> "+response[0].name+" </a></p>\n" +
                        "                            <p class=\"golden-color\"><i class=\"fas fa-star\"></i> "+review+"/5</p>");
                    name.html(response[0].name);
                    // aff.html(response[0].name);
                    address.html(response[0].address);
                    state.html(response[0].states[0].name);
                    city.html(response[0].cities.name);
                    course.html(response[0].course);
                    button.html('<a href=\"/college-in-'+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+'\" class="btn site-btn-1 text-white">View College</button>');
                    // var html = "<tr><td class=\"w-25 option\">Courses Available: " + response[0].course + "</td></tr>" +
                    //     "<tr><td class=\"w-25 option\">Category: " + response[0].category[0].name + "</td></tr>" +
                    //     "<tr><td class=\"w-25 option\">City: " + response[0].cities.name + "</td></tr>" +
                    //     "<tr><td class=\"w-25 option\">" + verified + "</td></tr>";
                    // $("#compareoneTitle").html(response[0].name);
                    // $("#compareoneAddress").html(response[0].address + " " + response[0].cities.name + ", " + response[0].states[0].name);
                    // $("#compareoneImage").attr("src", "/property/images/" + response[0].image[0].featured);
                    // document.getElementById("detailCompareoneDIV").style.display = "block";
                    // $("#table-compareone").append(html);
                },
                error: function () {
                    alert('Error occured');
                }
            });
        }
        if(getUrlParameter('compare2') != "") {
            var name =  $(".collegename").find("td:eq(1)");
            var aff =  $(".affiliate").find("td:eq(1)");
            var address =  $(".address").find("td:eq(1)");
            var state =  $(".state").find("td:eq(1)");
            var city =  $(".city").find("td:eq(1)");
            var course =  $(".course").find("td:eq(1)");
            var button =  $(".buttontr").find("td:eq(1)");
            $.ajax({
                type:"GET",
                url : "/get_college_details",
                data : "id="+getUrlParameter('compare2'),
                async: false,
                success : function(response) {
                    console.log(response)
                    $("#comparetwoDIV").addClass('d-none');
                    var featured = "";
                    var review = 0;
                    if(response[0].featured == 1){
                        featured = "<div class=\"ribbon\"><span>featured</span></div>";
                    }
                    if(response[0].reviews != null){
                        review = response[0].reviews;
                    }
                    $("#compareTwoShow").html("  <div class=\"college-info-1\">\n" +
                        "                                <div class=\"cover-img position-relative box\" style=\"background:url('/property/"+response[0].id+"/gallery/featured/"+response[0].image[0].featured+"');background-size:cover;\">\n" +
                        "                                   "+featured+" <a href=\"/college-in-"+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+"\"><div class=\"college-info-logo position-absolute bottom-0 start-0 px-2 pb-1 m-2\"><img src=\"/property/"+response[0].id+"/logo/"+response[0].logo+"\" alt=\"\"></div>\n" +
                        "                                    </a>\n" +
                        "                                    <div class=\"position-absolute top-0 end-0\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                        "                                </div>\n" +
                        "\n" +
                        "                            </div>\n" +
                        "                            <p><a href=\"/college-in-"+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+"\" class='text-truncate' style=\"max-width: 300px;display: inline-block\" title='"+response[0].name+"'> "+response[0].name+" </a></p>\n" +
                        "                            <p class=\"golden-color\"><i class=\"fas fa-star\"></i> "+review+"/5</p>");

                    name.html(response[0].name);
                    // aff.html(response[0].name);
                    address.html(response[0].address);
                    state.html(response[0].states[0].name);
                    city.html(response[0].cities.name);
                    course.html(response[0].course);
                    button.html('<a href=\"/college-in-'+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+'\" class="btn site-btn-1 text-white">View College</button>');
                    },
                error: function() {
                    alert('Error occured');
                }
            });
        }
        if(getUrlParameter('compare3') != "") {
            var name =  $(".collegename").find("td:eq(2)");
            var aff =  $(".affiliate").find("td:eq(2)");
            var address =  $(".address").find("td:eq(2)");
            var state =  $(".state").find("td:eq(2)");
            var city =  $(".city").find("td:eq(2)");
            var course =  $(".course").find("td:eq(2)");
             var button =  $(".buttontr").find("td:eq(2)");
            $.ajax({
                type:"GET",
                url : "/get_college_details",
                data : "id="+getUrlParameter('compare3'),
                async: false,
                success : function(response) {
                    $("#comparethreeDIV").addClass('d-none');
                    var featured = "";
                    var review = 0;
                    if(response[0].featured == 1){
                        featured = "<div class=\"ribbon\"><span>featured</span></div>";
                    }
                    if(response[0].reviews != null){
                        review = response[0].reviews;
                    }
                    $("#compareThreeShow").html("  <div class=\"college-info-1\">\n" +
                        "                                <div class=\"cover-img position-relative box\" style=\"background:url('/property/"+response[0].id+"/gallery/featured/"+response[0].image[0].featured+"');    background-size: contain;\n" +
                        "    background-repeat: no-repeat;\n" +
                        "    background-position: center;\">\n" +
                        "                                   "+featured+" <a href=\"/college-in-"+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+"\"><div class=\"college-info-logo position-absolute bottom-0 start-0 px-2 pb-1 m-2\"><img src=\"/property/"+response[0].id+"/logo/"+response[0].logo+"\" alt=\"\"></div>\n" +
                        "                                    </a>\n" +
                        "                                    <div class=\"position-absolute top-0 end-0\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                        "                                </div>\n" +
                        "\n" +
                        "                            </div>\n" +
                        "                            <p><a href=\"/college-in-"+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+"\" class='text-truncate' style=\"max-width: 300px;display: inline-block\" title='"+response[0].name+"'> "+response[0].name+" </a></p>\n" +
                        "                            <p class=\"golden-color\"><i class=\"fas fa-star\"></i> "+review+"/5</p>");

                    name.html(response[0].name);
                    // aff.html(response[0].name);
                    address.html(response[0].address);
                    state.html(response[0].states[0].name);
                    city.html(response[0].cities.name);
                    course.html(response[0].course);
                    button.html('<a href=\"/college-in-'+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+'\" class="btn site-btn-1 text-white">View College</button>');
                    },
                error: function() {
                    alert('Error occured');
                }
            });
        }

      if(getUrlParameter('comparebank1') != "") {
          var name =  $(".bankname").find("td:eq(0)");
          var rate =  $(".rate").find("td:eq(0)");
          var loan =  $(".loanB").find("td:eq(0)");
          var pan =  $(".penalty").find("td:eq(0)");
          var mar =  $(".margin").find("td:eq(0)");
          var mar =  $(".margin").find("td:eq(0)");
          var age =  $(".ageLimit").find("td:eq(0)");
          var wcoll =  $(".wcoll").find("td:eq(0)");
          var wtcoll =  $(".wtcoll").find("td:eq(0)");
          var proc =  $(".procfee").find("td:eq(0)");
          var rper =  $(".rperiod").find("td:eq(0)");
          var lfins =  $(".lfinst").find("td:eq(0)");
          var mlwc =  $(".mlwc").find("td:eq(0)");
          var ecfss =  $(".ecfss").find("td:eq(0)");
          var pc =  $(".pc").find("td:eq(0)");
          var bta =  $(".bta").find("td:eq(0)");
          var tula =  $(".tula").find("td:eq(0)");
          var iss =  $(".iss").find("td:eq(0)");
          var cbb =  $(".cbb").find("td:eq(0)");
          var button =  $(".buttontr").find("td:eq(0)");
          $.ajax({
              type:"GET",
              url : "/get_bank_details",
              data : "id="+getUrlParameter('comparebank1'),
              async: false,
              success : function(response) {
                  $("#compareOneShowBank").show();
                  $("#compareoneDIVBank").addClass('d-none');
                  $("#compareOneShowBank").html("  <div class=\"college-info-1\">\n" +
                      "                                <div class=\"cover-img position-relative box\" style=\"background:url('/banks/"+response[0].image+"');    background-size: contain;\n" +
                      "    background-repeat: no-repeat;\n" +
                      "    background-position: center;\">\n" +
                      "                                    <div class=\"position-absolute top-0 end-0\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                      "                                </div>\n" +
                      "\n" +
                      "                            </div>\n" +
                      "                            <p><a href=\"/college-in-\" class='text-truncate' style=\"max-width: 300px;display: inline-block\" title='"+response[0].name+"'> "+response[0].name+" </a></p>");

                  name.html(response[0].name);
                  // aff.html(response[0].name);
                  rate.html(response[0].rate_of_interest);
                  wcoll.html(response[0].max_loan_collateral);
                  pan.html(response[0].penal_charges);
                  wtcoll.html(response[0].max_loan_w_collateral);
                  proc.html(response[0].processing_fee);
                  rper.html(response[0].repayment_period + " Years");
                  lfins.html(response[0].loan_for_top_inst == 1 ? 'Yes': 'No');
                  mar.html(response[0].margin);
                  age.html(response[0].age_limit == 1 ? 'Yes':'No');
                  loan.html(response[0].loan_security);
                  ecfss.html(response[0].eligibility_concession);
                  //proc.html(response[0].processing_time);
                  bta.html(response[0].bank_transfer_allowance == 1 ? 'Yes': 'No');
                  mar.html(response[0].mandatory_insurance);
                  tula.html(response[0].top_up_loan == 1 ? 'Available':'Not Available');
                  iss.html(response[0].insterest_subsidy_schemes);
                  cbb.html(response[0].benefits);
                  console.log(response[0]);
                  button.html('<a href="#!" class="btn site-transparent-btn-1 btn-sm text-white bankApply" data-bs-toggle="modal" data-id="'+response[0].id+'" data-name="'+response[0].name+'" data-image="'+response[0].image+'" data-bs-target="#educationLoanModal">Apply</a>');
              },
              error: function () {
                  alert('Error occured');
              }
          });
      }
      if(getUrlParameter('comparebank2') != "") {
          var name =  $(".bankname").find("td:eq(1)");
          var rate =  $(".rate").find("td:eq(1)");
          var loan =  $(".loanB").find("td:eq(1)");
          var pan =  $(".penalty").find("td:eq(1)");
          var mar =  $(".margin").find("td:eq(1)");
          var mar =  $(".margin").find("td:eq(1)");
          var age =  $(".ageLimit").find("td:eq(1)");
          var wcoll =  $(".wcoll").find("td:eq(1)");
          var wtcoll =  $(".wtcoll").find("td:eq(1)");
          var proc =  $(".procfee").find("td:eq(1)");
          var rper =  $(".rperiod").find("td:eq(1)");
          var lfins =  $(".lfinst").find("td:eq(1)");
          var mlwc =  $(".mlwc").find("td:eq(1)");
          var ecfss =  $(".ecfss").find("td:eq(1)");
          var pc =  $(".pc").find("td:eq(1)");
          var bta =  $(".bta").find("td:eq(1)");
          var tula =  $(".tula").find("td:eq(1)");
          var iss =  $(".iss").find("td:eq(1)");
          var cbb =  $(".cbb").find("td:eq(1)");
          var button =  $(".buttontr").find("td:eq(1)");
          $.ajax({
              type:"GET",
              url : "/get_bank_details",
              data : "id="+getUrlParameter('comparebank2'),
              async: false,
              success : function(response) {
                  $("#compareTwoShowBank").show();
                  $("#comparetwoDIVBank").addClass('d-none');
                  $("#compareTwoShowBank").html("  <div class=\"college-info-1\">\n" +
                      "                                <div class=\"cover-img position-relative box\" style=\"background:url('/banks/"+response[0].image+"');    background-size: contain;\n" +
                      "    background-repeat: no-repeat;\n" +
                      "    background-position: center;\">\n" +
                      "                                    <div class=\"position-absolute top-0 end-0\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                      "                                </div>\n" +
                      "\n" +
                      "                            </div>\n" +
                      "                            <p><a href=\"/college-in-\" class='text-truncate' style=\"max-width: 300px;display: inline-block\" title='"+response[0].name+"'> "+response[0].name+" </a></p>");

                  name.html(response[0].name);
                  // aff.html(response[0].name);
                  rate.html(response[0].rate_of_interest);
                  wcoll.html(response[0].max_loan_collateral);
                  pan.html(response[0].penal_charges);
                  wtcoll.html(response[0].max_loan_w_collateral);
                  proc.html(response[0].processing_fee);
                  rper.html(response[0].repayment_period + " Years");
                  lfins.html(response[0].loan_for_top_inst == 1 ? 'Yes': 'No');
                  mar.html(response[0].margin);
                  age.html(response[0].age_limit == 1 ? 'Yes':'No');
                  loan.html(response[0].loan_security);
                  ecfss.html(response[0].eligibility_concession);
                  //proc.html(response[0].processing_time);
                  bta.html(response[0].bank_transfer_allowance == 1 ? 'Yes': 'No');
                  mar.html(response[0].mandatory_insurance);
                  tula.html(response[0].top_up_loan == 1 ? 'Available':'Not Available');
                  iss.html(response[0].insterest_subsidy_schemes);
                  cbb.html(response[0].benefits);
                  button.html('<a href="#!" class="btn site-transparent-btn-1 btn-sm text-white bankApply" data-bs-toggle="modal" data-id="'+response[0].id+'" data-name="'+response[0].name+'" data-image="'+response[0].image+'" data-bs-target="#educationLoanModal">Apply</a>');
              },
              error: function() {
                  alert('Error occured');
              }
          });
      }
      if(getUrlParameter('comparebank3') != "") {
          var name =  $(".bankname").find("td:eq(2)");
          var rate =  $(".rate").find("td:eq(2)");
          var loan =  $(".loanB").find("td:eq(2)");
          var pan =  $(".penalty").find("td:eq(2)");
          var mar =  $(".margin").find("td:eq(2)");
          var mar =  $(".margin").find("td:eq(2)");
          var age =  $(".ageLimit").find("td:eq(2)");
          var wcoll =  $(".wcoll").find("td:eq(2)");
          var wtcoll =  $(".wtcoll").find("td:eq(2)");
          var proc =  $(".procfee").find("td:eq(2)");
          var rper =  $(".rperiod").find("td:eq(2)");
          var lfins =  $(".lfinst").find("td:eq(2)");
          var mlwc =  $(".mlwc").find("td:eq(2)");
          var ecfss =  $(".ecfss").find("td:eq(2)");
          var pc =  $(".pc").find("td:eq(2)");
          var bta =  $(".bta").find("td:eq(2)");
          var tula =  $(".tula").find("td:eq(2)");
          var iss =  $(".iss").find("td:eq(2)");
          var cbb =  $(".cbb").find("td:eq(2)");
          var button =  $(".buttontr").find("td:eq(2)");
          $.ajax({
              type:"GET",
              url : "/get_bank_details",
              data : "id="+$(this).val(),
              async: false,
              success : function(response) {
                  $("#compareThreeShowBank").show();
                  $("#comparethreeDIVBank").addClass('d-none');
                  $("#compareThreeShowBank").html("  <div class=\"college-info-1\">\n" +
                      "                                <div class=\"cover-img position-relative box\" style=\"background:url('/banks/"+response[0].image+"');background-size:cover;\">\n" +
                      "                                    <div class=\"position-absolute top-0 end-0\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                      "                                </div>\n" +
                      "\n" +
                      "                            </div>\n" +
                      "                            <p><a href=\"/college-in-\" class='text-truncate' style=\"max-width: 300px;display: inline-block\" title='"+response[0].name+"'> "+response[0].name+" </a></p>");

                  name.html(response[0].name);
                  // aff.html(response[0].name);
                  rate.html(response[0].rate_of_interest);
                  wcoll.html(response[0].max_loan_collateral);
                  pan.html(response[0].penal_charges);
                  wtcoll.html(response[0].max_loan_w_collateral);
                  proc.html(response[0].processing_fee);
                  rper.html(response[0].repayment_period + " Years");
                  lfins.html(response[0].loan_for_top_inst == 1 ? 'Yes': 'No');
                  mar.html(response[0].margin);
                  age.html(response[0].age_limit == 1 ? 'Yes':'No');
                  loan.html(response[0].loan_security);
                  ecfss.html(response[0].eligibility_concession);
                  //proc.html(response[0].processing_time);
                  bta.html(response[0].bank_transfer_allowance == 1 ? 'Yes': 'No');
                  mar.html(response[0].mandatory_insurance);
                  tula.html(response[0].top_up_loan == 1 ? 'Available':'Not Available');
                  iss.html(response[0].insterest_subsidy_schemes);
                  cbb.html(response[0].benefits);
                  button.html('<a href="#!" class="btn site-transparent-btn-1 btn-sm text-white bankApply" data-bs-toggle="modal" data-id="'+response[0].id+'" data-name="'+response[0].name+'" data-image="'+response[0].image+'" data-bs-target="#educationLoanModal">Apply</a>');
              },
              error: function() {
                  alert('Error occured');
              }
          });
      }


        $("#college_service").click(function (e) {
            e.preventDefault();
            $("#service1").removeClass('d-none');
            $("#service3").addClass('d-none');
            $("#service2").addClass('d-none');
            $("#college_service").addClass('btn-active');
            $("#exam_service").removeClass('btn-active');
            $("#location_service").removeClass('btn-active');
        });
        $("#exam_service").click(function (e) {
            e.preventDefault();
            $("#service1").addClass('d-none');
            $("#service3").addClass('d-none');
            $("#service2").removeClass('d-none');
            $("#college_service").removeClass('btn-active');
            $("#exam_service").addClass('btn-active');
            $("#location_service").removeClass('btn-active');
        });
        $("#location_service").click(function (e) {
            e.preventDefault();
            $("#service1").addClass('d-none');
            $("#service2").addClass('d-none');
            $("#service3").removeClass('d-none');
            $("#college_service").removeClass('btn-active');
            $("#exam_service").removeClass('btn-active');
            $("#location_service").addClass('btn-active');
        });

        //Selectize JS
        var compone = $('#compareone').selectize();
        var comptwo = $('#comparetwo').selectize();
        var compthree = $('#comparethree').selectize();
      var componeB = $('#compareoneBank').selectize();
      var comptwoB = $('#comparetwoBank').selectize();
      var compthreeB = $('#comparethreeBank').selectize();
        $('#modalC1select').selectize();
        $('#modalC2select').selectize();
        $('#modalC3select').selectize();
        $('#modaloneSelect').selectize();
        $('#modaltwoSelect').selectize();
        $('#modalthreeSelect').selectize();
      $('#modaloneSelectBank').selectize();
      $('#modaltwoSelectBank').selectize();
      $('#modalthreeSelectBank').selectize();


         $(".add-college-div1").click(function(){
            compone[0].selectize.focus();
        });
         $(".add-college-div2").click(function(){
            comptwo[0].selectize.focus();
        });
         $(".add-college-div3").click(function(){
            compthree[0].selectize.focus();
        })

        var citySeletize = $('#cityFilter').selectize({
            valueField: 'id',
            labelField: 'name',
            searchField: 'name',
            options: [],
            create: false,
            load: function(query, callback) {
                if (!query.length) return callback();
                $.ajax({
                    url: '/api/get_cities',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        query: query,
                        state: $("#stateFilter").val(),
                    },
                    error: function() {
                        callback();
                    },
                    success: function(res) {
                        callback(res);
                    }
                });
            }
        });
        var stateSelectize = $('#stateFilter').selectize({
            valueField: 'id',
            labelField: 'name',
            searchField: 'name',
            options: [],
            create: false,
            load: function(query, callback) {
                if (!query.length) {
                    return callback();
                }
                if($("#stateFilter").val() == ""){
                    var scot = stateSelectize[0].selectize;
                    scot.clear();
                    scot.clearOptions();
                }
                $.ajax({
                    url: '/api/get_states',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        query: query,
                    },
                    error: function() {
                        callback();
                    },
                    success: function(res) {
                        var control = citySeletize[0].selectize;
                        control.clear();
                        control.clearOptions();
                        callback(res);
                    }
                });
            }
        });

        var categ = "";
        if(getUrlParameter('catg') != ""){
            categ = getUrlParameter('catg');
        }
          $("#cityFilter").change(function () {
        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + "?catg=" +categ+ "&city="+$(this).text() + "&state=" + $('#stateFilter').text();
        window.history.pushState({ path: newurl }, '', newurl);
        window.location.reload();
    });

    $("input.categoryCheck").change(function () {
        categ = $(this).val();
        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + "?catg="+$(this).val() + "&state=" + $('#stateFilter').text() + "&city=" + $('#cityFilter').text();
        window.history.pushState({ path: newurl }, '', newurl);
         window.location.reload();
    });

    // $("#cityFilter").change(function () {
    //     var params;
    //     if($("#cityFilter option:selected").val() == "0" && $("#stateFilter option:selected").val() == "0"){
    //         params = {'city': $(this).text() , 'state': $("#stateFilter").text()};
    //     }
    //     // else if($("#stateFilter option:selected").val() == "0"){
    //     //     params = {'state':$("#stateFilter option:selected").text()};
    //     // }
    //     var url = window.location.href;
    //     // var w = getQueryH(url, 'curr');
    //     // params = {'curr': $(this).val() == 0 ? "0" : "1"};
    //     console.log(params)
    //     var new_url = url + $.param(params);
    //     history.pushState({}, null, new_url);
    // })

        //Compare Modal Js
        $('#compareone').change(function() {
            var name =  $(".collegename").find("td:eq(0)");
            var aff =  $(".affiliate").find("td:eq(0)");
            var address =  $(".address").find("td:eq(0)");
            var state =  $(".state").find("td:eq(0)");
            var city =  $(".city").find("td:eq(0)");
            var course =  $(".course").find("td:eq(0)");
             var button =  $(".buttontr").find("td:eq(0)");
            $.ajax({
                type:"GET",
                url : "/get_college_details",
                data : "id="+$(this).val(),
                async: false,
                success : function(response) {
                    $("#compareOneShow").show();
                    $("#compareoneDIV").addClass('d-none');
                    var featured = "";
                    var review = 0;
                    if(response[0].featured == 1){
                        featured = "<div class=\"ribbon\"><span>featured</span></div>";
                    }
                    if(response[0].reviews != null){
                        review = response[0].reviews;
                    }
                    $("#compareOneShow").html("  <div class=\"college-info-1\">\n" +
                        "                                <div class=\"cover-img position-relative box\" style=\"background:url('/property/images/"+JSON.parse(response[0].image[0].images)[0]+"');background-size:cover;\">\n" +
                        "                                   "+featured+" <a href=\"#\"><div class=\"college-info-logo position-absolute bottom-0 start-0 px-2 pb-1 m-2\"><img src=\"/property/logo/images/"+response[0].logo+"\" alt=\"\"></div>\n" +
                        "                                    </a>\n" +
                        "                                    <div class=\"position-absolute top-0 end-0\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                        "                                </div>\n" +
                        "\n" +
                        "                            </div>\n" +
                        "                            <p><a href=\"/college-in-"+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+"\" class='text-truncate' style=\"max-width: 300px;display: inline-block\" title='"+response[0].name+"'> "+response[0].name+" </a></p>\n" +
                        "                            <p class=\"golden-color\"><i class=\"fas fa-star\"></i> "+review+"/5</p>");

                    name.html(response[0].name);
                    // aff.html(response[0].name);
                    address.html(response[0].address);
                    state.html(response[0].states[0].name);
                    city.html(response[0].cities.name);
                    course.html(response[0].course);
                     button.html('<a href=\"/college-in-'+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+'\" class="btn site-btn-1 text-white">View College</button>');
                },
                error: function() {
                    console.log('Error occured');
                }
            });
        });
        $('#comparetwo').change(function() {
            var name =  $(".collegename").find("td:eq(1)");
            var aff =  $(".affiliate").find("td:eq(1)");
            var address =  $(".address").find("td:eq(1)");
            var state =  $(".state").find("td:eq(1)");
            var city =  $(".city").find("td:eq(1)");
            var course =  $(".course").find("td:eq(1)");
            var button =  $(".buttontr").find("td:eq(1)");
            $.ajax({
                type:"GET",
                url : "/get_college_details",
                data : "id="+$(this).val(),
                async: false,
                success : function(response) {
                    $("#compareTwoShow").show();
                    $("#comparetwoDIV").addClass('d-none');
                    var featured = "";
                    var review = 0;
                    if(response[0].featured == 1){
                        featured = "<div class=\"ribbon\"><span>featured</span></div>";
                    }
                    if(response[0].reviews != null){
                        review = response[0].reviews;
                    }
                    $("#compareTwoShow").html("  <div class=\"college-info-1\">\n" +
                        "                                <div class=\"cover-img position-relative box\" style=\"background:url('/property/images/"+JSON.parse(response[0].image[0].images)[0]+"');background-size:cover;\">\n" +
                        "                                   "+featured+" <a href=\"/college-in-"+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+"\"><div class=\"college-info-logo position-absolute bottom-0 start-0 px-2 pb-1 m-2\"><img src=\"/property/logo/images/"+response[0].logo+"\" alt=\"\"></div>\n" +
                        "                                    </a>\n" +
                        "                                    <div class=\"position-absolute top-0 end-0\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                        "                                </div>\n" +
                        "\n" +
                        "                            </div>\n" +
                        "                            <p><a href=\"/college-in-"+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+"\" class='text-truncate' style=\"max-width: 300px;display: inline-block\" title='"+response[0].name+"'> "+response[0].name+" </a></p>\n" +
                        "                            <p class=\"golden-color\"><i class=\"fas fa-star\"></i> "+review+"/5</p>");

                    name.html(response[0].name);
                    // aff.html(response[0].name);
                    address.html(response[0].address);
                    state.html(response[0].states[0].name);
                    city.html(response[0].cities.name);
                    course.html(response[0].course);
                     button.html('<a href=\"/college-in-'+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+'\" class="btn site-btn-1 text-white">View College</button>');
                },
                error: function() {
                    console.log('Error occured');
                }
            });
        });
        $('#comparethree').change(function() {
            var name =  $(".collegename").find("td:eq(2)");
            var aff =  $(".affiliate").find("td:eq(2)");
            var address =  $(".address").find("td:eq(2)");
            var state =  $(".state").find("td:eq(2)");
            var city =  $(".city").find("td:eq(2)");
            var course =  $(".course").find("td:eq(2)");
             var button =  $(".buttontr").find("td:eq(2)");
            $.ajax({
                type:"GET",
                url : "/get_college_details",
                data : "id="+$(this).val(),
                async: false,
                success : function(response) {
                    $("#compareThreeShow").show();
                    $("#comparethreeDIV").addClass('d-none');
                    var featured = "";
                    var review = 0;
                    if(response[0].featured == 1){
                        featured = "<div class=\"ribbon\"><span>featured</span></div>";
                    }
                    if(response[0].reviews != null){
                        review = response[0].reviews;
                    }
                    $("#compareThreeShow").html("  <div class=\"college-info-1\">\n" +
                        "                                <div class=\"cover-img position-relative box\" style=\"background:url('/property/images/"+JSON.parse(response[0].image[0].images)[0]+"');background-size:cover;\">\n" +
                        "                                   "+featured+" <a href=\"/college-in-"+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+"\"><div class=\"college-info-logo position-absolute bottom-0 start-0 px-2 pb-1 m-2\"><img src=\"/property/logo/images/"+response[0].logo+"\" alt=\"\"></div>\n" +
                        "                                    </a>\n" +
                        "                                    <div class=\"position-absolute top-0 end-0\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                        "                                </div>\n" +
                        "\n" +
                        "                            </div>\n" +
                        "                            <p><a href=\"/college-in-"+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+"\" class='text-truncate' style=\"max-width: 300px;display: inline-block\" title='"+response[0].name+"'> "+response[0].name+" </a></p>\n" +
                        "                            <p class=\"golden-color\"><i class=\"fas fa-star\"></i> "+review+"/5</p>");

                    name.html(response[0].name);
                    // aff.html(response[0].name);
                    address.html(response[0].address);
                    state.html(response[0].states[0].name);
                    city.html(response[0].cities.name);
                    course.html(response[0].course);
                    button.html('<a href=\"/college-in-'+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+'\" class="btn site-btn-1 text-white">View College</button>');
                },
                error: function() {
                    console.log('Error occured');
                }
            });
        });

      $('#compareoneBank').change(function() {
          var name =  $(".bankname").find("td:eq(0)");
          var rate =  $(".rate").find("td:eq(0)");
          var loan =  $(".loanB").find("td:eq(0)");
          var pan =  $(".penalty").find("td:eq(0)");
          var mar =  $(".margin").find("td:eq(0)");
          var mar =  $(".margin").find("td:eq(0)");
          var age =  $(".ageLimit").find("td:eq(0)");
          var wcoll =  $(".wcoll").find("td:eq(0)");
          var wtcoll =  $(".wtcoll").find("td:eq(0)");
          var proc =  $(".procfee").find("td:eq(0)");
          var rper =  $(".rperiod").find("td:eq(0)");
          var lfins =  $(".lfinst").find("td:eq(0)");
          var mlwc =  $(".mlwc").find("td:eq(0)");
          var ecfss =  $(".ecfss").find("td:eq(0)");
          var pc =  $(".pc").find("td:eq(0)");
          var bta =  $(".bta").find("td:eq(0)");
          var tula =  $(".tula").find("td:eq(0)");
          var iss =  $(".iss").find("td:eq(0)");
          var cbb =  $(".cbb").find("td:eq(0)");
          $.ajax({
              type:"GET",
              url : "/get_bank_details",
              data : "id="+$(this).val(),
              async: false,
              success : function(response) {
                  $("#compareOneShowBank").show();
                  $("#compareoneDIVBank").addClass('d-none');
                  $("#compareOneShowBank").html("  <div class=\"college-info-1\">\n" +
                      "                                <div class=\"cover-img position-relative box\" style=\"background:url('/banks/"+response[0].image+"');background-size:cover;\">\n" +
                      "                                    <div class=\"position-absolute top-0 end-0\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                      "                                </div>\n" +
                      "\n" +
                      "                            </div>\n" +
                      "                            <p><a href=\"/college-in-\" class='text-truncate' style=\"max-width: 300px;display: inline-block\" title='"+response[0].name+"'> "+response[0].name+" </a></p>");

                  name.html(response[0].name);
                  // aff.html(response[0].name);
                  rate.html(response[0].rate_of_interest);
                  wcoll.html(response[0].max_loan_collateral);
                  pan.html(response[0].penal_charges);
                  wtcoll.html(response[0].max_loan_w_collateral);
                  proc.html(response[0].processing_fee);
                  rper.html(response[0].repayment_period + " Years");
                  lfins.html(response[0].loan_for_top_inst == 1 ? 'Yes': 'No');
                  mar.html(response[0].margin);
                  age.html(response[0].age_limit == 1 ? 'Yes':'No');
                  loan.html(response[0].loan_security);
                  ecfss.html(response[0].eligibility_concession);
                  //proc.html(response[0].processing_time);
                  bta.html(response[0].bank_transfer_allowance == 1 ? 'Yes': 'No');
                  mar.html(response[0].mandatory_insurance);
                  tula.html(response[0].top_up_loan == 1 ? 'Available':'Not Available');
                  iss.html(response[0].insterest_subsidy_schemes);
                  cbb.html(response[0].benefits);
                  // button.html('<a href=\"/college-in-'+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+'\" class="btn site-btn-1 text-white">View College</button>');
              },
              error: function() {
                  console.log('Error occured');
              }
          });
      });
      $('#comparetwoBank').change(function() {
          var name =  $(".bankname").find("td:eq(1)");
          var rate =  $(".rate").find("td:eq(1)");
          var loan =  $(".loanB").find("td:eq(1)");
          var pan =  $(".penalty").find("td:eq(1)");
          var mar =  $(".margin").find("td:eq(1)");
          var mar =  $(".margin").find("td:eq(1)");
          var age =  $(".ageLimit").find("td:eq(1)");
          var wcoll =  $(".wcoll").find("td:eq(1)");
          var wtcoll =  $(".wtcoll").find("td:eq(1)");
          var proc =  $(".procfee").find("td:eq(1)");
          var rper =  $(".rperiod").find("td:eq(1)");
          var lfins =  $(".lfinst").find("td:eq(1)");
          var mlwc =  $(".mlwc").find("td:eq(1)");
          var ecfss =  $(".ecfss").find("td:eq(1)");
          var pc =  $(".pc").find("td:eq(1)");
          var bta =  $(".bta").find("td:eq(1)");
          var tula =  $(".tula").find("td:eq(1)");
          var iss =  $(".iss").find("td:eq(1)");
          var cbb =  $(".cbb").find("td:eq(1)");
          $.ajax({
              type:"GET",
              url : "/get_bank_details",
              data : "id="+$(this).val(),
              async: false,
              success : function(response) {
                  $("#compareTwoShowBank").show();
                  $("#comparetwoDIVBank").addClass('d-none');
                  $("#compareTwoShowBank").html("  <div class=\"college-info-1\">\n" +
                      "                                <div class=\"cover-img position-relative box\" style=\"background:url('/banks/"+response[0].image+"');background-size:cover;\">\n" +
                      "                                    <div class=\"position-absolute top-0 end-0\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                      "                                </div>\n" +
                      "\n" +
                      "                            </div>\n" +
                      "                            <p><a href=\"/college-in-\" class='text-truncate' style=\"max-width: 300px;display: inline-block\" title='"+response[0].name+"'> "+response[0].name+" </a></p>");

                  name.html(response[0].name);
                  // aff.html(response[0].name);
                  rate.html(response[0].rate_of_interest);
                  wcoll.html(response[0].max_loan_collateral);
                  pan.html(response[0].penal_charges);
                  wtcoll.html(response[0].max_loan_w_collateral);
                  proc.html(response[0].processing_fee);
                  rper.html(response[0].repayment_period + " Years");
                  lfins.html(response[0].loan_for_top_inst == 1 ? 'Yes': 'No');
                  mar.html(response[0].margin);
                  age.html(response[0].age_limit == 1 ? 'Yes':'No');
                  loan.html(response[0].loan_security);
                  ecfss.html(response[0].eligibility_concession);
                  //proc.html(response[0].processing_time);
                  bta.html(response[0].bank_transfer_allowance == 1 ? 'Yes': 'No');
                  mar.html(response[0].mandatory_insurance);
                  tula.html(response[0].top_up_loan == 1 ? 'Available':'Not Available');
                  iss.html(response[0].insterest_subsidy_schemes);
                  cbb.html(response[0].benefits);
                  // button.html('<a href=\"/college-in-'+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+'\" class="btn site-btn-1 text-white">View College</button>');
              },
              error: function() {
                  console.log('Error occured');
              }
          });
      });
      $('#comparethreeBank').change(function() {
          var name =  $(".bankname").find("td:eq(2)");
          var rate =  $(".rate").find("td:eq(2)");
          var loan =  $(".loanB").find("td:eq(2)");
          var pan =  $(".penalty").find("td:eq(2)");
          var mar =  $(".margin").find("td:eq(2)");
          var mar =  $(".margin").find("td:eq(2)");
          var age =  $(".ageLimit").find("td:eq(2)");
          var wcoll =  $(".wcoll").find("td:eq(2)");
          var wtcoll =  $(".wtcoll").find("td:eq(2)");
          var proc =  $(".procfee").find("td:eq(2)");
          var rper =  $(".rperiod").find("td:eq(2)");
          var lfins =  $(".lfinst").find("td:eq(2)");
          var mlwc =  $(".mlwc").find("td:eq(2)");
          var ecfss =  $(".ecfss").find("td:eq(2)");
          var pc =  $(".pc").find("td:eq(2)");
          var bta =  $(".bta").find("td:eq(2)");
          var tula =  $(".tula").find("td:eq(2)");
          var iss =  $(".iss").find("td:eq(2)");
          var cbb =  $(".cbb").find("td:eq(2)");
          $.ajax({
              type:"GET",
              url : "/get_bank_details",
              data : "id="+$(this).val(),
              async: false,
              success : function(response) {
                  $("#compareThreeShowBank").show();
                  $("#comparethreeDIVBank").addClass('d-none');
                  $("#compareThreeShowBank").html("  <div class=\"college-info-1\">\n" +
                      "                                <div class=\"cover-img position-relative box\" style=\"background:url('/banks/"+response[0].image+"');background-size:cover;\">\n" +
                      "                                    <div class=\"position-absolute top-0 end-0\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                      "                                </div>\n" +
                      "\n" +
                      "                            </div>\n" +
                      "                            <p><a href=\"/college-in-\" class='text-truncate' style=\"max-width: 300px;display: inline-block\" title='"+response[0].name+"'> "+response[0].name+" </a></p>");

                  name.html(response[0].name);
                  // aff.html(response[0].name);
                  rate.html(response[0].rate_of_interest);
                  wcoll.html(response[0].max_loan_collateral);
                  pan.html(response[0].penal_charges);
                  wtcoll.html(response[0].max_loan_w_collateral);
                  proc.html(response[0].processing_fee);
                  rper.html(response[0].repayment_period + " Years");
                  lfins.html(response[0].loan_for_top_inst == 1 ? 'Yes': 'No');
                  mar.html(response[0].margin);
                  age.html(response[0].age_limit == 1 ? 'Yes':'No');
                  loan.html(response[0].loan_security);
                  ecfss.html(response[0].eligibility_concession);
                  //proc.html(response[0].processing_time);
                  bta.html(response[0].bank_transfer_allowance == 1 ? 'Yes': 'No');
                  mar.html(response[0].mandatory_insurance);
                  tula.html(response[0].top_up_loan == 1 ? 'Available':'Not Available');
                  iss.html(response[0].insterest_subsidy_schemes);
                  cbb.html(response[0].benefits);
                  // button.html('<a href=\"/college-in-'+response[0].cities.name.toLowerCase().replace(" ", "_")+"/"+response[0].seo[0].permalink+'\" class="btn site-btn-1 text-white">View College</button>');
              },
              error: function() {
                  console.log('Error occured');
              }
          });
      });

        $('#modaloneSelect').change(function() {
            $.ajax({
                type:"GET",
                url : "/get_college_details",
                data : "id="+$(this).val(),
                async: false,
                success : function(response) {
                    $("#modalC1").html("");
                    $("#modalC1").removeClass("d-none");
                    $("#modaloneDIV").addClass("d-none");
                    $("#modalC1").append("<input type='hidden' name='compare1' value='"+response[0].id+"'><a href=\"#\">\n" +
                        "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                        "                            <img src=\"/property/"+response[0].id+"/logo/"+response[0].logo+"\" width=\"65px\" alt=\"\">\n" +
                        "                             <p>"+response[0].name+"</p>" +
                        "                            <div class=\"position-absolute top-0 end-0 close\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                        "                        </div>\n" +
                        "                    </a>");
                },
                error: function() {
                    console.log('Error occured');
                }
            });
        });
        $('#modaltwoSelect').change(function() {
            $.ajax({
                type:"GET",
                url : "/get_college_details",
                data : "id="+$(this).val(),
                async: false,
                success : function(response) {
                    $("#modalC2").html("");
                    $("#modalC2").removeClass("d-none");
                    $("#modaltwoDIV").addClass("d-none");
                    $("#modalC2").append("<input type='hidden' name='compare2' value='"+response[0].id+"'><a href=\"#\">\n" +
                        "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                        "                            <img src=\"/property/"+response[0].id+"/logo/"+response[0].logo+"\" width=\"65px\" alt=\"\">\n" +
                        "                             <p>"+response[0].name+"</p>" +
                        "                            <div class=\"position-absolute top-0 end-0 close\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                        "                        </div>\n" +
                        "                    </a>");
                },
                error: function() {
                    console.log('Error occured');
                }
            });
        });
        $('#modalthreeSelect').change(function() {
            $.ajax({
                type:"GET",
                url : "/get_college_details",
                data : "id="+$(this).val(),
                async: false,
                success : function(response) {
                    $("#modalC3").html("");
                    $("#modalC3").removeClass("d-none");
                    $("#modalthreeDIV").addClass("d-none");
                    $("#modalC3").append("<input type='hidden' name='compare3' value='"+response[0].id+"'><a href=\"#\">\n" +
                        "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                        "                            <img src=\"/property/"+response[0].id+"/logo/"+response[0].logo+"\" width=\"65px\" alt=\"\">\n" +
                        "                             <p>"+response[0].name+"</p>" +
                        "                            <div class=\"position-absolute top-0 end-0 close\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                        "                        </div>\n" +
                        "                    </a>");
                },
                error: function() {
                    console.log('Error occured');
                }
            });
        });

      $('#modaloneSelectBank').change(function() {
          $.ajax({
              type:"GET",
              url : "/get_bank_details",
              data : "id="+$(this).val(),
              async: false,
              success : function(response) {
                  $("#modalC1Bank").html("");
                  $("#modalC1Bank").removeClass("d-none");
                  $("#modaloneDIVBank").addClass("d-none");
                  $("#modalC1Bank").append("<input type='hidden' name='comparebank1' value='"+response[0].id+"'><a href=\"#\">\n" +
                      "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                      "                            <img src=\"/banks/"+response[0].image+"\" width=\"65px\" alt=\"\">\n" +
                      "                             <p>"+response[0].name+"</p>" +
                      "                            <div class=\"position-absolute top-0 end-0 close\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                      "                        </div>\n" +
                      "                    </a>");
              },
              error: function() {
                  console.log('Error occured');
              }
          });
      });
      $('#modaltwoSelectBank').change(function() {
          $.ajax({
              type:"GET",
              url : "/get_bank_details",
              data : "id="+$(this).val(),
              async: false,
              success : function(response) {
                  $("#modalC2Bank").html("");
                  $("#modalC2Bank").removeClass("d-none");
                  $("#modaltwoDIVBank").addClass("d-none");
                  $("#modalC2Bank").append("<input type='hidden' name='comparebank2' value='"+response[0].id+"'><a href=\"#\">\n" +
                      "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                      "                            <img src=\"/banks/"+response[0].image+"\" width=\"65px\" alt=\"\">\n" +
                      "                             <p>"+response[0].name+"</p>" +
                      "                            <div class=\"position-absolute top-0 end-0 close\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                      "                        </div>\n" +
                      "                    </a>");
              },
              error: function() {
                  console.log('Error occured');
              }
          });
      });
      $('#modalthreeSelectBank').change(function() {
          $.ajax({
              type:"GET",
              url : "/get_bank_details",
              data : "id="+$(this).val(),
              async: false,
              success : function(response) {
                  $("#modalC3Bank").html("");
                  $("#modalC3Bank").removeClass("d-none");
                  $("#modalthreeDIVBank").addClass("d-none");
                  $("#modalC3Bank").append("<input type='hidden' name='comparebank3' value='"+response[0].id+"'><a href=\"#\">\n" +
                      "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                      "                            <img src=\"/banks/"+response[0].image+"\" width=\"65px\" alt=\"\">\n" +
                      "                             <p>"+response[0].name+"</p>" +
                      "                            <div class=\"position-absolute top-0 end-0 close\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                      "                        </div>\n" +
                      "                    </a>");
              },
              error: function() {
                  console.log('Error occured');
              }
          });
      });

        $("#modalC1").on('click','.addC',function () {
            $("#modaloneDIV").removeClass('d-none');
            $("#modalC1").addClass('d-none');
        });
        $("#modalC2").on('click','.addC',function () {
            $("#modaltwoDIV").removeClass('d-none');
            $("#modalC2").addClass('d-none');
        });
        $("#modalC3").on('click','.addC',function () {
            $("#modalthreeDIV").removeClass('d-none');
            $("#modalC3").addClass('d-none');
        });

      $("#modalC1Bank").on('click','.addC',function () {
          $("#modaloneDIVBank").removeClass('d-none');
          $("#modalC1Bank").addClass('d-none');
      });
      $("#modalC2Bank").on('click','.addC',function () {
          $("#modaltwoDIVBank").removeClass('d-none');
          $("#modalC2Bank").addClass('d-none');
      });
      $("#modalC3Bank").on('click','.addC',function () {
          $("#modalthreeDIVBank").removeClass('d-none');
          $("#modalC3Bank").addClass('d-none');
      });

        $('#compareOneShow').on('click','.site-btn-close', function(){
            $("#compareOneShow").hide();
            $("#compareoneDIV").removeClass('d-none');
            $(".collegename").find("td:eq(0)").html("-");
            $(".affiliate").find("td:eq(0)").html("-");
            $(".address").find("td:eq(0)").html("-");
            $(".course").find("td:eq(0)").html("-");
            $(".state").find("td:eq(0)").html("-");
            $(".city").find("td:eq(0)").html("-");
        });
        $('#compareTwoShow').on('click','.site-btn-close', function(){
            $("#compareTwoShow").hide();
            $("#comparetwoDIV").removeClass('d-none');
            $(".collegename").find("td:eq(1)").html("-");
            $(".affiliate").find("td:eq(1)").html("-");
            $(".address").find("td:eq(1)").html("-");
            $(".course").find("td:eq(1)").html("-");
            $(".state").find("td:eq(1)").html("-");
            $(".city").find("td:eq(1)").html("-");
        });
        $('#compareThreeShow').on('click','.site-btn-close', function(){
            $("#compareThreeShow").hide();
            $("#comparethreeDIV").removeClass('d-none');
            $(".collegename").find("td:eq(2)").html("-");
            $(".affiliate").find("td:eq(2)").html("-");
            $(".address").find("td:eq(2)").html("-");
            $(".course").find("td:eq(2)").html("-");
            $(".state").find("td:eq(2)").html("-");
            $(".city").find("td:eq(2)").html("-");
        });

      $('#compareOneShowBank').on('click','.site-btn-close', function(){
          $("#compareOneShowBank").hide();
          $("#compareoneDIVBank").removeClass('d-none');
          $(".collegenameBank").find("td:eq(0)").html("-");
          // $(".affiliate").find("td:eq(0)").html("-");
          // $(".address").find("td:eq(0)").html("-");
          // $(".course").find("td:eq(0)").html("-");
          // $(".state").find("td:eq(0)").html("-");
          // $(".city").find("td:eq(0)").html("-");
      });
      $('#compareTwoShowBank').on('click','.site-btn-close', function(){
          $("#compareTwoShowBank").hide();
          $("#comparetwoDIVBank").removeClass('d-none');
          $(".collegenameBank").find("td:eq(1)").html("-");
          // $(".affiliate").find("td:eq(1)").html("-");
          // $(".address").find("td:eq(1)").html("-");
          // $(".course").find("td:eq(1)").html("-");
          // $(".state").find("td:eq(1)").html("-");
          // $(".city").find("td:eq(1)").html("-");
      });
      $('#compareThreeShowBank').on('click','.site-btn-close', function(){
          $("#compareThreeShow").hide();
          $("#comparethreeDIVBank").removeClass('d-none');
          $(".collegenameBank").find("td:eq(2)").html("-");
          // $(".affiliate").find("td:eq(2)").html("-");
          // $(".address").find("td:eq(2)").html("-");
          // $(".course").find("td:eq(2)").html("-");
          // $(".state").find("td:eq(2)").html("-");
          // $(".city").find("td:eq(2)").html("-");
      });
      //
      //   var myOffcanvas = document.getElementById('offcanvasBottom');
      //   var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);
      // var myOffcanvasBank = document.getElementById('offcanvasBank');
      // var bsOffcanvasBank = new bootstrap.Offcanvas(myOffcanvasBank);

        $(".openCompare").click(function () {
            bsOffcanvas.show();
            $("#offcanvasBottom").trigger("offcanvas.toggle");
            var name  = $(this).data('name');
            var image  = $(this).data('image');
            var id  = $(this).data('id');
            if ($('#modalC1').children('.addC').length == 1) {
                $("#modalC1").html("");
                $("#modalC1").append("<input type='hidden' name='compare1' value='"+id+"'><a href=\"#\">\n" +
                    "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                    "                            <img src=\"/property/"+id+"/logo/"+image+"\" width=\"65px\" alt=\"\">\n" +
                    "                             <p>"+name+"</p>" +
                    "                            <div class=\"position-absolute top-0 end-0 close\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                    "                        </div>\n" +
                    "                    </a>");
                // $(this).prop('disabled', true);
            }else if($('#modalC2').children('.addC').length== 1) {
                $("#modalC2").html("");
                $("#modalC2").append("<input type='hidden' name='compare2' value='"+id+"'><a href=\"#\">\n" +
                    "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                    "                            <img src=\"/property/"+id+"/logo/"+image+"\" width=\"65px\" alt=\"\">\n" +
                    "                             <p>"+name+"</p>" +
                    "                            <div class=\"position-absolute top-0 end-0 close\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                    "                        </div>\n" +
                    "                    </a>");
                // $(this).prop('disabled', true);
            }else if($('#modalC3').children('.addC').length == 1) {
                $("#modalC3").html("");
                $("#modalC3").append("<input type='hidden' name='compare3' value='"+id+"'><a href=\"#\">\n" +
                    "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                    "                            <img src=\"/property/"+id+"/logo/"+image+"\" width=\"65px\" alt=\"\">\n" +
                    "                             <p>"+name+"</p>" +
                    "                            <div class=\"position-absolute top-0 end-0 close\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                    "                        </div>\n" +
                    "                    </a>");
                // $(this).prop('disabled', true);
            }else{
                console.log("Nothing Left");
            }
        });

      $(".openCompareBank").click(function () {
          bsOffcanvasBank.show();
          $("#offcanvasBank").trigger("offcanvasBank.toggle");
          var name  = $(this).data('name');
          var image  = $(this).data('image');
          var id  = $(this).data('id');
          if ($('#modalC1Bank').children('.addC').length == 1) {
              $("#modalC1Bank").html("");
              $("#modalC1Bank").append("<input type='hidden' name='comparebank1' value='"+id+"'><a href=\"#\">\n" +
                  "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                  "                            <img src=\"/banks/"+image+"\" width=\"65px\" alt=\"\">\n" +
                  "                             <p>"+name+"</p>" +
                  "                            <div class=\"position-absolute top-0 end-0 close\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                  "                        </div>\n" +
                  "                    </a>");
              // $(this).prop('disabled', true);
          }else if($('#modalC2Bank').children('.addC').length== 1) {
              $("#modalC2Bank").html("");
              $("#modalC2Bank").append("<input type='hidden' name='comparebank2' value='"+id+"'><a href=\"#\">\n" +
                  "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                  "                            <img src=\"/banks/"+image+"\" width=\"65px\" alt=\"\">\n" +
                  "                             <p>"+name+"</p>" +
                  "                            <div class=\"position-absolute top-0 end-0 close\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                  "                        </div>\n" +
                  "                    </a>");
              // $(this).prop('disabled', true);
          }else if($('#modalC3Bank').children('.addC').length == 1) {
              $("#modalC3Bank").html("");
              $("#modalC3Bank").append("<input type='hidden' name='comparebank3' value='"+id+"'><a href=\"#\">\n" +
                  "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                  "                            <img src=\"/banks/"+image+"\" width=\"65px\" alt=\"\">\n" +
                  "                             <p>"+name+"</p>" +
                  "                            <div class=\"position-absolute top-0 end-0 close\" ><i class=\"far fa-window-close site-btn-close\"></i></div>\n" +
                  "                        </div>\n" +
                  "                    </a>");
              // $(this).prop('disabled', true);
          }else{
              console.log("Nothing Left");
          }
      });

      $("#modalC1Bank").on('click','.close',function () {
          $("#modalC1Bank").removeClass('d-none');
          $("#modaloneDIVBank").addClass('d-none');
          $("#modalC1Bank").html("<a href=\"#!\" class=\"addC\">\n" +
              "                        <div class=\"flexColumnCenterMiddle dotbox add-college-div2\">\n" +
              "                            <i class=\"fa fa-plus plus-college\"></i>Add Bank</div>\n" +
              "                    </a>");
      });

      $("#modalC2Bank").on('click','.close',function () {
          $("#modalC2Bank").removeClass('d-none');
          $("#modaltwoDIVBank").addClass('d-none');
          $("#modalC2Bank").html("<a href=\"#!\" class=\"addC\">\n" +
              "                        <div class=\"flexColumnCenterMiddle dotbox add-college-div2\">\n" +
              "                            <i class=\"fa fa-plus plus-college\"></i>Add Bank</div>\n" +
              "                    </a>");
      });
      $("#modalC3Bank").on('click','.close',function () {
          $("#modalC3Bank").removeClass('d-none');
          $("#modalthreeDIVBank").addClass('d-none');
          $("#modalC3Bank").html("<a href=\"#!\" class=\"addC\">\n" +
              "                        <div class=\"flexColumnCenterMiddle dotbox add-college-div2\">\n" +
              "                            <i class=\"fa fa-plus plus-college\"></i>Add Bank</div>\n" +
              "                    </a>");
      });

        $("#modalC1").on('click','.close',function () {
            $("#modalC1").removeClass('d-none');
            $("#modaloneDIV").addClass('d-none');
            $("#modalC1").html("<a href=\"#\" class='addC'>\n" +
                "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                "                            <img src=\"/assets/images/icon/hcat1.png\" width=\"65px\" alt=\"\">\n" +
                "                        <p>Add College</p></div>\n" +
                "                    </a>");
        });
        $("#modalC2").on('click','.close',function () {
            $("#modalC2").removeClass('d-none');
            $("#modaltwoDIV").addClass('d-none');
            $("#modalC2").html("<a href=\"#\" class='addC'>\n" +
                "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                "                            <img src=\"/assets/images/icon/hcat1.png\" width=\"65px\" alt=\"\">\n" +
                "                        <p>Add College</p></div>\n" +
                "                    </a>");
        });
        $("#modalC3").on('click','.close',function () {
            $("#modalC3").removeClass('d-none');
            $("#modalthreeDIV").addClass('d-none');
            $("#modalC3").html("<a href=\"#\" class='addC'>\n" +
                "                        <div class=\"p-3 icon-bx position-relative box\">\n" +
                "                            <img src=\"/assets/images/icon/hcat1.png\" width=\"65px\" alt=\"\">\n" +
                "                        <p>Add College</p></div>\n" +
                "                    </a>");
        });

        $(".modalC1add").click(function () {
            document.getElementById("modalC1select").style.display = "block";
        });
        $(".modalC2add").click(function () {
            document.getElementById("modalC2select").style.display = "block";
        });
        $(".modalC3add").click(function () {
            document.getElementById("modalC3select").style.display = "block";
        });

      $(".modalC1addBank").click(function () {
          document.getElementById("modalC1selectBank").style.display = "block";
      });
      $(".modalC2addBank").click(function () {
          document.getElementById("modalC2selectBank").style.display = "block";
      });
      $(".modalC3addBank").click(function () {
          document.getElementById("modalC3selectBank").style.display = "block";
      });

        $(".closeoffCanvas").click(function () {
            $("#modalC3").html("  <a href=\"#!\" class=\"addC\">\n" +
                "                        <div class=\"flexColumnCenterMiddle dotbox add-college-div2\">\n" +
                "                            <i class=\"fa fa-plus plus-college\"></i>Add College</div>\n" +
                "                    </a>");
            $("#modalC2").html("  <a href=\"#!\" class=\"addC\">\n" +
                "                        <div class=\"flexColumnCenterMiddle dotbox add-college-div2\">\n" +
                "                            <i class=\"fa fa-plus plus-college\"></i>Add College</div>\n" +
                "                    </a>");
            $("#modalC1").html("  <a href=\"#!\" class=\"addC\">\n" +
                "                        <div class=\"flexColumnCenterMiddle dotbox add-college-div2\">\n" +
                "                            <i class=\"fa fa-plus plus-college\"></i>Add College</div>\n" +
                "                    </a>");
            bsOffcanvas.hide();
        });

      $(".closeoffBank").click(function () {
          $("#modalC3Bank").html("  <a href=\"#!\" class=\"addC\">\n" +
              "                        <div class=\"flexColumnCenterMiddle dotbox add-college-div2\">\n" +
              "                            <i class=\"fa fa-plus plus-college\"></i>Add College</div>\n" +
              "                    </a>");
          $("#modalC2Bank").html("  <a href=\"#!\" class=\"addC\">\n" +
              "                        <div class=\"flexColumnCenterMiddle dotbox add-college-div2\">\n" +
              "                            <i class=\"fa fa-plus plus-college\"></i>Add College</div>\n" +
              "                    </a>");
          $("#modalC1Bank").html("  <a href=\"#!\" class=\"addC\">\n" +
              "                        <div class=\"flexColumnCenterMiddle dotbox add-college-div2\">\n" +
              "                            <i class=\"fa fa-plus plus-college\"></i>Add College</div>\n" +
              "                    </a>");
          bsOffcanvasBank.hide();
      })

        //setup before functions
        var typingTimer;                //timer identifier
        var doneTypingInterval = 600;  //time in ms, 600ms second for example
      var typingTimer2;                //timer identifier
      var doneTypingInterval2 = 600;  //time in ms, 600ms second for example
        var $input = $('#exampleDataList');
      var $input2 = $('#exampleDataListExam');

        if(!$input.is(':focus')){
            $(".liveSearch").hide();
            $(".liveSearch ul").html("");
        }
      if(!$input2.is(':focus')){
          $(".liveSearchExam").hide();
          $(".liveSearchExam ul").html("");
      }
//on keyup, start the countdown
        $input.on('keyup', function () {
            console.log($input.val());
            if($input.val() == ""){
                $(".liveSearch").hide();
                $(".liveSearch").html("");
            }else {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(doneTyping, doneTypingInterval);
            }
        });
      $input2.on('keyup', function () {
          if($input2.val() == ""){
              $(".liveSearchExam").hide();
              $(".liveSearchExam ul").html("");
          }else {
              clearTimeout(typingTimer2);
              typingTimer = setTimeout(doneTyping2, doneTypingInterval2);
          }
      });

//on keydown, clear the countdown
        $input.on('keydown', function () {
            clearTimeout(typingTimer);
        });

      $input2.on('keydown', function () {
          clearTimeout(typingTimer2);
      });

//user is "finished typing," do something
        function doneTyping () {
            $.ajax({
                type:"GET",
                url : "/api/get_colleges",
                data : "data="+$input.val(),
                //async: false,
                success : function(response) {
                    console.log(response)
                    if(response == 0){
                        $(".liveSearch").hide();
                        $(".liveSearch").html("");
                    }
                    $(".liveSearch").show();
                    $(".liveSearch").html("");
                    $(".liveSearch").append("<p class=\"mb-0  ps-3\">Colleges</p>\n" +
                        "                                <ul class=\"list-unstyled ps-4\">");
                    for(var i = 0; i < response.length; i++) {
                        $(".liveSearch ul").append("<li>\n" +
                            "                                <a href=\"/college-in-"+response[i].location.cities.name.toLowerCase().replace(" ", "_")+"/"+response[i].seo[0].permalink+"\">" + response[i].name + "</a>\n" +
                            "                                    </li>");
                    }
                    $(".liveSearch").append("</ul>");
                },
                error: function(red) {
                    console.log(red);
                }
            });
        }

      function doneTyping2 () {
          $.ajax({
              type:"GET",
              url : "/api/get_exams",
              data : "data="+$input2.val(),
              //async: false,
              success : function(response) {
                  console.log(response)
                  if(response == 0){
                      $(".liveSearchExam").hide();
                      $(".liveSearchExam ul").html("");
                  }
                  $(".liveSearchExam").show();
                  $(".liveSearchExam ul").html("");
                  for(var i = 0; i < response.length; i++) {
                      $(".liveSearchExam ul").append("<li>\n" +
                          "                                <a href=\"/exam/"+response[i].catg[0].name+"\">" + response[i].exam_name + "</a>\n" +
                          "                                    </li>");
                  }
              },
              error: function(red) {
                  console.log(red);
              }
          });
      }

        $(".quickEnquiryDetail").on('click',function () {
            $("#prop_id_modal").val($(this).data('id'));
            $("#quickEnqCollegName").html($(this).data('name') + ", " +$(this).data('location'));
        });



        $("#viewAllCourse").on('click',function () {
            if($("#viewCourse").is(':visible')){
                $("#viewCourse").hide();
                $("#mainCourse").show();
                $("#viewCourse").html("");
                $(this).html("View All Courses");
            }else {
                $.ajax({
                    type: "GET",
                    url: "/api/get_courses",
                    data: "data=" + $(this).data('id'),
                    async: false,
                    success: function (response) {
                        $("#viewCourse").show();
                        $("#mainCourse").hide();
                        $("#viewAllCourse").html("Hide All Courses");
                        var body = "";
                        for (var j = 0; j < response.length; j++) {
                            var month = "";
                            var fee = "";
                            if (response[j].price == 0) {
                                fee = "N/A";
                            } else {
                                fee = response[j].price;
                            }
                            if (response[j].months == 12) {
                                month = "1 Year";
                            } else if (response[j].months == 24) {
                                month = "2 Year";
                            } else if (response[j].months == 36) {
                                month = "3 Year";
                            } else if (response[j].months == 48) {
                                month = "4 Year";
                            }
                            body += " <tr>\n" +
                                "                                        <td scope='row'>" + (j + 1) + "</td>\n" +
                                "                                        <td >" + response[j].name + "</td>\n" +
                                "                                        <td >" + month + "</td>\n" +
                                "                                        <td >" + fee + "</td>\n" +
                                "                                        <td ><a href=\"#\" class=\"btn site-btn-1 btn-sm text-white py-1\">Apply Now</a></td>\n" +
                                "                                    </tr>";
                        }
                        var html = " <table class=\"table table-striped table-bordered \">\n" +
                            "                                    <thead>\n" +
                            "                                    <tr>\n" +
                            "                                        <th scope=\"col\">#</th>\n" +
                            "                                        <th scope=\"col\">Course</th>\n" +
                            "                                        <th scope=\"col\">Time</th>\n" +
                            "                                        <th scope=\"col\">Fees(1st Year)</th>\n" +
                            "                                        <th scope=\"col\">Action</th>\n" +
                            "                                    </tr>\n" +
                            "                                    </thead>\n" +
                            "                                    <tbody>" + body + "\n" +
                            "                                    </tbody>\n" +
                            "                                </table>";

                        $("#viewCourse").append(html);
                    },
                    error: function (red) {
                        console.log(red);
                    }
                });
            }
        });
        $("#Alloverview").on('click',function (){
            $(this).removeClass('site-btn-2');
            $(this).addClass('site-btn-1');
            $("#overview").removeClass('site-btn-1');
            $("#overview").addClass('site-btn-2');
            $("#gallery").removeClass('site-btn-1');
            $("#gallery").addClass('site-btn-2');
            $("#coursesfees").removeClass('site-btn-1');
            $("#coursesfees").addClass('site-btn-2');
            $("#hostel").removeClass('site-btn-1');
            $("#hostel").addClass('site-btn-2');
            $("#faculty").removeClass('site-btn-1');
            $("#faculty").addClass('site-btn-2');
            $("#placement").removeClass('site-btn-1');
            $("#placement").addClass('site-btn-2');
             $("#scholarshipB").removeClass('site-btn-1');
            $("#scholarshipB").addClass('site-btn-2');
            $("#collegeDesc").show();
            $("#collegeCourse").show();
            $("#collegeGallery").show();
            $("#collegeVideo").show();
            $("#viewCourse").hide();
            $("#viewCourse").html("");
             $("#collegeFaculty").show();
              $("#collegeHostel").show();
              $("#collegePlacement").show();
               $("#collegeScholar").show();
             $("#mainImage").show();
            $("#viewImage").hide();
            $("#mainCourse").show();
            $("#viewDesc").hide();
            $("#mainDesc").show();
            $("#gallery1").removeClass('d-none');
             $("#overview1").removeClass('d-none');
             $("#coursesfees1").removeClass('d-none');
        });

        $("#overview").on('click',function (){
            $(this).removeClass('site-btn-2');
            $(this).addClass('site-btn-1');
             $("#overview1").addClass('d-none');
            $("#coursesfees").removeClass('site-btn-1');
            $("#coursesfees").addClass('site-btn-2');
            $("#gallery").removeClass('site-btn-1');
            $("#gallery").addClass('site-btn-2');
            $("#Alloverview").removeClass('site-btn-1');
            $("#Alloverview").addClass('site-btn-2');
             $("#hostel").removeClass('site-btn-1');
            $("#hostel").addClass('site-btn-2');
            $("#faculty").removeClass('site-btn-1');
            $("#faculty").addClass('site-btn-2');
              $("#placement").removeClass('site-btn-1');
            $("#placement").addClass('site-btn-2');
             $("#scholarshipB").removeClass('site-btn-1');
            $("#scholarshipB").addClass('site-btn-2');
            $("#collegeDesc").show();
            $("#collegePlacement").hide();
            $("#collegeCourse").hide();
            $("#collegeGallery").hide();
            $("#collegeFaculty").hide();
             $("#collegeScholar").hide();
              $("#collegeHostel").hide();
            $("#viewCourse").html("");
            $("#collegeVideo").hide();
            $("#viewDesc").show();
            $("#mainDesc").hide();
        });

        $("#scholarshipB").on('click',function (){
            $(this).removeClass('site-btn-2');
            $(this).addClass('site-btn-1');
             $("#overview1").addClass('d-none');
            $("#coursesfees").removeClass('site-btn-1');
            $("#coursesfees").addClass('site-btn-2');
            $("#gallery").removeClass('site-btn-1');
            $("#gallery").addClass('site-btn-2');
            $("#Alloverview").removeClass('site-btn-1');
            $("#Alloverview").addClass('site-btn-2');
             $("#hostel").removeClass('site-btn-1');
            $("#hostel").addClass('site-btn-2');
            $("#faculty").removeClass('site-btn-1');
            $("#faculty").addClass('site-btn-2');
              $("#placement").removeClass('site-btn-1');
            $("#placement").addClass('site-btn-2');
            $("#collegeDesc").hide();
            $("#collegePlacement").hide();
            $("#collegeScholar").show();
            $("#collegeCourse").hide();
            $("#collegeGallery").hide();
            $("#collegeFaculty").hide();
              $("#collegeHostel").hide();
            $("#viewCourse").html("");
            $("#collegeVideo").hide();
            $("#viewDesc").hide();
            $("#mainDesc").hide();
        });

        $("#overview1").on('click',function (){
            $(this).addClass('d-none');
            $("#overview").removeClass('site-btn-2');
            $("#overview").addClass('site-btn-1');
            $("#coursesfees").removeClass('site-btn-1');
            $("#coursesfees").addClass('site-btn-2');
            $("#gallery").removeClass('site-btn-1');
            $("#gallery").addClass('site-btn-2');
            $("#Alloverview").removeClass('site-btn-1');
            $("#Alloverview").addClass('site-btn-2');
             $("#placement").removeClass('site-btn-1');
            $("#placement").addClass('site-btn-2');
             $("#scholarshipB").removeClass('site-btn-1');
            $("#scholarshipB").addClass('site-btn-2');
            $("#collegeDesc").show();
            $("#collegeCourse").hide();
             $("#collegeScholar").hide();
            $("#collegeGallery").hide();
             $("#collegePlacement").hide();
            $("#viewCourse").html("");
            $("#collegeVideo").hide();
            $("#viewDesc").show();
            $("#mainDesc").hide();
        });

          $("#placement").on('click',function (){
            $(this).removeClass('site-btn-2');
            $(this).addClass('site-btn-1');
              $("#placement1").addClass('d-none');
              $("#overview").addClass('site-btn-2');
               $("#overview").removeClass('d-none');
            $("#coursesfees").removeClass('site-btn-1');
            $("#coursesfees").addClass('site-btn-2');
            $("#gallery").removeClass('site-btn-1');
            $("#gallery").addClass('site-btn-2');
            $("#Alloverview").removeClass('site-btn-1');
            $("#Alloverview").addClass('site-btn-2');
             $("#hostel").removeClass('site-btn-1');
            $("#hostel").addClass('site-btn-2');
            $("#faculty").removeClass('site-btn-1');
            $("#faculty").addClass('site-btn-2');
             $("#scholarshipB").removeClass('site-btn-1');
            $("#scholarshipB").addClass('site-btn-2');
            $("#collegeDesc").hide();
            $("#collegePlacement").show();
             $("#collegeScholar").hide();
            $("#collegeCourse").hide();
            $("#collegeGallery").hide();
            $("#collegeFaculty").hide();
              $("#collegeHostel").hide();
            $("#viewCourse").html("");
            $("#collegeVideo").hide();
            $("#viewDesc").hide();
            $("#mainDesc").hide();
              $("#mainPlacement").hide();
              $("#viewPlacement").show();
        });
          $("#placement1").on('click',function (){
          $(this).addClass('d-none');
          $("#placement").addClass('site-btn-1');
              $("#placement").removeClass('site-btn-2');
          $("#overview").addClass('site-btn-2');
          $("#overview").removeClass('d-none');
          $("#coursesfees").removeClass('site-btn-1');
          $("#coursesfees").addClass('site-btn-2');
          $("#gallery").removeClass('site-btn-1');
          $("#gallery").addClass('site-btn-2');
          $("#Alloverview").removeClass('site-btn-1');
          $("#Alloverview").addClass('site-btn-2');
          $("#hostel").removeClass('site-btn-1');
          $("#hostel").addClass('site-btn-2');
          $("#faculty").removeClass('site-btn-1');
          $("#faculty").addClass('site-btn-2');
          $("#scholarshipB").removeClass('site-btn-1');
          $("#scholarshipB").addClass('site-btn-2');
          $("#collegeDesc").hide();
          $("#collegePlacement").show();
          $("#collegeScholar").hide();
          $("#collegeCourse").hide();
          $("#collegeGallery").hide();
          $("#collegeFaculty").hide();
          $("#collegeHostel").hide();
          $("#viewCourse").html("");
          $("#collegeVideo").hide();
          $("#viewDesc").hide();
          $("#mainDesc").hide();
          $("#mainPlacement").hide();
          $("#viewPlacement").show();
      });

        $("#coursesfees").on('click',function (){
            if($("#coursesfees").hasClass('site-btn-2')){
            $.ajax({
                type: "GET",
                url: "/api/get_courses",
                data: "data=" + $(this).data('id'),
                async: false,
                success: function (response) {
                    $("#viewCourse").show();
                    $("#mainCourse").hide();
                    // $("#viewAllCourse").html("Hide All Courses");
                    var body = "";
                    for (var j = 0; j < response.length; j++) {
                        var month = "";
                        var fee = "";
                        if (response[j].price == 0) {
                            fee = "N/A";
                        } else {
                            fee = response[j].price;
                        }
                        body += " <tr>\n" +
                            "                                        <td scope='row'>" + (j + 1) + "</td>\n" +
                            "                                        <td >" + response[j].streams[0].name + "</td>\n" +
                            "                                        <td >" + response[j].year + " Years</td>\n" +
                            "                                        <td ><i class=\"fa fa-rupee\" aria-hidden=\"true\"></i>" + fee + "</td>\n" +
                            "                                        <td >" + response[j].eligibility + "</td>\n" +
                            "                                        <td ><a href=\"#\" class=\"btn site-btn-1 btn-sm text-white py-1\">Apply Now</a></td>\n" +
                            "                                    </tr>";
                    }
                    var html = " <table class=\"table table-striped table-bordered \">\n" +
                        "                                    <thead>\n" +
                        "                                    <tr>\n" +
                        "                                        <th scope=\"col\">#</th>\n" +
                        "                                        <th scope=\"col\">Course</th>\n" +
                        "                                        <th scope=\"col\">Years</th>\n" +
                        "                                        <th scope=\"col\">Fees(1st yr)</th>\n" +
                        "                                        <th scope=\"col\">Eligibility</th>\n" +
                        "                                        <th scope=\"col\">Action</th>\n" +
                        "                                    </tr>\n" +
                        "                                    </thead>\n" +
                        "                                    <tbody>" + body + "\n" +
                        "                                    </tbody>\n" +
                        "                                </table>";

                    $("#viewCourse").append(html);
                },
                error: function (red) {
                    console.log(red);
                }
            });
            }
            $(this).removeClass('site-btn-2');
            $(this).addClass('site-btn-1');
            $("#coursesfees1").addClass('d-none');
            $("#overview").removeClass('site-btn-1');
            $("#overview").addClass('site-btn-2');
            $("#gallery").removeClass('site-btn-1');
            $("#gallery").addClass('site-btn-2');
            $("#Alloverview").removeClass('site-btn-1');
            $("#Alloverview").addClass('site-btn-2');
             $("#scholarshipB").removeClass('site-btn-1');
            $("#scholarshipB").addClass('site-btn-2');
             $("#placement").removeClass('site-btn-1');
            $("#placement").addClass('site-btn-2');
             $("#hostel").removeClass('site-btn-1');
            $("#hostel").addClass('site-btn-2');
            $("#faculty").removeClass('site-btn-1');
            $("#faculty").addClass('site-btn-2');
            $("#collegeDesc").hide();
            $("#collegeCourse").show();
             $("#collegeScholar").hide();
            $("#collegeGallery").hide();
             $("#collegePlacement").hide();
             $("#collegeFaculty").hide();
              $("#collegeHostel").hide();
            $("#collegeVideo").hide();
        });
        $("#coursesfees1").on('click',function (){
             $(this).addClass('d-none');
            if($("#coursesfees").hasClass('site-btn-2')){
            $.ajax({
                type: "GET",
                url: "/api/get_courses",
                data: "data=" + $(this).data('id'),
                async: false,
                success: function (response) {
                    $("#viewCourse").show();
                    $("#mainCourse").hide();
                    // $("#viewAllCourse").html("Hide All Courses");
                    var body = "";
                    for (var j = 0; j < response.length; j++) {
                        var month = "";
                        var fee = "";
                        if (response[j].price == 0) {
                            fee = "N/A";
                        } else {
                            fee = response[j].price;
                        }
                        body += " <tr>\n" +
                            "                                        <td scope='row'>" + (j + 1) + "</td>\n" +
                            "                                        <td >" + response[j].streams[0].name + "</td>\n" +
                            "                                        <td >" + response[j].year + " Years</td>\n" +
                            "                                        <td ><i class=\"fa fa-rupee\" aria-hidden=\"true\"></i>" + fee + "</td>\n" +
                            "                                        <td >" + response[j].eligibility + "</td>\n" +
                            "                                        <td ><a href=\"#\" class=\"btn site-btn-1 btn-sm text-white py-1\">Apply Now</a></td>\n" +
                            "                                    </tr>";
                    }
                    var html = " <table class=\"table table-striped table-bordered \">\n" +
                        "                                    <thead>\n" +
                        "                                    <tr>\n" +
                        "                                        <th scope=\"col\">#</th>\n" +
                        "                                        <th scope=\"col\">Course</th>\n" +
                        "                                        <th scope=\"col\">Years</th>\n" +
                        "                                        <th scope=\"col\">Fees</th>\n" +
                        "                                        <th scope=\"col\">Eligibility</th>\n" +
                        "                                        <th scope=\"col\">Action</th>\n" +
                        "                                    </tr>\n" +
                        "                                    </thead>\n" +
                        "                                    <tbody>" + body + "\n" +
                        "                                    </tbody>\n" +
                        "                                </table>";

                    $("#viewCourse").append(html);
                },
                error: function (red) {
                    console.log(red);
                }
            });
            }
            $("#coursesfees").removeClass('site-btn-2');
            $("#coursesfees").addClass('site-btn-1');
            $("#overview").removeClass('site-btn-1');
            $("#overview").addClass('site-btn-2');
            $("#gallery").removeClass('site-btn-1');
            $("#gallery").addClass('site-btn-2');
            $("#Alloverview").removeClass('site-btn-1');
            $("#Alloverview").addClass('site-btn-2');
             $("#scholarshipB").removeClass('site-btn-1');
            $("#scholarshipB").addClass('site-btn-2');
            $("#collegeDesc").hide();
            $("#collegeCourse").show();
            $("#collegeGallery").hide();
             $("#collegeScholar").hide();
            $("#collegeVideo").hide();
        });

         $("#faculty").on('click',function (){
        $(this).removeClass('site-btn-2');
        $(this).addClass('site-btn-1');
        $("#coursesfees").removeClass('site-btn-1');
        $("#coursesfees").addClass('site-btn-2');
        $("#gallery").removeClass('site-btn-1');
        $("#gallery").addClass('site-btn-2');
        $("#Alloverview").removeClass('site-btn-1');
        $("#Alloverview").addClass('site-btn-2');
         $("#placement").removeClass('site-btn-1');
            $("#placement").addClass('site-btn-2');
        $("#hostel").removeClass('site-btn-1');
        $("#hostel").addClass('site-btn-2');
        $("#overview").addClass('site-btn-2');
         $("#scholarshipB").removeClass('site-btn-1');
            $("#scholarshipB").addClass('site-btn-2');
               $("#overview").removeClass('d-none');
        $("#collegeDesc").hide();
        $("#collegeFaculty").show();
         $("#collegeScholar").hide();
        $("#collegeHostel").hide();
        $("#viewFaculty").show()
             $("#mainFaculty").hide()

        $("#collegeCourse").hide();
         $("#collegePlacement").hide();
        $("#collegeGallery").hide();
        $("#viewCourse").html("");
        $("#collegeVideo").hide();
    });

    $("#hostel").on('click',function (){
        $(this).removeClass('site-btn-2');
        $(this).addClass('site-btn-1');
        $("#coursesfees").removeClass('site-btn-1');
        $("#coursesfees").addClass('site-btn-2');
        $("#gallery").removeClass('site-btn-1');
        $("#gallery").addClass('site-btn-2');
        $("#Alloverview").removeClass('site-btn-1');
        $("#Alloverview").addClass('site-btn-2');
        $("#faculty").removeClass('site-btn-1');
        $("#faculty").addClass('site-btn-2');
         $("#placement").removeClass('site-btn-1');
            $("#placement").addClass('site-btn-2');
            $("#overview").addClass('site-btn-2');
             $("#scholarshipB").removeClass('site-btn-1');
            $("#scholarshipB").addClass('site-btn-2');
               $("#overview").removeClass('d-none');
        $("#collegeDesc").hide();
        $("#collegeFaculty").hide();
        $("#collegeHostel").show();
        $("#collegeCourse").hide();
         $("#collegeScholar").hide();
         $("#collegePlacement").hide();
        $("#collegeGallery").hide();
        $("#viewHostel").html("");
        $("#collegeVideo").hide();
    });

        $("#gallery").on('click',function (){
            $(this).removeClass('site-btn-2');
            $(this).addClass('site-btn-1');
            $("#gallery1").addClass('d-none');
            $("#overview").removeClass('site-btn-1');
            $("#overview").addClass('site-btn-2');
            $("#coursesfees").removeClass('site-btn-1');
            $("#coursesfees").addClass('site-btn-2');
            $("#Alloverview").removeClass('site-btn-1');
            $("#Alloverview").addClass('site-btn-2');
             $("#faculty").removeClass('site-btn-1');
            $("#faculty").addClass('site-btn-2');
             $("#hostel").removeClass('site-btn-1');
            $("#hostel").addClass('site-btn-2');
             $("#placement").removeClass('site-btn-1');
            $("#placement").addClass('site-btn-2');
             $("#scholarshipB").removeClass('site-btn-1');
            $("#scholarshipB").addClass('site-btn-2');
            $("#collegeDesc").hide();
             $("#collegeScholar").hide();
            $("#collegeCourse").hide();
            $("#collegeFaculty").hide();
            $("#collegeHostel").hide();
             $("#collegePlacement").hide();
            $("#collegeGallery").show();
            $("#viewCourse").html("");
            $("#collegeVideo").hide();
            $("#mainImage").hide();
            $("#viewImage").show();
        });
        $("#gallery1").on('click',function (){
            $(this).addClass('d-none');
            $("#gallery").removeClass('site-btn-2');
            $("#gallery").addClass('site-btn-1');
            $("#overview").removeClass('site-btn-1');
            $("#overview").addClass('site-btn-2');
            $("#coursesfees").removeClass('site-btn-1');
            $("#coursesfees").addClass('site-btn-2');
            $("#Alloverview").removeClass('site-btn-1');
            $("#Alloverview").addClass('site-btn-2');
             $("#placement").removeClass('site-btn-1');
            $("#placement").addClass('site-btn-2');
             $("#scholarshipB").removeClass('site-btn-1');
            $("#scholarshipB").addClass('site-btn-2');
            $("#collegeDesc").hide();
            $("#collegeCourse").hide();
             $("#collegePlacement").hide();
            $("#collegeGallery").show();
             $("#collegeScholar").hide();
            $("#viewCourse").html("");
            $("#collegeVideo").hide();
            $("#mainImage").hide();
            $("#viewImage").show();
        });


        $("#registerNow").on('click',function () {
            $(".loginForm").hide();
            $(".registerForm").show();
        });
        $("#loginNow").on('click',function () {
            $(".loginForm").show();
            $(".registerForm").hide();
        });

         $(".sortPopularity").on('click',function () {
        $(this).removeClass('bg-transparent');
        $(this).addClass('btn-primary');
        var url = window.location.href;
        console.log(url);
        var arr = url.split('?');
        console.log(arr);
        if (url.length > 1 && arr.length > 1) {
            console.log('params found');
        }else {
            $.ajax({
                type: "GET",
                url: "/api/get_colleges_search",
                data: "popularity=desc",
                async: false,
                success: function (response) {
                    console.log(response);
                    var review;
                    $("#searchData").html('');
                    for (var i=0; i < response.length; i++) {
                        var featured="";
                        var courses="";
                        for (var c=3; c < response[i].courses.length; c++){
                            courses += "<a href=\"\"><span class=\"badge rounded-pill bg-light text-dark\">"+response[i].courses[c].name+"</span></a>,";
                        }
                        if(response[i].rev == null){
                            review = 0;
                        }else{
                            review = response[i].rev;
                        }
                        if(response[i].featured == 1){
                            featured = "<div class=\"ribbon\"><span>featured</span></div>";
                        }
                        $("#searchData").append("<div class=\"row college-info-2\">\n" +
                            "    <div class=\"col-md-4\">\n" +
                            "        <div class=\"position-relative\">\n" +
                            "            <div class=\"cover-img box\" style=\"background:url(/property/images/"+JSON.parse(response[i].images[0].images)[0]+");background-size:cover;\">\n" +featured+
                            "                <div class=\"college-info-logo position-absolute bottom-0 start-5 p-2 \">\n" +
                            "                    <a href=\"/college-in-"+response[i].cities.name.replace(' ','_').toLowerCase()+"/"+response[i].seo[0].permalink+"\"> <img src=\"/property/logo/images/"+response[i].logo+"\" alt=\"\"></a>\n" +
                            "                </div>\n" +
                            "            </div>\n" +
                            "        </div>\n" +
                            "    </div>\n" +
                            "    <div class=\"col-md-8 college-info position-relative\">\n" +
                            "        <p><a href=\"/college-in-"+response[i].cities.name.replace(' ','_').toLowerCase()+"/"+response[i].seo[0].permalink+"\">"+response[i].name+"</a></p>\n" +
                            "        <p><span><i class=\"fas fa-map-marker-alt\"></i> "+response[i].states[0].name+", <i class=\"fas fa-certificate\"></i> UNI</span></p>\n" +
                            "        <p>\n" + courses + "</p>\n" +
                            "        <div class=\"position-absolute top-0 end-0 pe-2\">\n" +
                            "            <span class=\"badge bg-warning\"><i class=\"far fa-star\"></i> "+review+" /5</span>\n" +
                            "        </div>\n" +
                            "        <div class=\"position-absolute bottom-0 end-0 pe-2 pb-2\">\n" +
                            "            <a href=\"#\" class=\"btn site-btn-1 btn-sm text-white\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\">Quick Enquiry</a>\n" +
                            "            <a href=\"/college-in-"+response[i].cities.name.replace(' ','_').toLowerCase()+"/"+response[i].seo[0].permalink+"\" class=\"btn site-btn-1 btn-sm text-white\">Visit College</a>\n" +
                            "            <button type=\"button\" data-id=\""+response[i].id+"\" data-name=\""+response[i].name+"\" data-image=\""+response[i].logo+"\" class=\"btn site-btn-2 btn-sm openCompare\" >Compare</button>\n" +
                            "        </div>\n" +
                            "    </div>\n" +
                            "</div>");
                        var new_url = url + "?" +$.param({'sort': 'popularity_desc'});
                        history.pushState({}, null, new_url);
                    }

                },
                error: function () {
                    console.log('Error occured');
                }
            });
        }
    });

    $(".sortRating").on('click',function () {
        $(this).removeClass('bg-transparent');
        $(this).addClass('btn-primary');
        var url = window.location.href;
        console.log(url);
        var arr = url.split('?');
        console.log(arr);
        if (url.length > 1 && arr.length > 1) {
            console.log('params found');
        }else {
            $.ajax({
                type: "GET",
                url: "/api/get_colleges_search",
                data: "rating=desc",
                async: false,
                success: function (response) {
                    console.log(response);
                    var review;
                    $("#searchData").html('');
                    for (var i=0; i < response.length; i++) {
                        var featured="";
                        var courses="";
                        for (var c=3; c < response[i].courses.length; c++){
                            courses += "<a href=\"\"><span class=\"badge rounded-pill bg-light text-dark\">"+response[i].courses[c].name+"</span></a>,";
                        }
                        if(response[i].rev == null){
                            review = 0;
                        }else{
                            review = response[i].rev;
                        }
                        if(response[i].featured == 1){
                            featured = "<div class=\"ribbon\"><span>featured</span></div>";
                        }
                        $("#searchData").append("<div class=\"row college-info-2\">\n" +
                            "    <div class=\"col-md-4\">\n" +
                            "        <div class=\"position-relative\">\n" +
                            "            <div class=\"cover-img box\" style=\"background:url(/property/images/"+JSON.parse(response[i].images[0].images)[0]+");background-size:cover;\">\n" +featured+
                            "                <div class=\"college-info-logo position-absolute bottom-0 start-5 p-2 \">\n" +
                            "                    <a href=\"/college-in-"+response[i].cities.name.replace(' ','_').toLowerCase()+"/"+response[i].seo[0].permalink+"\"> <img src=\"/property/logo/images/"+response[i].logo+"\" alt=\"\"></a>\n" +
                            "                </div>\n" +
                            "            </div>\n" +
                            "        </div>\n" +
                            "    </div>\n" +
                            "    <div class=\"col-md-8 college-info position-relative\">\n" +
                            "        <p><a href=\"/college-in-"+response[i].cities.name.replace(' ','_').toLowerCase()+"/"+response[i].seo[0].permalink+"\">"+response[i].name+"</a></p>\n" +
                            "        <p><span><i class=\"fas fa-map-marker-alt\"></i> "+response[i].states[0].name+", <i class=\"fas fa-certificate\"></i> UNI</span></p>\n" +
                            "        <p>\n" + courses + "</p>\n" +
                            "        <div class=\"position-absolute top-0 end-0 pe-2\">\n" +
                            "            <span class=\"badge bg-warning\"><i class=\"far fa-star\"></i> "+review+" /5</span>\n" +
                            "        </div>\n" +
                            "        <div class=\"position-absolute bottom-0 end-0 pe-2 pb-2\">\n" +
                            "            <a href=\"#\" class=\"btn site-btn-1 btn-sm text-white\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\">Quick Enquiry</a>\n" +
                            "            <a href=\"/college-in-"+response[i].cities.name.replace(' ','_').toLowerCase()+"/"+response[i].seo[0].permalink+"\" class=\"btn site-btn-1 btn-sm text-white\">Visit College</a>\n" +
                            "            <button type=\"button\" data-id=\""+response[i].id+"\" data-name=\""+response[i].name+"\" data-image=\""+response[i].logo+"\" class=\"btn site-btn-2 btn-sm openCompare\" >Compare</button>\n" +
                            "        </div>\n" +
                            "    </div>\n" +
                            "</div>");
                        var new_url = url + "?" +$.param({'sort': 'popularity_desc'});
                        history.pushState({}, null, new_url);
                    }

                },
                error: function () {
                    console.log('Error occured');
                }
            });
        }
    });
    });

    $('.review-button').click(function(e){
        e.preventDefault();
       var name = $('.review-name').val();
        var email = $('.review-email').val();
         var sub = $('.review-subject').val();
          var msg = $('.review-message').val();
          if(name == null || name == ""){
              alert('Enter Name');
          }else if(email == null || email == ""){
              alert('Enter Email');
          }else if(sub == null || sub == ""){
              alert('Enter Subject');
          }else if(msg == null || msg == ""){
              alert('Enter Message');
          }else{
              return true;
          }

    });

    $("#joinCyber").one('click',function () {
        $("#joinCyber #joinCLoader").removeClass('d-none');
        var name = $('.joinCyberName').val();
        var contact = $('.joinCyberContact').val();
        var email = $('.joinCyberMail').val();
        var cafe = $('.joinCyberCafe').val();
        var city = $('.joinCyberCity').val();
        if(name == null || name == ""){
            alert('Enter Name');
        }else if(email == null || email == ""){
            alert('Enter Email');
        }else if(contact == null || contact == ""){
            alert('Enter Contact Number');
        }else if(cafe == null || cafe == ""){
            alert('Enter Your Cafe Name');
        }else if(city == null || city == ""){
            alert('Enter Your City');
        }else{
            $.ajax({
                type: "GET",
                url: "/api/join_cyber",
                data: {
                    'name': name,
                    'email': email,
                    'contact': contact,
                    'cafe': cafe,
                    'city': city
                },
                async: false,
                success: function (response) {
                    console.log(response);
                    // if(response != 0){
                        $('.joinCyberName').val('');
                        $('.joinCyberContact').val('');
                        $('.joinCyberMail').val('');
                        $('.joinCyberCafe').val('');
                        $('.joinCyberCity').val('');
                        $("#joinCyber").addClass('d-none');
                        $("#successJoinCyber").removeClass('d-none');
                    // }else{
                    //     $("#joinCyber #joinCLoader").addClass('d-none');
                    //     alert('Email Already Exist');
                    // }
                },
                error: function () {
                        console.log('Error occured');
                    }
                });
        }
    })

