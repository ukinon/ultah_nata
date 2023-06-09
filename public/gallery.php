<?php
require "check.php";
require "function.php";

if (isset($_POST["submit"])) {
  //Cek apakah data berhasil di tambahkan / tidak
tambah($_POST, $userID);
header('Location: index.php');
}
?>

<!DOCTYPE html>
<html class="bg-black" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.50.1/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/a543fba6bd.js" crossorigin="anonymous"></script>
    <title>Natano's Diary</title>
</head>
<body>
<div class="drawer drawer-mobile">
  <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content flex flex-col">
              <!-- Navbar -->
              <div class="w-full navbar bg-transparent backdrop-blur-lg text-black lg:hidden sticky top-0 z-50 border-zinc-300">
                <div class="flex-none lg:hidden">
                  <label for="my-drawer-3" class="btn btn-square btn-ghost text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                  </label>
                </div> 
                <div class="flex-1 px-2 mx- text-blue-500 font-bold">Natano's Diary</div>
              </div>
              <!-- Page content here -->
              <?php if($LOGIN == true){ ?>
<div class="mx-3 flex flex-row justify-center flex-wrap mt-5 rounded-xl gap-3">
<?php for($x = 1; $x <= 30; $x++){?>
<img src="./assets/gallery/<?php echo $x ?>.jpg" class="w-18 h-32 rounded-lg lg:w-36 lg:h-64">
  <?php } ?>
</div>
<?php } else{ ?>
  <div class="flex h-full justify-center items-center">
  <h3 class="text-3xl">You must log in first.</h3>
</div>
  <?php } ?>
</div>
            <div class="drawer-side border-zinc-500 border-solid border-opacity-25 border-r-2">
              <label for="my-drawer-3" class="drawer-overlay"></label> 
              <ul class="menu p-4 w-80 bg-black  text-white text-2xl">
                <!-- Sidebar content here -->
                 <h1 class="text-blue-500 font-bold m-3 mt-0 text-sm"> Nano Diary </h1>
                <li><a href="index.php" class="active:bg-slate-300 mb-3 active:bg-opacity-25 font-normal text-white"> <i class="fa-solid text-zinc-500 fa-book"></i> Diary</a></li>
                <li><a href="gallery.php" class="active:bg-slate-300 mb-3 active:bg-opacity-25 font-bold text-white"> <i class="fas fa-image"></i> Gallery </a></li>
                <li><a href="reminder.php" class="active:bg-slate-300 mb-3 active:bg-opacity-25 font-normal text-white"> <i class="fa-solid fa-thumbtack text-zinc-500"></i> Reminders </a></li>
                <li> <a class="active:bg-slate-300 active:bg-opacity-25 mb-3 font-normal text-white" href="profile.php"><i class="fa text-zinc-500 fa-user" aria-hidden="true"></i> Profile </a></li>
    <li  <?php if ($LOGIN === true) { ?>class="hidden" <?php } else if ($LOGIN == false) { ?> class="absolute bottom-0 m-3" <?php } ?>> <a href="login.php" class="btn btn-wide h-10 bg-blue-500 hover:bg-blue-700 text-white">Login</a>  </li>
    <?php if ($LOGIN === true) { ?>
       <li class="absolute bottom-3">  
        
        <?php
$sql = "SELECT username FROM users WHERE username = '$user'";
$sort = $conn->prepare($sql);
$sort->execute();
$result = $sort->get_result();
?>

<div class="flex w justify-center text-center cursor-default p-4 hover:bg-slate-200 hover:bg-opacity-10 active:bg-zinc-800">
<div class="dropdown dropdown-top text-lg ">
<label class="hover:bg-none  active:bg-none" tabindex="0" class="m-1">
<?php if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $username = $row["username"];
          echo'
          <div class="flex flex-row items-center">
          <div class="avatar mr-3">
  <div class="w-12 rounded-full">
    <img src="./assets/'.$user.'.jpg" />
  </div>
</div>
          <p class="cursor-pointer">'. $username.'</p>
          </div>
          ';
        }
      }
          ?></label>
          <form class="w-max text-left" id="logout-form" method="post" target="_self" id="logout-form">
    </form>
  <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 bg-zinc-700">
    
    <li><a class="active:bg-slate-200 active:bg-opacity-50"> 
    <i class="fa fa-sign-out" aria-hidden="true"></i>
          <button type="submit" form="logout-form" value="Logout" name="logout" class="text-white text-sm"> Logout </button>
        </a> </li>
  </ul> 
</div>
</div>
    </div>
      <?php } ?> </li>
    
              </ul>             
            </div>
          </div>
</body>
</html>