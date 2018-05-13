    <footer class="footer">
      <div class="container">
        <p>&copy; Soh Twitter Clone 2018</p>
      </div>
    </footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-titile" id="loginModalTitle">Login</h4>            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" id="loginAlert"></div>
            <form>
              <input type="hidden" id="loginActive" name="loginActive" value="1">
              <fieldset class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email address">
              </fieldset>
              <fieldset class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
              </fieldset>
            </form>
          </div>
          <div class="modal-footer">
            <p id="toggleLogin">Sign up</p>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="loginSignupButton" class="btn btn-primary">Login</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      $("#toggleLogin").click(function(){
        if($("#loginActive").val() === "1"){
          $("#loginActive").val("0");
          $("#loginModalTitle").html("Sign Up");
          $("#loginSignupButton").html("Sign up");
          $("#toggleLogin").html("Login");
        }else{
          $("#loginActive").val("1");
          $("#loginModalTitle").html("Login");
          $("#loginSignupButton").html("Login");
          $("#toggleLogin").html("Sign up");
        }
      })

      $("#loginSignupButton").click(function(){
        $.ajax({
          type: "POST",
          url: "actions.php?action=loginSignup",
          data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),
          success: function(result){
            if(result === "1"){
              window.location.assign("http://localhost/13-TwitterClone/");
            }else{
              $("#loginAlert").html(result).show();
            }
          }
        })
      })
    </script>
  </body>
</html>
