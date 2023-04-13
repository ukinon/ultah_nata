<?php
require "check.php";
require "function.php";

if (isset($_POST["submit"])) {
  //Cek apakah data berhasil di tambahkan / tidak
reminder($_POST);
header('Location: reminder.php');
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/a543fba6bd.js" crossorigin="anonymous"></script>
    <title>Nano Diary</title>

    <script>
       $(document).ready(function(e) {   
        $('.check-icon').click(function(){
    //get cover id
    var id=$(this).data('id');
    //set href for cancel button
    $('#completeBtn').attr('href','updateReminder.php?id='+id);
})

$('.trash-icon').click(function(){
    //get cover id
    var id=$(this).data('id');
    //set href for cancel button
    $('#deleteBtn').attr('href','deleteReminder.php?id='+id);
})
 });
  </script>
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
                <div class="flex-1 px-2 mx- text-blue-500 font-bold">Nano Diary</div>
                <div class="lg:hidden flex justify-end">
              <form action="" method="POST">
        <input type="text" placeholder="&#xf002; Search Post" style="font-family: Helvetica, FontAwesome;" class="input input-bordered rounded-full w-36 md:w-48 h-9 placeholder:text-sm border-none m-3 bg-zinc-700 text-slate-200" aria-label="Search" name="s_postNav" id="s_postNav" autocomplete="off" />
      </form>
  </div>
              </div>
              <!-- Page content here -->
              <?php if($LOGIN == true){ ?>
                <div class="mt-12">
              <h3 class="text-slate-200 text-3xl m-3"> Not Completed </h3>
    <div class="m-3 text-slate-200 flex flex-row justify-center lg:justify-start flex-wrap gap-2 lg:gap-3 mt-5">
    <?php
    $sql = "SELECT id, reminder, reminderDate FROM reminder where status = 'available'";
    $sort = $conn->prepare($sql);
    $sort->execute();
    $result = $sort->get_result();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $reminderID = $row["id"];
        $reminder = $row["reminder"];
        $date = $row["reminderDate"];

        echo '<div class="flex flex-col justify-center break-all whitespace-normal break-keep bg-zinc-700 w-36 h-fit min rounded-xl"><p class="m-3">'.$reminder.'';
          echo '
          <div class="flex justify-between items-center w-full flex-row gap-3 border-t-2 border-zinc-800">
          <p class="text-xs ml-1">'. substr($date, 0, 10) .'</p>
          <label for="my-modal-7" data-id="'.$reminderID.'" class="'.(($LOGIN === false) ? "hidden" : "text-center, cursor-pointer, trash-icon").'"><i class="fa-regular fa-trash-can text-red-600 cursor-pointer"></i></label>
          
          <label for="my-modal-6" data-id="'.$reminderID.'" class="'.(($LOGIN === false) ? "hidden" : "text-center mr-3 cursor-pointer check-icon").'"><i class="fa-solid fa-check text-slate-200 cursor-pointer check-icon"></i></label>
           </div>
           </div>';
      }
    }
    ?>
                  <!-- The button to open modal -->
<label for="my-modal-3" class="<?php if($LOGIN == false){?> hidden <?php } ?>bg-zinc-800 h-32 w-32 items-center flex justify-center rounded-xl cursor-pointer flex-col"><i class="text-2xl fa-solid fa-plus"></i> Add Reminder</label>
    </div>
  </div>

    <h3 class="mt-24 m-3 text-3xl text-slate-200">Completed</h3>
    <div class="m-3 flex flex-row justify-center lg:justify-start flex-wrap gap-2 lg:gap-3 mt-3">
    <?php
    $sql = "SELECT id, reminder, reminderDate FROM reminder where status = 'completed' order by reminderDate asc ";
    $sort = $conn->prepare($sql);
    $sort->execute();
    $result = $sort->get_result();

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $reminderID = $row["id"];
        $reminder = $row["reminder"];
        $date = $row["reminderDate"];

        echo '<div class="flex flex-col justify-center break-all whitespace-normal break-keep bg-zinc-900 w-36 h-fit min rounded-xl"><p class="m-3">'.$reminder.'';
        echo '
        <div class="flex justify-between items-center w-full flex-row gap-3 border-t-2 border-zinc-800">
        <p class="text-xs ml-1">'. substr($date, 0, 10) .'</p>
        <label for="my-modal-7" data-id="'.$reminderID.'" class="'.(($LOGIN === false) ? "hidden" : "text-center, cursor-pointer, trash-icon mr-3").'"><i class="fa-regular fa-trash-can text-red-600 cursor-pointer"></i></label>
         </div>
         </div>';
        
        
      }
    }
    ?>
    </div>
    <?php } else {?>
      <div class="flex h-full justify-center items-center">
  <h3 class="text-3xl">You must log in first.</h3>
</div>
      <?php } ?>
