<!DOCTYPE html>
<html class="bg-zinc-800" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.50.1/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
    <title>Natano's Diary</title>
</head>
<body>
<div class="drawer drawer-mobile">
  <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content flex flex-col">
              <!-- Navbar -->
              <div class="w-full navbar bg-zinc-700 text-black lg:hidden">
                <div class="flex-none lg:hidden">
                  <label for="my-drawer-3" class="btn btn-square btn-ghost text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                  </label>
                </div> 
                <div class="flex-1 px-2 mx- text-blue-500 font-bold">Natano's Diary</div>
              </div>
              <!-- Page content here -->
              <div class="avatar m-3">
  <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
    <img src="/images/stock/photo-1534528741775-53994a69daeb.jpg" />
  </div>
</div>
<div class="m-3 text-white">
  <p> Arfiano Jordhy Ramadhan </p>
  <p> Bogor, 22 November 2002 </p>
  <p> Jl.Menteng No.113 Bogor Barat </p>
</div>
            </div> 
            <div class="drawer-side border-zinc-200 border-solid border-opacity-100 border-r-2">
              <label for="my-drawer-3" class="drawer-overlay"></label> 
              <ul class="menu p-4 w-80 bg-zinc-800 text-white">
                <!-- Sidebar content here -->
                <li><a href="profile.php" class="bg-blue-500 text-white">Profile</a></li>
                <li><a href="index.php" class="active:bg-blue-500">Diary</a></li>
              </ul>             
            </div>
          </div>
</body>
</html>