let songAudio;
let beatFiles = {};



//MUSIC RELEASE PAGE

$('.carousel-inner').children().first().addClass('active');

$('.pause').hide();

//CMS PAGE
$('.dragover').hide();
const parent = document.querySelectorAll('.files');
console.log(parent.length);
for(let i=0; i<parent.length; i++ ){
  parent[i].ondragover = (ev) =>{
    ev.preventDefault();
    $(parent[i].querySelector('input')).hide();
    $(parent[i].querySelector('.dragover')).show();
    return false;

    }
  
  parent[i].ondragexit = (ev) =>{
    $(parent[i].querySelector('input')).show();
    $(parent[i].querySelector('.dragover')).hide();
    return false;
  }
  
    parent[i].ondrop =  function(event){
    $(parent[i].querySelector('.dragover')).hide();
      div= $('<div>');
      $parent = $(parent[i]);
      div.text(event.dataTransfer.files[0].name).addClass('file');

      $parent.children('.file').remove();
     let file= event.dataTransfer.files[0]
     
      if(parent[i].className.includes('cover')){
        
        if(file.type.split('/')[0] =='image'){
          beatFiles['cover'] = file;
           $parent.append(div);
        }
        else{
           $(parent[i].querySelector('input')).show();
          beatFiles['cover'] = null;
        }

      }
      else {
       if(file.type.split('/')[0] =='audio'){
          beatFiles['beat'] = file;
           $parent.append(div);

        }
        else{

           $(parent[i].querySelector('input')).show();
          beatFiles['beat'] = null;
        }

      }
      return false;    
    }

}





  



  
$('.form').submit((event)=>{
  event.preventDefault();
  let input = document.querySelector('#beat').files[0];
  let beat = (input) ?input :beatFiles.beat;
  input = document.querySelector('#cover').files[0];
  let cover = (input) ?input :beatFiles.cover;
  let name = $('input[name=name]').val();
  let bpm = $('input[name=bpm]').val();
  let tags = $('input[name=tags]').val();
  let data = {
    beat  : beat,
    cover : cover,
    name  : name,
    bpm   : bpm,
    tags  : tags
  };
  
  let formD = new FormData();
  $.each(data ,(key, value) =>{
    formD.append(key, value);
  });
  
  $.ajax({
    processData: false,
    contentType: false,
    method : "POST",
    url: 'includes/upload.php',
    data :formD,
    success: function(response){
     console.log(response);
    }
}).done(function(){
    console.log("Done");
  });
  
  
  
});  
  
  
  
  
  
  
  
  
  
  
  
  
  
// Scroll to the top

$('.close').click(function(){
  $(this).parent().slideUp();
});


$(document).on("click","#back_to_top",function(e){
    e.preventDefault();
    $("body,html").animate({scrollTop:0},$(window).scrollTop()/3,"linear");
});


const $win = $(window);
const width_check = ()=>{
  
  if($win.width() < 683){
    
    $('.playlist-table .tags-header').hide();
    $('.playlist-table .song_tags').hide();
    
    $('.playlist-table .time-header').hide();
    $('.playlist-table .song_time').hide();
    
    $('.playlist-table .bpm-header').hide();
    $('.playlist-table .song_bpm').hide();
    
    $('.add-to-cart').removeClass("pull-right");
  }
  else if($win.width() < 769){
    $('.tags').removeClass("pull-left"); 
    $('.add-to-cart').addClass("pull-right");
    
    $('.playlist-table .time-header').show();
    $('.playlist-table .song_time').show();
    
    $('.playlist-table .bpm-header').show();
    $('.playlist-table .song_bpm').show();
    
    
    
    
  }
  else{
    
     $('.tags').addClass("pull-left");
    $('.playlist-table .tags-header').show();
    $('.playlist-table .song_tags').show();
     
  }
  
}
$(document).ready(width_check);
$win.resize(width_check);

//Pop up



function initAudio(track){
    let song = track.data("filename");
    let title = track.children('.song_title').text();
    let cover_image = track.children('.cover').css('background-image');
    $('.cover-image').css('background-image', cover_image);
  
  
  //    var cover_image = track.children('.cover').css('background-image').split('/');
  
//    let cover_string = cover_image[cover_image.length - 1];
//    let end = cover_string.search('"');
//    cover_string = cover_string.substr(0, end);
//    console.log(cover_string);
    let tags = track.children('.song_tags').text();
    let tags_array = tags.split(',');
    $tags =$(".top-player .tags").html('');
    $.each(tags_array,(index, tag_string)=>{
      let $tag = $('<li class="tag"></li>').text('#' + tag_string);
      $tags.append($tag);
    });


    songAudio = new Audio(song)
//    songAudio.volume = parseFloat($(".volume").val() /10);

    if(!songAudio.currentTime){
        $(".duration").html("0:00");
        $(".total_duration").html("0:00");
    }

    $(".top-player .title").text(title);
//    $(".active").removeClass("active");
//    element.addClass("active");

}

