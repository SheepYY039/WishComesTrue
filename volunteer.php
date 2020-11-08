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
      window.location = './index.html';
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
      <form action="">
        <label for="search">
          <span class="fa fa-search"></span>
        </label>
        <input type="search" placeholder="Search..." name="search" id="search" />
      </form>
    </div>
    <script type="text/javascript">
    var WhishesDB = {
      "w1": {
        tags: ["children", "elderly"]
      },
      "w2": {
        tags: ["children"]
      },
      "w3": {
        tags: []
      },
      "w4": {
        tags: []
      },
    };

    function ex() {
      var srchk = document.getElementById("search").value;
      var Fli = ["children", "homeless", "elderly", "low-income", "funding", "second-hand", "food", "individual",
        "group", "reachable", "reach", "short", "long", "new", "old"
      ];

      var filters = [];
      var abb = 0;
      for (var dbcd = 0; dbcd < 15; dbcd++) {
        if (document.getElementById(Fli[dbcd]).checked == true) {
          filters[abb] = Fli[dbcd];
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
        var finalLi = [];
        var flin = 0;
        for (var g = 0; g < filteredlist.length; g++) {
          if (check1(rearrange(filteredlist[g], srchk)) > 0) {
            finalLi[flin] = filteredlist[g];
            flin++;
          }
        }
      }
      alert(filteredlist + " " + finalLi);
    }

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
        console.log([inputName, movieName, i])
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
          <input type="checkbox" id="children" name="minority-group-children" value="children" />
          <span class="checkbox__custom"></span>
        </label>
        <label class="checkbox__label">
          Homeless
          <input type="checkbox" id="homeless" name="minority-group-homeless" value="homeless" />
          <span class="checkbox__custom"></span>
        </label>
        <label class="checkbox__label">
          Elderly
          <input type="checkbox" id="elderly" name="minority-group-elderly" value="elderly" />
          <span class="checkbox__custom"></span>
        </label>
        <label class="checkbox__label">
          Low Income
          <input type="checkbox" id="low-income" name="minority-group-low-income" value="low-income" />
          <span class="checkbox__custom"></span>
        </label>
        <label class="checkbox__label">
          Others
          <input type="checkbox" id="m-others" name="minority-group-others" value="others" />
          <span class="checkbox__custom"></span>
        </label>
      </form>
    </div>
    <div class="donating-types">
      <h3>Donating Types</h3>
      <form action="">
        <label class="checkbox__label">
          Funding
          <input type="checkbox" id="funding" name="donating-type-funding" value="funding" />
          <span class="checkbox__custom"></span>
        </label>
        <label class="checkbox__label">
          Second Hand
          <input type="checkbox" id="second-hand" name="donating-type-second-hand" value="second-hand" />
          <span class="checkbox__custom"></span>
        </label>
        <label class="checkbox__label">
          Food
          <input type="checkbox" id="food" name="donating-type-food" value="food" />
          <span class="checkbox__custom"></span>
        </label>

        <label class="checkbox__label">
          Others
          <input type="checkbox" id="d-others" name="donating-type-others" value="others" />
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
                <input type="checkbox" id="individual" name="project-type-individual" value="individual" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
            <td>
              <label class="checkbox__label">
                Group
                <input type="checkbox" id="group" name="project-type-group" value="group" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
          </tr>
          <tr>
            <td>
              <label class="checkbox__label">
                Reachable
                <input type="checkbox" id="reachable" name="project-type-reachable" value="reachable" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
            <td>
              <label class="checkbox__label">
                Reach
                <input type="checkbox" id="reach" name="project-type-reach" value="reach" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
          </tr>
          <tr>
            <td>
              <label class="checkbox__label">
                Short
                <input type="checkbox" id="short" name="project-type-short" value="short" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
            <td>
              <label class="checkbox__label">
                Long
                <input type="checkbox" id="long" name="project-type-long" value="long" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
          </tr>
          <tr>
            <td>
              <label class="checkbox__label">
                New
                <input type="checkbox" id="new" name="project-type-new" value="new" />
                <span class="checkbox__custom"></span>
              </label>
            </td>
            <td>
              <label class="checkbox__label">
                Old
                <input type="checkbox" id="old" name="project-type-old" value="old" />
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
      <div class="wishes">
        <?php
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="wish">
          <div class="wish__contents">
            <h3 class="wish__name"><?php echo $row["Wish_name"] ?></h3>
            <p class="wish__filters">
              <?php echo $row["Minority_groups"] . $row["Project_type"] . $row["Donating_type"] ?>
            </p>
          </div>
          <button id="<?php echo $row["Wish_id"] ?>" class="wish__more-info details_button">More Info</button>
          <div id="background-<?php echo $row["Wish_id"] ?>" class="modal-background">
            <div class="modal">
              <div class="modal-header">
                <div class="modal-cancel close-<?php echo $row["Wish_id"] ?>" id="close"></div>
                <h2>More info - <?php echo $row["Wish_name"] ?></h2>
              </div>
              <div class="modal-content">
                <div class="field">
                  <h4>Organization Name</h4>
                  <h5><?php echo $row["Organization_name"] ?></h5>
                </div>
                <div class="field">
                  <h4>District</h4>
                  <h5><?php echo $row["District"] ?></h5>
                </div>
                <div class="field">
                  <h4>Start date</h4>
                  <h5><?php echo $row["Start_date"] ?></h5>
                </div>
                <div class="field">
                  <h4>End date</h4>
                  <h5><?php echo $row["End_date"] ?></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        }
        ?>
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