</div>

            <div class="drawer-side border-zinc-500 border-solid border-opacity-25 border-r-2">
              <label for="my-drawer-3" class="drawer-overlay"></label> 
              <ul class="menu p-4 w-80 bg-black text-white text-2xl">
                <!-- Sidebar content here -->
                 <h1 class="text-blue-500 font-bold m-3 mt-0 text-sm"> Nano Diary </h1>
                <li><a href="index.php" class="active:bg-slate-300 mb-3 active:bg-opacity-25 font-normal text-white"> <i class="fa-solid text-zinc-500 fa-book"></i> Diary</a></li>
                <li><a href="gallery.php" class="active:bg-slate-300 mb-3 active:bg-opacity-25 font-normal text-white"> <i class="fas text-zinc-500 fa-image"></i> Gallery </a></li>
                <li><a href="reminder.php" class="active:bg-slate-300 mb-3 active:bg-opacity-25 font-bold text-white"> <i class="fa-solid fa-thumbtack"></i> Reminders </a></li>
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

    <!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative bg-zinc-900">
    <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h2 class="text-2xl text-slate-200">Reminder</h2>
    <form action="" method="POST">
    <textarea class="textarea textarea-bordered rounded-xl w-full mr-0 ml-0 h-24 lg:h-32 text-white bg-transparent resize-none mt-5 mb-3 border-zinc-300 border-opacity-25 placeholder:text-slate-200 placeholder:text-opacity-50" id="reminder" name="reminder"></textarea>

    <div class="flex justify-end">
<button type="submit" class="btn btn-sm sm:btn-md w-14 md:w-20 h-10 text-sm bg-blue-500 text-white mr-1 md:mr-3 rounded-full hover:bg-blue-700" id="submit" name="submit"> Send </button>
</div>
    </form>
  </div>
</div>

<!-- Delete Modal -->
<input type="checkbox" id="my-modal-6" class="modal-toggle" />
          <div class="modal modal-bottom sm:modal-middle ">
            <div class="modal-box w-full lg:w-fit min-w-none flex flex-col text-center bg-zinc-800">
              <div class="flex flex-col justify-center md:flex-row md:justify-start">
            <i class="fa-solid fa-3x fa-check text-blue-700"></i>
           <p class="py-4 ml-3">Complete?</p>
              </div>
              <div class="modal-action flex justify-center md:justify-end gap-24 md:gap-3">
                <label for="my-modal-6" class="btn bg-zinc-700 px-8">No</label>
               <a id="completeBtn" class="btn bg-blue-700 px-8"> Yes </a>
              </div>
            </div>
          </div>

          <!-- Delete Modal -->
<input type="checkbox" id="my-modal-7" class="modal-toggle" />
          <div class="modal modal-bottom sm:modal-middle ">
            <div class="modal-box flex flex-col text-center bg-zinc-800">
              <div class="flex flex-col justify-center md:flex-row md:justify-start">
            <i class="fa-solid fa-3x fa-triangle-exclamation text-red-600"></i>
           <p class="py-4 ml-3">Are you sure you want to delete this item?</p>
              </div>
              <div class="modal-action flex justify-center md:justify-end gap-24 md:gap-3">
                <label for="my-modal-7" class="btn bg-zinc-700 px-8">No</label>
               <a id="deleteBtn" class="btn bg-red-600 px-8"> Yes </a>
              </div>
            </div>
          </div>
          
</body>
</html>