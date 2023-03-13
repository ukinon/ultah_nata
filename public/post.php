<?php
require 'check.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <script src="https://kit.fontawesome.com/a543fba6bd.js" crossorigin="anonymous"></script>

  <script>
    $('#trash-icon').click(function(){
    //get cover id
    var id=$(this).data('id');
    //set href for cancel button
    $('#deleteBtn').attr('href','deletepost.php?id='+id);
})
  </script>
</head>

<body>
  <div class="flex justify-start text-white flex-col">
      <?php
      $s_post = "";

      if (isset($_POST['post'])) {
        $s_post = $_POST['post'];
      }
      $search_post = '%' . $s_post . '%';

      $conn = OpenCon();

      $batas = 10;
      $halaman = isset($_POST['halaman']) ? $_POST['halaman'] : 1;
      $halaman_awal = ($halaman - 1) * $batas;
      $nomor = $halaman_awal + 1;

      $sql = "SELECT user, postDate, post, username, post.postID, users.id FROM post INNER JOIN users on post.user = users.id WHERE post LIKE ? order by postDate DESC limit $halaman_awal, $batas ";
      $sort = $conn->prepare($sql);
      $sort->bind_param('s', $search_post);
      $sort->execute();
      $result = $sort->get_result();

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $post = $row["post"];
          $date = $row["postDate"];
          $user = $row["username"];
          $postID = $row["postID"];
          $poster = $row["user"];
          $posterID = $row["id"];

          echo '<br> <div class="textarea w-full m-0 bg-black mt-0 mb-0 h-auto rounded-none text-white resize-none border-slate-200 border-opacity-20 border-r-0 border-l-0 border-t-0"> 
          
          <div class="flex flex-row gap-2">
          <p class="text-sm lg:text-lg font-bold">'.$user.' </p> 
          
          <p class="text-xs lg:text-xs text-zinc-400 mt-0.5 lg:mt-2">'.substr($date, 11, 5).'</p> <br> 
          </div>

          <p class="text-xs lg:text-base mt-5 text-slate-200">'.$post.'</p> <br> 
          
          
          
          <div class="flex justify-between flex-row"> 
          <p class="text-zinc-400 text-xs">'.substr($date, 0, 10).'</p>';

          if($userID == $poster){
        echo '<label for="my-modal-6" data-id="'.$postID.'" class="'.(($LOGIN === false) ? "hidden" : "text-center").'" id="trash-icon"><i class="fa-regular fa-trash-can text-red-600 cursor-pointer"></i></label>';
         echo '</div>';
          }
          else{
            echo'</div>';
          }
         echo '</div>';
        }
    }
    else{
      echo '<h1 class="flex justify-center h-52 items-center p-3 align-middle text-3xl"> No Posts </h1>';
    }
      ?>


<!-- Delete Modal -->
<input type="checkbox" id="my-modal-6" class="modal-toggle" />
          <div class="modal modal-bottom sm:modal-middle ">
            <div class="modal-box flex flex-col text-center bg-zinc-800">
              <div class="flex flex-col justify-center md:flex-row md:justify-start">
            <i class="fa-solid fa-3x fa-triangle-exclamation text-red-600"></i>
           <p class="py-4 ml-3">Are you sure you want to delete this item?</p>
              </div>
              <div class="modal-action flex justify-center md:justify-end gap-24 md:gap-3">
                <label for="my-modal-6" class="btn bg-zinc-700 px-8">No</label>
               <a id="deleteBtn" class="btn bg-red-600 px-8"> Yes </a>
              </div>
            </div>
          </div>
          
 <?php
$sql = "SELECT post FROM post WHERE post LIKE ? order by postDate Asc";
$sort = $conn->prepare($sql);
$sort->bind_param('s', $search_post);
$sort->execute();
$sort -> store_result();
$jumlah_data = $sort -> num_rows();
$total_halaman = ceil($jumlah_data / $batas);
?>

<!---Button Pagination--->
<div class="flex justify-center flex-row">
  <button id="prev" <?php if($halaman <= 1) {?> 
  disabled class="h-10 w-20  rounded-lg mt-8 mr-3 bg-zinc-800 text-slate-200 border-none cursor-not-allowed"
  <?php }?>
  class="h-10 w-20 hover:bg-indigo-400 active:bg-indigo-500 rounded-lg mt-8 mr-3 bg-zinc-700 text-slate-200 border-none">Previous</button>
<select class="btn-group w-20 h-10 bg-zinc-700 text-slate-200 rounded-lg text-center mt-8" id="halaman">
  <?php
  for ($x = 1; $x <= $total_halaman; $x++) {
  ?>
    <option value="<?php echo $x ?>" <?php if($x == $halaman){echo "selected";} ?>> <a><?php echo $x; ?></a> </option>
  <?php
  }
  ?>
</select>
<button id="next" 
<?php if($halaman == $total_halaman || $halaman <= 1) {?> 
  disabled class="h-10 w-20  rounded-lg mt-8 ml-3 bg-zinc-800 text-slate-200 border-none cursor-not-allowed"
  <?php }?> 
class="h-10 w-20 hover:bg-zinc-600 active:bg-zinc-500 rounded-lg mt-8 ml-3 bg-zinc-700 text-slate-200 border-none">Next</button>
</div>


</body>
</html>


