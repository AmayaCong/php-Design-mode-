<?php
/**
 * Created by PhpStorm.
 * User: dusc
 * Date: 2017/7/26
 * Time: 9:41
 * 适配器模式 结构型模式
 */

 interface MeDiaPlayer{
     public function play($audioType,$fileName);
 }

 interface AdvancedMediaPlayer{
     public function playVlc($fileName);
     public function playMp4($fileName);
 }

 /*
  * 创建 AdvancedMediaPlayer
  * */

 class VlcPlayer implements AdvancedMediaPlayer{
     public function playVlc($fileName)
     {
         // TODO: Implement playVlc() method.
         echo "Playing vlc file. Name:{$fileName}";
     }
     public function playMp4($fileName)
     {
         // TODO: Implement playMp4() method.
     }
 }

 class Mp4Player implements AdvancedMediaPlayer{
     public function playMp4($fileName)
     {
         // TODO: Implement playMp4() method.
         echo "Playing mp4 file. Name:{$fileName}";
     }
     public function playVlc($fileName)
     {
         // TODO: Implement playVlc() method.
     }
 }

 /*
  * 创建MediaPlayer接口的适配器
  *
  * */

 class MediaAdapter implements MeDiaPlayer{
     public $advanceMusicPlayer;
     function __construct($audioType){
         if(!strcasecmp($audioType,"vlc")){
             $this->advanceMusicPlayer= new VlcPlayer();
         }elseif (!strcasecmp($audioType,"mp4")){
             $this->advanceMusicPlayer = new Mp4Player();
         }
     }

     public function play($audioType, $fileName)
     {
         // TODO: Implement play() method.
        if(!strcasecmp($audioType,"vlc")){
            $this->advanceMusicPlayer->playVlc($fileName);
        }elseif (!strcasecmp($audioType,"mp4")){
            $this->advanceMusicPlayer->playMp4($fileName);
        }
     }

 }

 class AudioPlayer implements MeDiaPlayer{
     public function play($audioType, $fileName)
     {
         // TODO: Implement play() method.

         if(!strcasecmp($audioType,"mp3")){
             echo "Playing mp3 file. Name:{$fileName}";
         }elseif (!strcasecmp($audioType,"vlc") || !strcasecmp($audioType,"mp4")){
             $mediaAdapter = new MediaAdapter($audioType);
             $mediaAdapter->play($audioType,$fileName);
         }else{
             echo "Invalid media.{$audioType}format not supported";
         }
     }
 }
 $audioPlayer = new AudioPlayer();
 $audioPlayer->play("mp4","beyond the horizon.mp3");