const getSongs= () =>{
  $.ajax({
    url : "includes/getSongs.php",
    method : 'post',
    success : function(msg){
      let response = JSON.parse(msg);
    let $playlist_table = $('.playlist-table tbody');
    $.each(response, function(index, song){
    let $row = $("<tr></tr>");
    $row.addClass('track');
      let song_id = 0;
      $.each(song, function(key, value){
        let $col = $("<td></td>");
        
        if(key === 'id'){
          song_id = value;
        }
        else if(key === "filename"){
          let audio= new Audio(value);
          audio.ondurationchange = () =>{

          let secs = Math.floor(parseInt(audio.duration % 60));
            let mins = Math.floor(parseInt((audio.duration / 60 )% 60));
            if(mins < 10){
              mins = '0' + mins;
            }
            if (secs < 10 ){
              secs = '0' + secs;
            }
            let duration = mins + ':' + secs;
            $col.addClass("song_time").text(duration);
            audio = null;

          }
          $row.attr('data-filename', value);
          $row.append($col);
        }
        else if(key === "cover"){

          $col.css('background-image', "url(" + value + ")").addClass('cover');
          $row.prepend($col);      
        }
        else{
          $col.addClass(key).text(value);
          $row.append($col);
        }


      });
//      let $share =$('<td class="song_share"><span class="fa fa-share-alt"></span></td>');
      let $price = $('<td colspan="1" class="song_price">$24.99 <a data-id='+ song_id +' href="cart.php" class="add-btn"><span class="fa fa-shopping-cart"></span> ADD</a></td>');

//      $row.append($share);
      $row.append($price);
      $playlist_table.append($row);


      });
      width_check();
      let $first = $(".playlist-table .track").first();
      initAudio($first);
      play();




  }
});
}

if ( location.pathname.endsWith('/index.php')  ||  location.pathname.endsWith('/')) {
  getSongs();
}

if(location.pathname.includes('login.php')){

    if (localStorage.chkbx && localStorage.chkbx != '') {
        $('#remember').attr('checked', 'checked');
        $('#username').val(localStorage.usrname);
        $('#password').val(localStorage.pass);
    } else {
        $('#remember').removeAttr('checked');
        $('#username').val('');
        $('#password').val('');
    }

    $('input[type=submit]').click(function(event) {
        event.preventDefault();
        if ($('#remember').is(':checked')) {
            // save username and password
            localStorage.usrname = $('#username').val();
            localStorage.pass = $('#password').val();
            localStorage.chkbx = $('#remember').val();
        } else {
            localStorage.usrname = '';
            localStorage.pass = '';
            localStorage.chkbx = '';
        }
      $('form').submit();
    });
  
} 


 //SELECTING WHICH SONG TO PLAY AND ADDING ITEMS TO CART
$('.playlist-table tbody').click(function(event){
  event.preventDefault();
if($(event.target).parent().hasClass('track')){
  songAudio.pause();
  initAudio($(event.target).parent());
  play();
}
else if($(event.target).parent().hasClass('song_price')){
  let url = $(event.target).attr('href');
  let id= $(event.target).data('id');
  let license = "MP3 License";
  $.ajax(url,{
    method : 'get',
    data : {
      add_cart: id,
      name: $(event.target).parent().siblings('.song_title').text(),
      price: 24.99,
      license: license
           },
    success: function(response){
      if (response !='no'){
        $cart = $('.cart_count');
        $cart.text(parseInt($cart.text()) + 1);
      }
      
      
    }
  });
}

});

$(".play").click(function(){
play();
});
$(".pause").click(function(){
songAudio.pause();
$(".play").show();
$(".pause").hide();
});



function play(){
  songAudio.play();
  
  $(".play").hide();
  $(".pause").show();
//  $(".duration").fadeIn(300);
//  show_duration();
}

























function next(){
  songAudio.pause();
  var next = $('.active').next();
  $(".song").removeClass("active");
  next.addClass("active");
  if (next.length==0){
    next = $("#library li:first-child");
  }
  initAudio(next);
  play();

}
$(".next").click(function(){
  next();
});

$(".prev").click(function(){
  songAudio.pause();
  var prev = $('.active').prev();
  $(".song").removeClass("active");
  prev.addClass("active");
  if (prev.length==0){
    prev = $("#library li:last-child");
  }
  initAudio(prev);
  play();

});

$(".volume").change(function(){
  audio.volume = parseFloat(this.value /10);
});

$(".song").click(function(){
  audio.pause();
  initAudio($(this));
  play();
});

function show_duration(){

  //Total Duration
  $(audio).bind('timeupdate', function(){
    var total_seconds = parseInt(audio.duration % 60);
    var total_minutes = parseInt((audio.duration /60) % 60);
    if(total_seconds <10){
      total_seconds = '0' + total_seconds;
    }

    //Current time
    var current_seconds = parseInt(audio.currentTime % 60);
    var current_minutes = parseInt((audio.currentTime /60) % 60);
    if(current_seconds <10){
      current_seconds = '0' + current_seconds;
    }
    $(".duration").html(current_minutes + ':' + current_seconds);
    var value = 0;
    if (audio.currentTime > 0){
      value = Math.floor((100/audio.duration) * audio.currentTime);
      $(".total_duration").html(total_minutes + ":" + total_seconds);
    }
    $(".progress_bar").val(value);
    if (audio.currentTime == audio.duration){
      next();
    }

  });
}

$(".progress_bar").change(function(){
  var current_time = Math.floor(this.value /(100/audio.duration));
  audio.currentTime = current_time;
});

