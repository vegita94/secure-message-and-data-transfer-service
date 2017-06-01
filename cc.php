<html>
<head>

</head>
<body>
  <form name="myform" id="myform">
    <input type="text" name="name" id="name" />
    <input type="text" name="pass" id="pass" />
    <input type="button" name="btn" id="btn" value="Click" onclick="h();" />
  </form>


  <script src="js/jquery.min.js"></script>
  <script>
  function h(){
    var a1=document.getElementById("name").value;
    var a2=document.getElementById("pass").value;
    //alert(a1);
    $.ajax({
      url:"hello.php",
      type:"POST",
      data:{data1:a1,data2:a2},
      success: function(data) {
        alert(data);
      },
      error: function( ){

      }
  })
}
  </script>


</body>
</html>
