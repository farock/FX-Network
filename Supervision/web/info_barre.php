<?php
// Pour le disque Dur :
if($data['disk'] < 80)
{ 
	echo '<td>';
	echo '<div class="barre"><img src="img/disk.png"/><div class="barre1">Disque Dur : </div><div class="barre2"></div> <div class="barre3-1" style="width:'.$data['disk'].'px;"></div><div class="barre4">'.$data['disk'].'%</div></div><br/> ';
	 					
}

elseif(($disk >= 80) || ($disk <= 90))
{ 
	echo '<td>';
	echo '<div class="barre"><img src="img/disk.png"/><div class="barre1">Disque Dur : </div><div class="barre2"></div> <div class="barre3-2" style="width:'.$data['disk'].'px;"></div><div class="barre4">'.$data['disk'].'%</div></div><br/> ';
	 					
}

else
{ 
	echo '<td>';
	echo '<div class="barre"><img src="img/disk.png"/><div class="barre1">Disque Dur : </div><div class="barre2"></div> <div class="barre3-3" style="width:'.$data['disk'].'px;"></div><div class="barre4">'.$data['disk'].'%</div></div><br/> ';
	 					
}


// Pour le CPU :
if($data['cpu'] < 80)
{ 
	echo '<div class="barre"><img src="img/cpu.png"/><div class="barre1">Cpu : </div><div class="barre2"></div> <div class="barre3-1" style="width:'.$data['cpu'].'px;"></div><div class="barre4">'.$data['cpu'].'%</div></div><br/> ';
	 					
}

elseif(($data['cpu'] <= 80) || ($data['cpu'] <= 90))
{ 
	echo '<div class="barre"><img src="img/cpu.png"/><div class="barre1">Cpu : </div><div class="barre2"></div> <div class="barre3-2" style="width:'.$data['cpu'].'px;"></div><div class="barre4">'.$data['cpu'].'%</div></div><br/> ';
	 					
}

else
{ 
	echo '<div class="barre"><img src="img/cpu.png"/><div class="barre1">Cpu : </div><div class="barre2"></div> <div class="barre3-3" style="width:'.$data['cpu'].'px;"></div><div class="barre4">'.$data['cpu'].'%</div></div><br/> ';
	 					
}		

// Pour la RAM :
if($data['ram'] < 80)
{ 
	echo '<div class="barre"><img src="img/ram.png"/><div class="barre1">Ram : </div><div class="barre2"></div> <div class="barre3-1" style="width:'.$data['ram'].'px;"></div><div class="barre4">'.$data['ram'].'%</div></div><br/> ';
	 					
}

elseif(($data['ram'] <= 80) || ($data['ram'] <= 90))
{ 
	echo '<div class="barre"><img src="img/ram.png"/><div class="barre1">Ram : </div><div class="barre2"></div> <div class="barre3-2" style="width:'.$data['ram'].'px;"></div><div class="barre4">'.$data['ram'].'%</div></div><br/> ';
	 					
}

else
{ 
	echo '<div class="barre"><img src="img/ram.png"/><div class="barre1">Ram : </div><div class="barre2"></div> <div class="barre3-3" style="width:'.$data['ram'].'px;"></div><div class="barre4">'.$data['ram'].'%</div></div><br/> ';
	 					
}				
		

?>
	 				