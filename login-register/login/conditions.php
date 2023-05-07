<?php
if(isset ($_GET['error'])){
$x = ($_GET['error']);
if($x==1) {
  echo "
  <script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
    icon: 'warning',
    title: 'Email or Password Can\'t be empty'
  })
  </script>";
}
else if($x==2) {
  echo "
  <script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
    icon: 'error',
    title: 'Wrong email or password'
  })
  </script>";
  
} else if($x==3) {
  echo "
  <script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
    icon: 'error',
    title: 'Username already exist'
  })
  </script>";
} else if($x==4) {
  echo "
  <script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
    icon: 'warning',
    title: 'Email or password can\'t be empty'
  })
  </script>";
}else {
  echo '';
}}
?>