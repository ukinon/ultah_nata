<?php
require 'check.php';
?>

<!DOCTYPE html>
<html lang="en" class="bg-black">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.50.1/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <title>Natano's Diary</title>
</head>
<body>



<div class="flex flex-col h-screen justify-center items-center">
<div class="<?php echo $alert ?> alert alert-warning rounded-lg w-auto shadow-lg top-0 lg:sticky lg:top-0 lg:z-50">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
              <span>Warning: Wrong username or password!</span>
            </div>
          </div>
    <div class="p-6 border-zinc-800 bg-zinc-800 bg-opacity-30 border-2 rounded-lg text-slate-200">
<form id="login-form" method="post" action="<?php $location ?>">
        <a href="index.php">  <h1 class="text-lg font-bold text-center text-blue-500 my-3">Nano Diary</h1> </a>
        <br>
        <div class="form-control w-full max-w-xs mb-5">
  <label class="label">
    <span class="label-text text-slate-200">Username</span>
  </label>
  <input type="text" name="user" placeholder="Type here" class="input input-ghost w-80 border-b-slate-200 focus:border-b-blue-500 focus:bg-transparent border-t-0 border-r-0 border-l-0 rounded-none" />

</div>
          <br>
          <div class="form-control w-full max-w-xs mb-5">
  <label class="label">
    <span class="label-text text-slate-200">Password</span>
  </label>
  <input type="password" name="password" placeholder="Type here"class="input input-ghost w-80 border-b-slate-200 focus:border-b-blue-500 focus:bg-transparent border-t-0 border-r-0 border-l-0 rounded-none" />
</div>
          <div class="flex justify-end m-3 mr-0 mb-0">
            <button type="submit" value="login" class=" bg-blue-600 hover:bg-blue-700 border-none w-24 text-white btn mt-5" name="login">Login</button>
          </div>
        </form>
</div>
</div>
</body>
</html>