<!DOCTYPE html>
<html>
<title>Basic Form data show using ajax</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
  * {
    font-family: sans-serif;
  }
  form {
   
    padding:10px;
  }

  label {
    color: black;
    font-size: large;
  }

  input {
    border: 1px solid chartreuse;
    margin:5px;
    background-color: white;
    color: black;
    border: 1px solid gray;
    padding:5px;
    border-radius:15px;

  }
  textarea {
    border: 1px solid chartreuse;
    margin:2px;
    background-color: white;
    color: black;
    border: 1px solid gray;
  }

  textarea {
    width: 250px;
  }

  #data {
    margin:5px;
    float: right;
    text-align:center;
    color:white;
    font-size: 20px;
    width: 40%;
    height: 150px;
    
  }
  #data p {
    color:black;
    font-weight: bold;
  }
  #submbtn, #resetdata {
    margin:2px;
    width:80px;
    background-color: white;
    color: black;
    border: 1px solid gray;
    padding:5px;
    border-radius:15px;
  }
  #submbtn:hover, #resetdata:hover{
    cursor: pointer;
    color:white;
    background-color: black;
  }
</style>

<body style="background-color: gray;">
  <h1 style="margin-left: 25%">Student Registration Form</h1>
  <div class="main" style="width: 50%; margin-left: 15%">

    <form id="formId" method="POST">

      <label>Name :</label>
      <input type="text" id="name" name="name" placeholder="Enter Name"/><br>
      <label type="text">Enter email: </label>
      <input type="text" id="email" name="email" placeholder="Enter email Address"/><br>
      <label for="Password">Password: </label>
      <input type="text" id="password" name="password"placeholder="*******"/><br>

      <label for="textarea">Your Thoughts</label>
      <textarea type="text" id="textarea" name="textarea" placeholder="Your Text Area" rows="3" cols="80"></textarea><br />
      <p></p>

      <br /><br />
      <label for="List">Select Batch</label>
      <select id="count" name="numbers" size="1" style="border-radius: 2px">
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
      </select><br /><br />
      <label for="box">Check Boxes</label>
      <input type="checkbox" id="eggs" name="eggs" value="eggs" />
      <label for="box">Green eggs</label>
      <input type="checkbox" id="ham" name="Ham" value="Ham" />
      <label for="ham"> Ham</label><br /><br />

      <label for="radiobutton">Radio Button</label>
      <input type="radio" id="small" name="small" value="small" />
      <label for="box">Small</label>
      <input type="radio" id="medium" name="medium" value="medium" />
      <label for="ham"> medium</label>
      <input type="radio" id="large" name="large" value="large" />
      <label for="ham"> large</label><br />

      <br />
      <input type="button" value="Submit" id="submbtn" />
      <input type="button" value="Reset" id="resetdata" />


    </form>
    <div id="data">
      <p>Data using AJAX</p><hr>
    </div>
  </div>


  <script>
    $(document).ready(function() {
      $("#submbtn").on('click',function(e) {
        e.preventDefault();
        $.ajax({
          type:'POST',
          url:'post.php',
          data: $("#formId").serialize(),
          success: function(response) {
            let jData = JSON.parse(response);
            print in console
            console.log(jData);
            //print data in document
            var dataToAppend = "Your Name = " + " " + jData['name'] +" "+ "Your Email = " + " " + jData['email']+"Your Password = " + " " + jData['password'] +"Your Thoughts = " + " " + jData['textarea'];
            $("#data").text(dataToAppend);
          }
        });
      });
    });

    $(document).ready(function() {
      $("#resetdata").click(function() {
        $("#name").val("");
        $("#email").val("");
        $("#password").val("");
        $("#textarea").val("");
        $("#data").val("");
        $("#eggs").prop("checked", false);
        $("#ham").prop("checked", false);
        $("#small").prop("checked", false);
        $("#medium").prop("checked", false);
        $("#largre").prop("checked", false);
      });
    });

  </script>
</body>

</html>