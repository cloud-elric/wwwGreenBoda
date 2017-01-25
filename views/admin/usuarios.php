<?php
use yii\widgets\ListView;
use yii\web\View;
use yii\helpers\Url;

echo ListView::widget( [
	'dataProvider' => $dataProvider,
	'itemView' => '_item',
] );
?>

<div id="myModal" class="modal" style="
    
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0,0,0,0.5);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1;

">
	<div class="modal-body" style="
    width: 49%;
    height: 300px;
    background-color: #fff;
    border-radius: 10px;
	">
		<div class="contenedor-video">
			
		</div>
	
	</div>
</div>


<?php 
$this->registerJs ( "

$('.js-btn-video').on('click', function(event) {
    event.preventDefault();
		var data = $(this).data('url');
		var url = '".Url::base()."/uploads/'+data;
		$('.contenedor-video').html('<video id=\'video-viewer\' controls  width=\'100%\'><source id=\'video-source\' src=\''+url+'\' type=\'video/mp4\'></video>');
   	 	$('.modal').css('display', 'flex');
});
		
$('.modal').on('click', function(event) {
    event.preventDefault();
    $('.modal').css('display', 'none');
});

// var modal = document.getElementById('myModal');
// window.onClick = function(event) {
// 	//event.preventDefault();
//     if (event.target == modal) {
//         modal.style.display = 'none';
//     }/*else{
// 		event.preventDefault();
// 	}*/
// }
", View::POS_END );
?>
