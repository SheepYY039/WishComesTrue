<?php
$servername = "localhost";
$username = "id15251966_requested_wishes";
$password = "WCThk2020-WCThk2020";
$dbname = "id15251966_wishes";

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $dbname);

// CHECK DATABASE CONNECTION
if (mysqli_connect_errno()) {
  echo "Connection Failed" . mysqli_connect_error();
  exit;
}
$sql = "SELECT `Wish_id`,`Wish_name`,`Project_type`,`Minority_groups`,`Donating_type`,`Organization_name`,`District`, `Start_date`, `End_date` FROM `tbl_wishes` WHERE `isApproved` = 1";
$result = mysqli_query($conn, $sql);

?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style type="text/css">
  .field {
    display: flex;
    margin: auto;
    padding: 3%;
    border-bottom: black solid;
    border-bottom-width: thin;
  }

  .field h4 {
    margin: 0 auto;
    max-width: 40%;
    height: 100%;
  }

  .field h5 {
    margin: auto;
  }
  </style>
  <title>Wishes Come True | Volunteer</title>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#about').click(function() {
      window.location = './index.php';
      jQuery(window).trigger('resize').trigger('scroll');

    });
    $('#donate').click(function() {
      $('.body').load('./donate.html');
      jQuery(window).trigger('resize').trigger('scroll');
    });
    $('#volunteer').click(function() {
      $('.body').load('./volunteer.php');
    });
    $('.nav-item a').on('click', function() {
      $('.nav-item a').removeClass('active');
      $(this).addClass('active');
    });
  });
  </script>
</head>

