<?php
ob_start();
include 'db/db.php';
$ayarsor=$db->prepare("SELECT * FROM site_settings where settings_id=:id");
$ayarsor->execute(array(
    'id' =>0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC); 

$kullanicisor=$db->prepare("SELECT * FROM info_user where user_id=:id");
$kullanicisor->execute(array(
    'id' =>1
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

$contactsor=$db->prepare("SELECT * FROM contact_list");
$contactsor->execute();

$tasksor=$db->prepare("SELECT * FROM task_settings");
$tasksor->execute();

$sorgu = $db->prepare("SELECT COUNT(*) FROM task_settings");
$sorgu->execute();
$say = $sorgu->fetchColumn();

?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  
  <title><?php echo $ayarcek["settings_title"]; ?></title>
  
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.1.4/tailwind.min.css'>
  <script src="https://kit.fontawesome.com/2345f97192.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<!-- partial:index.partial.html -->
<div class="h-screen w-screen bg-indigo-400 overflow-hidden absolute flex items-center">
  <div class="w-screen h-64 absolute top-0 opacity-50 left-0 -my-40 -mx-64 bg-indigo-300 rounded-full"></div>
  <div class="w-64 h-64 -mx-32 bg-indigo-300 opacity-50 rounded-full"></div>
  <div class="w-64 h-64 ml-auto relative opacity-50 -mr-32 bg-indigo-300 rounded-full"></div>
  <div class="w-screen h-64 absolute opacity-50 bottom-0 right-0 -my-40 -mx-64 bg-indigo-300 rounded-full"></div>
</div>

<div class="container mx-auto h-screen py-16 px-8 relative">
  <div class="flex w-full rounded-lg h-full lg:overflow-hidden overflow-auto lg:flex-row flex-col shadow-2xl">
    <div class="lg:w-1/2 bg-white text-gray-800 flex flex-col">
      <div class="p-8 shadow-md relative bg-white">
        <div class="flex items-center">
          <img src="<?php echo $kullanicicek["user_foto"]; ?>" class="w-10 h-10 block rounded object-cover object-top" />
          <div class="text-indigo-600 font-medium ml-3"><?php echo $kullanicicek["user_name"]; ?></div>
          
          <div class="text-indigo-600 font-medium ml-3"><?php echo $kullanicicek["user_mail"]; ?></div>
          <button class="bg-indigo-100 text-indigo-400 ml-auto w-8 h-8 flex items-center justify-center rounded">
          <i class="fas fa-sign-out-alt"></i>
          </button>
        </div>

        <div id="popup1" class="overlay">
	      <div class="popup">
		    <a class="close" href="#">&times;</a>
		    <div class="content">
		  	<form action="db/islem.php" method="post">
        <div class="col-25">
      <label for="fname">İsim ve Soyisim:</label>
      <input type="text" name="contact_name">
    </div>
        <br>
        <div class="col-25">
      <label for="fname">Telefon Numarası:</label>
      <input type="text" name="contact_info">
    </div>
        <br>
        <div class="col-25">
      <label for="fname">Kullanıcı Fotoğrafı:</label>
      <input type="text" name="contact_foto">
    </div>
    <div class="row">
    <input type="submit" name="contact" value="Gönder">
  </div>
        </form>
		</div>
	</div>
</div>

        <h1 class="font-medium text-lg mt-6">Rehber Listesi</h1>
        <p class="text-gray-600 text-sm">Yakın arkadaşlar ve İletişim Numaraları</p>
        <div class="mt-6 flex">
        
          <a href="#popup1"><button class="bg-indigo-500 text-white py-2 text-sm px-3 rounded focus:outline-none">Yeni Kişi</button></a>
          <div class="relative ml-auto flex-1 pl-8 sm:block hidden">
            <input placeholder="Kişilerde Ara.. " type="text" class="w-full border rounded border-gray-400 h-full focus:outline-none pl-4 pr-8 text-gray-700 text-sm text-gray-500">
            <svg stroke="currentColor" class="w-4 h-4 absolute right-0 top-0 mt-3 mr-2 text-gray-500" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
              <circle cx="11" cy="11" r="8"/>
              <path d="M21 21l-4.35-4.35"/>
            </svg>
          </div>
          <form action="" method="post">
          <button name=""class="ml-4 text-gray-600 py-2 text-sm px-3 rounded focus:outline-none border border-gray-400">Seçilenleri Sil</button>
          
          
        </div>
      </div>
      <div class="overflow-auto flex-grow">
      <?php 
                   
                       while($contactcek=$contactsor->fetch(PDO::FETCH_ASSOC)){
                       ?>
        
        <div class="bg-gray-100 px-8 py-6 flex items-center border-b border-gray-300">
          <input name="sil[]" value="<?php echo $contactcek["contact_id"]; ?>" type="checkbox" />
          <div class="flex ml-4">
            <img src="<?php echo $contactcek['contact_foto'];?>" class="w-10 h-10 object-cover rounded object-top" />
            <div class="flex flex-col pl-4">
              <h2 class="font-medium text-sm"><?php echo $contactcek["contact_name"]; ?></h2>
              <h3 class="text-gray-500 text-sm"><?php echo $contactcek["contact_info"]; ?></h3>
            </div>
          </div>
          
          <label for=""></label>
        </div>
        <?php }?>
       
        </form>
       
         <?php
         if($_POST)
         {
           include('db/db.php');
           $id = implode(",", $_POST["sil"]);
           
           $delete = $db->exec("DELETE FROM contact_list WHERE contact_id IN ($id)");  
           
          if($delete)
          {
            header("Refresh: 0.1;");
          }else{
            
          }
         
         }
         
         
         ?>
                       
      </div>
    </div>
    
    <div class="lg:w-1/2 bg-indigo-600 text-white flex flex-col">
      <div class="p-8 bg-indigo-700 flex items-center">
        <img src="<?php echo $kullanicicek['user_foto'];?>" class="w-16 h-16 mr-4 object-top object-cover rounded" />
        <div class="mr-auto">
          <h1 class="text-xl leading-none mb-1"><?php echo $kullanicicek["user_name"]; ?></h1>
          <h2 class="text-indigo-400 text-sm"><?php echo $kullanicicek["user_role"]; ?></h2>
        </div>
        <a href="#popup2"><button class="bg-indigo-600 text-white py-2 text-sm px-3 rounded focus:outline-none">Yeni Görev</button>
        </a></div>
      <div class="p-8 flex flex-1 items-start overflow-auto">
        <div class="flex-shrink-0 text-sm sticky top-0">
          <div class="flex items-center text-white mb-3">Görevler <span class="italic text-sm ml-1 text-indigo-300">(<?php echo $say; ?>)</span></div>
          
        </div>
        
        <div class="flex-1 pl-10">
        <?php 
                   
                   while($taskcek=$tasksor->fetch(PDO::FETCH_ASSOC)){
                   ?>
                   
          <div class="flex mb-8">
          <i class="fas fa-thumbtack"></i>&nbsp
            <div class="flex-grow">
              <h3 class="text-sm mb-1"><?php echo $taskcek["task_icerik"]; ?></h3>
              <h4 class="text-xs text-indigo-300 italic"><?php echo $taskcek["task_time"]; ?></h4>
            </div>    
            <button name="taskdel" class="text-indigo-300 flex-shrink-0 ml-2">
            X
            </button>
          </div>
          <?php }?>
         
        </div>
      </div>
    </div>
  </div>
</div>

<div class="fixed h-screen right-0 top-0 items-center flex">
  <div class="p-2 bg-white border-l-4 border-t-4 border-b-4 border-indigo-400 inline-flex items-center rounded-tl-lg shadow-2xl rounded-bl-lg z-10 flex-col">
    <button class="bg-gray-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none" theme-button="gray"></button>
    <button class="bg-red-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none" theme-button="red"></button>
    <button class="bg-orange-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none" theme-button="orange"></button>
    <button class="bg-green-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none" theme-button="green"></button>
    <button class="bg-teal-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none" theme-button="teal"></button>
    <button class="bg-blue-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none" theme-button="blue"></button>
    <button class="bg-indigo-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none" theme-button="indigo"></button>
    <button class="bg-purple-500 w-5 h-5 rounded-full mb-2 outline-none focus:outline-none" theme-button="purple"></button>
    <button class="bg-pink-500 w-5 h-5 rounded-full outline-none focus:outline-none" theme-button="pink"></button>
  </div>
</div>
<!-- partial -->
  <script  src="js/script.js"></script>
  <div id="popup2" class="overlay">
	      <div class="popup">
		    <a class="close" href="#">&times;</a>
		    <div class="content">
		  	<form action="db/islem.php" method="post">
        <div class="col-25">
      <label for="fname">Yeni Görev Ekle:</label>
      <input type="text" name="task_icerik">
    </div>
        
    <div class="row">
    <input type="submit" name="task" value="Gönder">
  </div>
        </form>
</body>
</html>
<?php
ob_end_flush();?>