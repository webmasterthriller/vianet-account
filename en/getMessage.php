<?php 
$idMessage = $_POST['id'];
include_once '../php/bd.php';
$select = $baseDeDonne ->prepare("SELECT * From Message,Client Where Message.idMessage=".$idMessage." And Client.idClient=Message.client ");
$select->execute();
$table = array();
  while($donne = $select->fetch()){
  	$table[] = $donne;
  }                    
  foreach($table as $ligne){

		echo'
					<div
						<div class="lecture">
							<div style="display:inline;">
								<div style="position:relative; float:left; width:10%;">From : </div>
								<div><p>'.$ligne['expediteur'].'</p></div>
							</div>
							<br>
							<div style="display:inline-block;">
								<div style="position:relative; float:left; width:60%;">Message : </div>
								<div><textarea style="width:500px; height:100px;">'.$ligne['message'].'</textarea></div>
							</div>
						</div>
						<br>
						<div class="reponse" style="display:none;">
							<div style="display:inline;">
								<div style="position:relative; float:left; width:10%;">From : </div>
								<div><p id="from">'.$ligne['mail'].'</p></div>
							</div>
							<br>
							<div style="display:inline;">
								<div style="position:relative; float:left; width:10%;">To : </div>
								<div><p id="to">'.$ligne['expediteur'].'</p></div>
							</div>
							<br>
							<div>
								<label>Message : </label><bq><span><div><textarea id="message" style="width:500px; height:100px;" placeholder="'.$ligne['message'].'"></textarea></div><span>
							</div><!--Message-->
						</div><!--lecture-->
						<br>
						<div>
							<button type="submit" class="btn repondre btn-default">Reply</button>
							<button type="submit" class="btn envoyer btn-default" style="display:none;">Send</button>
						</div><!--Action-->
					</div>
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><!--jquery-->
					<script type="text/javascript">
						$(document).ready(function (){
							$(".repondre").click(function(){
								$(".lecture").attr("style","display:none;");
								$(".reponse").fadeIn();
								$(".repondre").fadeOut();
								$(".envoyer").fadeIn();
							});

							$("envoyer").click(function(){
								$.post(
	                "sendMail.php",
	                {
	                  indix : "contact",
	                  email : $("#to").html(),
	                  raison : $("#from").html(),
	                  message : $("#message").val()
	                },
	                function (data) {
	                 if(data=="Success"){
	                  windows.location("message.php");
	                 }else{
	                  windows.location("compte.php");
	                 }
	                },
	                "text"
	              );
							});
						});
					</script>
		';
	}
?>