<body>
  <div class="burger">
    <div class="line1"></div>
    <div class="line2"></div>
    <div class="line3"></div>
  </div>
  <div class="filters">
    <div class="filter__title">
      <span>
        <h2>Filters</h2>
      </span>
    </div>
    <div class="search">
      <form action="" onsubmit="return false" id="searchbar1">
        <label for="search">
          <span class="fa fa-search" id="srchbtn" onclick="searchfunction()"></span>
        </label>
        <input type="search" placeholder="Search..." name="search" id="search" />
      </form>
    </div>
    <script type="text/javascript">
    document.getElementById("searchbar1").onkeypress=function(e){
        var k = e.which;
        if(k==13){searchfunction()}
    }
    
    var getSearchKeyInterval = setInterval(function() {
      sessionStorage.srchk = document.getElementById("search").value;
    },100);
    </script>
    <script>
            
          var listOfAllAprovedWishes = <?php
            $sth = mysqli_query($conn, "SELECT `Wish_id`,`Wish_name`,`Project_type`,`Minority_groups`,`Donating_type`,`Organization_name`,`District`, `Start_date`, `End_date` FROM `tbl_wishes` WHERE `isApproved` = 1");
            $rowZ = array();
            while($r = mysqli_fetch_assoc($sth)) {
                 $rowZ[] = $r;
            }
            print json_encode($rowZ);
            ?>;
            var checkSetup= setInterval(function(){if(sessionStorage.displayWishList==undefined){sessionStorage.displayWishList=JSON.stringify(listOfAllAprovedWishes)}},100);
            if(sessionStorage.reloaded=="true"){sessionStorage.displayWishList=JSON.stringify(listOfAllAprovedWishes);sessionStorage.srchk="";}
            function searchfunction(){
                var listOfAllFilters = ["Children", "Homeless", "Elderly", "Low-income", "Funding", "Second-hand", "Food", "Individual","Group", "Reachable", "Reach", "Short", "Long", "New", "Old","Others"
              ];
        
              var listOfAcceptedFilters = [];
              var abb = 0;
              for (var dbcd = 0; dbcd < 15; dbcd++) {
                if (document.getElementById(listOfAllFilters[dbcd]).checked == true) {
                  listOfAcceptedFilters[abb] = listOfAllFilters[dbcd];
                  abb++;
                }
              }
            var searchAndFiltersAppliedList = [];
            var filteredlist=[];
            var itExtra = 0;
            for (var it1=0;it1<listOfAllAprovedWishes.length;it1++){
             var fInMG = listOfAllAprovedWishes[it1].Minority_groups.split("| ");
             var fInPT = listOfAllAprovedWishes[it1].Project_type.split("| ");
             var CombinedWishTags = [];
             for (var it2 = 0; it2<fInMG.length-1;it2++){CombinedWishTags[it2] =fInMG[it2]}
             for (var it3 = 0; it3<fInPT.length-1;it3++){CombinedWishTags[fInMG.length-1+it3]=fInPT[it3]}
             var approv =0;
             for(var it4=0;it4<listOfAcceptedFilters.length;it4++){
                 for(var gg=0;gg<CombinedWishTags.length;gg++){
                     var comp1=JSON.parse(JSON.stringify(listOfAcceptedFilters[it4])); 
                     var comp2= JSON.parse(JSON.stringify(CombinedWishTags[gg]));
                     console.log(a,b,typeof a,typeof b);
                     if(comp1==comp2.slice(0,-1)){
                         approv++;
                         break;
                         console.log(approv);
                     }
                     comp1=" ";comp2=" ";
                 }
             }
             /*
             for (var gg = 0 ;gg<lif.length;gg++){
                 for (var bb =0; bb<filters.length;bb++){
                     if(filters[bb] == lif[gg]){
                         approv++;
                     }
                 }
             }
             */
            
             console.log(approv,CombinedWishTags.length,listOfAcceptedFilters.length);
             if(approv==listOfAcceptedFilters.length && listOfAcceptedFilters.length!=0){
             filteredlist[listOfAllFiltersni] = listOfAllAprovedWishes[it1].Wish_name;
             listOfAllFiltersni++;
             }
            }
            var listOfAllFiltersn=0;
            var srchk = sessionStorage.srchk;
            if(srchk!=""){
            for (var g = 0; g < filteredlist.length; g++) {
                  if (check1(rearrange(filteredlist[g], srchk)) > 0) {
                    searchAndFiltersAppliedList[listOfAllFiltersn] = filteredlist[g];
                    listOfAllFiltersn++;
                  }
                }
            }
            else{
                for(var ggg =0;ggg<filteredlist.length;ggg++){
                    searchAndFiltersAppliedList[ggg]=filteredlist[ggg];
                }
            }
              var lSbuffer=[];
              var breaking=0;
              var ji = 0;
              for(y in searchAndFiltersAppliedList){
                  for(x in listOfAllAprovedWishes){
                      if (searchAndFiltersAppliedList[y]==listOfAllAprovedWishes[x].Wish_name){lSbuffer[ji]=listOfAllAprovedWishes[x];ji++;}
                      }
                  }
              for(var x=0;x<lSbuffer.length;x++){
                  for(var y = x+1;y<lSbuffer.length;y++){
                      if(lSbuffer[x].Wish_id==lSbuffer[y].Wish_id){
                          lSbuffer[y]="";
                        for(var z=y+1;z<lSbuffer.length;z++){
                            lSbuffer[z-1]=lSbuffer[z];
                            if(z=lSbuffer.length-1){lSbuffer[z]=""};
                        }
                          
                      }
                  }
              }
              sessionStorage.displayWishList=JSON.stringify(lSbuffer);
              

            }
            
            /*
            function searchfunction() {
              var srchk = sessionStorage.srchk
              var listOfAllFilters = ["children", "homeless", "elderly", "low-income", "funding", "second-hand", "food", "individual","group", "reachable", "reach", "short", "long", "new", "old"
              ];
              alert(srchk);}
        
              var filters = [];
              var abb = 0;
              for (var dbcd = 0; dbcd < 15; dbcd++) {
                if (sessionStorage[dbcd]) == true) {
                  filters[abb] = listOfAllFilters[dbcd];
                  abb++;
                }
              }
              var filteredlist = [];
              var b = 0;
              for (var j in WhishesDB) {
                var approv = 0;
                for (var c = 0; c < WhishesDB[j].tags.length; c++) {
                  for (var x = 0; x < filters.length; x++) {
                    if (filters[x] == WhishesDB[j].tags[c]) {
                      approv += 1;
                    }
                  }
                }
                if (approv == filters.length) {
                  filteredlist[b] = j;
                  b++;
                }
                var searchAndFiltersAppliedList = [];
                var listOfAllFiltersn = 0;
                for (var g = 0; g < filteredlist.length; g++) {
                  if (check1(rearrange(filteredlist[g], srchk)) > 0) {
                    searchAndFiltersAppliedList[listOfAllFiltersn] = filteredlist[g];
                    listOfAllFiltersn++;
                  }
                }
              }
              alert(filteredlist + " " + searchAndFiltersAppliedList); 
              
            }
            */
            function rearrange(movieName, inputName1) {
              var newName = movieName.replace(/:/g, "").split(" "),
                newInputName = inputName1.replace(/:/g, "").split(" "),
                k = newName.length - 1;
              for (var i = 0; i <= k; i++) {
                newName[i] = newName[i].toLowerCase();
                if (newName[i] === "") {
                  newName.splice(i, 1);
                  i--;
                  k--;
                }
              }
              k = newInputName.length - 1;
              for (i = 0; i <= k; i++) {
                newInputName[i] = newInputName[i].toLowerCase();
                if (newInputName[i] === "") {
                  newInputName.splice(i, 1);
                  i--;
                  k--;
                }
              }
              newName.sort(),
                newInputName.sort();
              return {
                movieName: newName,
                inputName: newInputName
              };
            };
        
            function check1(obj) {
              var inputName = obj.inputName,
                movieName = obj.movieName,
                occurances = 0,
                k = movieName.length,
                movieNameLength = movieName.length;
              for (var i = 0; i < k; i++) {
                var currentValue = inputName[i];
                if (currentValue === movieName[i]) {
                  inputName.splice(i, 1);
                  movieName.splice(i, 1);
                  k--;
                  i--;
                  occurances++;
                } else {
                  for (var j = 0; j < movieName.length; j++) {
                    if (currentValue === movieName[j]) {
                      inputName.splice(i, 1);
                      movieName.splice(j, 1);
                      k--;
                      occurances++;
                      break;
                    }
                  }
                }
              }
              if (inputName == "") {
                occurances = movieNameLength
              }
              return occurances / movieNameLength;
            }
        
            //character-by-character check
            function check2(inputName, movieName) {
              var counter = 0,
                newInputName = inputName.trim(d, s)
              for (var i = 0; i <= inputName.length; i++) {
                var inputChar = newInputName.charAt(i),
                  movieChar = movieName.charAt(i);
                if (inputChar === movieChar) {
                  counter++;
                }
              }
              return counter / movieName.length;
            }
          </script>
    
    <div class="minority-groups">
      <h3>Minority Groups</h3>
      <form action="">
        <label class="checkbox__label">
          Children
          <input type="checkbox" id="Children" name="minority-group-children" value="children" />
          <span class="checkbox__custom"></span>
        </label>
        <label class="checkbox__label">
          Homeless
          <input type="checkbox" id="Homeless" name="minority-group-homeless" value="homeless" />
          <span class="checkbox__custom"></span>
        </label>
        <label class="checkbox__label">
          Elderly
          <input type="checkbox" id="Elderly" name="minority-group-elderly" value="elderly" />
          <span class="checkbox__custom"></span>
        </label>
        <label class="checkbox__label">
          Low Income
          <input type="checkbox" id="Low-income" name="minority-group-low-income" value="low-income" />
          <span class="checkbox__custom"></span>
        </label>
        <label class="checkbox__label">
          Others
          <input type="checkbox" id="Others" name="minority-group-others" value="others" />
          <span class="checkbox__custom"></span>
        </label>
      </form>
    </div>
    <div class="donating-types">
      <h3>Donating Types</h3>
      <form action="">
        <label class="checkbox__label">
          Funding
          <input type="checkbox" id="Funding" name="donating-type-funding" value="funding" />
          <span class="checkbox__custom"></span>
        </label>
        <label class="checkbox__label">
          Second Hand
          <input type="checkbox" id="Second-hand" name="donating-type-second-hand" value="second-hand" />
          <span class="checkbox__custom"></span>
        </label>
        <label class="checkbox__label">
          Food
          <input type="checkbox" id="Food" name="donating-type-food" value="food" />
          <span class="checkbox__custom"></span>
        </label>

        <label class="checkbox__label">
          Others
          <input type="checkbox" id="Others-d" name="donating-type-others" value="others" />
          <span class="checkbox__custom"></span>
        </label>
      </form>
    </div>
    <div class="project-types">
      <h3>Project Types</h3>
      <form action="">
        <table>
          <tr>
            <td>
              <label class="checkbox__label">
                Individual
                <input type="checkbox" id="Individual" name="project-type-individual" value="individual" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
            <td>
              <label class="checkbox__label">
                Group
                <input type="checkbox" id="Group" name="project-type-group" value="group" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
          </tr>
          <tr>
            <td>
              <label class="checkbox__label">
                Reachable
                <input type="checkbox" id="Reachable" name="project-type-reachable" value="reachable" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
            <td>
              <label class="checkbox__label">
                Reach
                <input type="checkbox" id="Reach" name="project-type-reach" value="reach" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
          </tr>
          <tr>
            <td>
              <label class="checkbox__label">
                Short
                <input type="checkbox" id="Short" name="project-type-short" value="short" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
            <td>
              <label class="checkbox__label">
                Long
                <input type="checkbox" id="Long" name="project-type-long" value="long" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
          </tr>
          <tr>
            <td>
              <label class="checkbox__label">
                New
                <input type="checkbox" id="New" name="project-type-new" value="new" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
            <td>
              <label class="checkbox__label">
                Old
                <input type="checkbox" id="Old" name="project-type-old" value="old" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>

  <section class="content">
    <nav>
      <div class="nav-parent">
        <div class="nav-dropdown" id="nav-dropdown">
          <div class="dropdown-btn">
            <p>DROPDOWN</p>
          </div>

          <ul id="dropdown-content">
            <a href="#" id="about-dropdown">ABOUT US</a>
            <a href="#" id="donate-dropdown">DONATE</a>
            <a href="#" id="volunteer-dropdown">VOLUNTEER</a>
          </ul>
        </div>
      </div>
      <ul class="nav">
        <li class="nav-item">
          <a href="#" id="about">ABOUT US</a>
        </li>
        <li class="nav-item">
          <a href="#" id="donate">DONATE</a>
        </li>
        <li class="nav-item"><a href="#" class="active" id="volunteer">VOLUNTEER</a></li>
      </ul>
    </nav>
    <div id="body">
      <div id="wishescontainermain" class="wishes">
          <style>
              .parrot{
                  width:500px;
                  height:400px;
                  background-color:black;
                  color:white;
              }
          </style>
          <script type="text/javascript">
          var search = setInterval(function(){
            var wishdb = JSON.parse(sessionStorage.displayWishList);
            var searchAndFiltersAppliedListst=[]; var bhb =0;
            for(x=0;x<wishdb.length;x++){
                if(wishdb[x]!=""){searchAndFiltersAppliedListst[bhb]=wishdb[x];bhb++;}
            }
            function ce(type){return document.createElement(type);}
            function ct(content){return document.createTextNode(content);}
            function ap(child,parent){return parent.appendChild(child);}
            function cl(target,classname){return target.className=classname;}
            if(searchAndFiltersAppliedListst==""){console.log("nonefound for srchkey: "+sessionStorage.srchk);}
            document.getElementById("wishescontainermain").innerHTML="";
            for(x in searchAndFiltersAppliedListst){
                var wishes = document.getElementById("wishescontainermain");
                var wish=ce("div"),
                wish_contents=ce("div"),
                wish_name=ce("h3"),
                wish_name_txt=ct(searchAndFiltersAppliedListst[x].Wish_name),
                wish_filters=ce("p"),
                wish_filters1_txt=ct(searchAndFiltersAppliedListst[x].Minority_groups),
                wish_filters2_txt=ct(searchAndFiltersAppliedListst[x].Donating_type),
                wish_filters3_txt=ct(searchAndFiltersAppliedListst[x].Project_type),
                wish_more=ce("button"),
                wish_more_txt=ct("More Info"),
                modal_background=ce("div"),
                modal=ce("div"),
                modal_header=ce("div"),
                modal_cancel=ce("div"),
                modal_cancel_text=ce("h2"),
                modal_cancel_text_txt=ct("More Info - "+searchAndFiltersAppliedListst[x].Wish_name),
                modal_content=ce("div"),
                feild1=ce("div"),
                h41=ce("h4"),
                h41_txt=ct("Organization Name"),
                h51=ce("h5"),
                h51_txt=ct(searchAndFiltersAppliedListst[x].Organization_name),
                feild2=ce("div"),
                h42=ce("h4"),
                h42_txt=ct("District"),
                h52=ce("h5"),
                h52_txt=ct(searchAndFiltersAppliedListst[x].District),
                feild3=ce("div"),
                h43=ce("h4"),
                h43_txt=ct("Start Date"),
                h53=ce("h5"),
                h53_txt=ct(searchAndFiltersAppliedListst[x].Start_date),
                feild4=ce("div"),
                h44=ce("h4"),
                h44_txt=ct("End Date"),
                h54=ce("h5"),
                h54_txt=ct(searchAndFiltersAppliedListst[x].End_date);
                
                cl(wish,"wish");
                cl(wish_contents,"wish__contents");
                cl(wish_name,"wish__name");
                cl(wish_filters,"wish__filters");
                cl(wish_more,"wish__more-info details_button");
                cl(modal_background,"modal-background");
                cl(modal,"modal");
                cl(modal_header,"modal-header");
                cl(modal_cancel,"modal-cancel");
                cl(modal_content,"modal-content");
                cl(feild1,"feild");
                cl(feild2,"feild");
                cl(feild3,"feild");
                cl(feild4,"feild");
                
                ap(wish_contents,wish);
                ap(wish_more,wish);
                ap(modal_background,wish);
                ap(wish_name,wish_contents);
                ap(wish_filters,wish_contents);
                ap(wish_more_txt,wish_more);
                ap(modal,modal_background);
                ap(wish_name_txt,wish_name);
                ap(wish_filters1_txt,wish_filters);
                ap(wish_filters2_txt,wish_filters);
                ap(wish_filters3_txt,wish_filters);
                ap(modal_header,modal_content);
                ap(modal_cancel,modal_header);
                ap(modal_cancel_text,modal_header);
                ap(feild1,modal_content);
                ap(feild2,modal_content);
                ap(feild3,modal_content);
                ap(feild4,modal_content);
                ap(modal_cancel_text_txt,modal_cancel_text);
                ap(h41_txt,h41);
                ap(h51_txt,h51);
                ap(h41,feild1);
                ap(h51,feild1);
                ap(h42_txt,h42);
                ap(h52_txt,h52);
                ap(h42,feild2);
                ap(h52,feild2);
                ap(h43_txt,h43);
                ap(h53_txt,h53);
                ap(h43,feild3);
                ap(h53,feild3);
                ap(h44_txt,h44);
                ap(h54_txt,h54);
                ap(h44,feild4);
                ap(h54,feild4);
                ap(wish,wishes);
                
                
                
            }
          },1000);
          </script>
        
      </div>
    </div>
  </section>


  <script type="text/javascript">
  var addButtons = document.getElementsByClassName('details_button');

  function getDetails() {
    var id = event.srcElement.id;
    var select = "background-" + id;
    var cross = "close-" + id;
    var modalBackground = document.getElementById(select);
    modalBackground.style.display = 'flex';
    modalBackground.style.left = 0;
    // TODO only works for the first modal
    var crossTemp = document.getElementsByClassName(cross)[0];
    crossTemp.addEventListener('click', function() {
      modalBackground.style.display = 'none';
    });
  };

  for (i = 0; i < addButtons.length; i++) {
    addButtons[i].addEventListener("click", getDetails);
  }
  </script>

  <script type="text/javascript">
  $('div.burger').on('click', function() {
    $('.filters').toggleClass('clicked');
    $(this).toggleClass('clicked');
  });
  </script>

</body>

</html>

<?php
mysqli_close($conn);
?>
